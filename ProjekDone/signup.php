<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $role = $_POST['role'];

    // Cek apakah username sudah ada
    $check = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $error_message = "Username sudah digunakan.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, nama_lengkap, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $password, $nama_lengkap, $role);
        if ($stmt->execute()) {
            header("Location: login.php");
            exit;
        } else {
            $error_message = "Gagal mendaftar. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - Manajemen TK</title>
  <style>
  body {
    /* Warna latar belakang halaman */
    background-color: #BCCCDC;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;  /* Agar form di tengah secara vertikal */
    margin: 0;
  }

  /* Kotak form utama */
  .signup-container {
    width: 100%;
    max-width: 400px;
    padding: 40px;
    background: #ACB1D6;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }

    /* Judul */
  h2 {
    text-align: center;
    color: black;
    margin-bottom: 20px;
  }

   /* Input dan dropdown */
  input, select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #F8EDE3; //per tabel 
    color: #0000;
    box-sizing: border-box;
  }

  input::placeholder {
    color: black;
  }

  button {
    background-color: #F8EDE3;
    color: black;
    padding: 10px;
    border: none;
    border-radius: 8px;
    width: 100%;
    margin-top: 15px;
    cursor: pointer;
  }

  button:hover {
    background-color: #BCCCDC;
  }

  .error {
    color: red;
    margin-top: 10px;
    text-align: center;
  }

  /* Catatan login */
    .note {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

     .note a {
      color: #3333cc;
      text-decoration: none;
    }

    .note a:hover {
      text-decoration: underline;
    }

</style>
</head>
<body>

<div class="signup-container">
  <h2>Daftar Akun Baru</h2>

  <?php if (isset($error_message)): ?>
    <div class="error"><?= $error_message ?></div>
  <?php endif; ?>

  <form method="POST">
    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <select name="role" required>
      <option value="">-- Pilih Role --</option>
      <option value="guru">Guru</option>
      <option value="asisten">Asisten Guru</option>
      <option value="wali">Wali Siswa</option>
    </select>

    <button type="submit">Daftar</button>

    <!-- Catatan login -->
    <div class="note">
      Sudah punya akun? <a href="login.php">Login disini</a>

  </form>
</div>

</body>
</html>
