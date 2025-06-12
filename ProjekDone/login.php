<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan role (semua langsung ke home dlu)
        header("Location: home.php");
        exit;
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Manajemen TK</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body { 
      background-color: #BCCCDC;
      margin: 0;
      padding: 0;
      color: #0000;
    }

    .login-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #BCCCDC;
    }

    .login-form {
      background-color: #ACB1D6;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .login-form h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #1e272e;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ACB1D6;
      border-radius: 8px;
      font-size: 16px;
      background-color: #F8EDE3;
      color: #1e272e;
    }

    .login-form button {
      background-color: #F8EDE3;
      color: #1e272e;
      padding: 12px 20px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      width: 100%;
      cursor: pointer;
      margin-top: 10px;
    }

    .login-form button:hover {
      background-color: #BCCCDC;
    }

    .note {
      font-size: 12px;
      color: #393E46;
      margin-top: 20px;
    }

    .error {
      color: #FF8A8A;
      font-size: 14px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <div class="login-form">
      <h2>Login</h2>

      <?php if (isset($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
      <?php endif; ?>

      <form action="" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>

      <p class="note">Belum punya akun? <a href="signup.php">Daftar di sini</a></p>
      <p class="note">Silakan masukkan username dan password untuk login.</p>
    </div>
  </div>

</body>
</html>
