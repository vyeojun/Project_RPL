<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($id <= 0) {
    echo "ID tidak valid.";
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT * FROM data WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if (isset($_POST['update'])) {
    $nis = trim($_POST['nis']);
    $nama = trim($_POST['nama_lengkap']);
    $jk = $_POST['jenis_kelamin'];
    $agama = trim($_POST['agama']);
    $ortu = trim($_POST['nama_orang_tua']);

    if ($nis && $nama && $jk && $agama && $ortu) {
        $stmt = mysqli_prepare($conn, "UPDATE data SET nis=?, nama_lengkap=?, jenis_kelamin=?, agama=?, nama_orang_tua=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "sssssi", $nis, $nama, $jk, $agama, $ortu, $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) >= 0) {
            header("Location: db.php");
            exit;
        } else {
            echo "Gagal update data.";
        }
    } else {
        echo "Semua field harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Data Anak Didik</title>
  <style>
    body {
      background-color: #c3d2e0;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    .navbar {
      background-color: #c3d2e0;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px solid black;
    }

    .brand {
      font-weight: bold;
      font-size: 22px;
    }

    .nav-links a {
      margin: 0 14px;
      text-decoration: none;
      color: #000;
      font-weight: bold;
      border-bottom: 2px solid transparent;
    }

    .nav-links a:hover,
    .nav-links a.active {
      border-bottom: 2px solid #000;
    }

    .container {
      max-width: 600px;
      background: #ACB1D6;
      margin: 40px auto;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
    }

    input, select {
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .form-actions {
      display: flex;
      justify-content: space-between;
      margin-top: 25px;
    }

    .btn {
      padding: 10px 20px;
      width: 120px;
      text-align: center;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      box-sizing: border-box;
    }

    .btn-kembali {
      background-color: #F4F8D3;
      color: black;
    }

    .btn-update {
      background-color: #C6E7FF;
      color: black;
    }

    .btn-update:hover {
      background-color: #A5D6FF;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="brand">Manajemen TK</div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="db.php" class="active">Master Data</a>
        <a href="about.php">About</a>
        <a href="kontak.php">Contact</a>
        <a href="login.php">Logout</a>
    </div>
</div>

<div class="container">
  <h2>Edit Data Anak Didik</h2>
  <form method="post">
    <label for="nis">NIS</label>
    <input type="text" name="nis" id="nis" value="<?= htmlspecialchars($data['nis']); ?>" required>

    <label for="nama_lengkap">Nama Lengkap</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']); ?>" required>

    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" required>
      <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
      <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
    </select>

    <label for="agama">Agama</label>
    <input type="text" name="agama" id="agama" value="<?= htmlspecialchars($data['agama']); ?>" required>

    <label for="nama_orang_tua">Nama Orang Tua</label>
    <input type="text" name="nama_orang_tua" id="nama_orang_tua" value="<?= htmlspecialchars($data['nama_orang_tua']); ?>" required>

    <div class="form-actions">
      <a href="db.php" class="btn btn-kembali">Kembali</a>
      <button type="submit" name="update" class="btn btn-update">Update</button>
    </div>
  </form>
</div>

</body>
</html>
