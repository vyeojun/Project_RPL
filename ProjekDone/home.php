<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$role = $_SESSION['role']; // 'wali', 'guru', 'asisten'
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Manajemen TK</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #c3d2e0;
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

        .center-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 70px);
            text-align: center;
        }

        .center-container h3 {
            font-size: 20px;
            font-weight: bold;
            color: #000;
            margin-bottom: 20px;
        }

        .center-container img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .instruction {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="brand">Manajemen TK</div>
    <div class="nav-links">
        <a href="home.php" class="active">Home</a>
        <?php if ($role === 'wali'): ?>
            <a href="db_wali.php">Master Data</a>
        <?php elseif ($role === 'guru'): ?>
            <a href="db.php">Master Data</a>
        <?php elseif ($role === 'asisten'): ?>
            <a href="db.php">Master Data</a>
        <?php endif; ?>

        <a href="about.php">About</a>
        <a href="kontak.php">Contact</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- Konten Tengah -->
<div class="center-container">
    <h3>Selamat Datang Kembali, <?= htmlspecialchars($username) ?>!</h3>
    <img src="gambar/tk.png" alt="Logo TK">
    <p class="instruction">
        Anda login sebagai <strong><?= ucfirst($role) ?></strong>. Silakan pilih menu <em>Master Data</em>, <em>About</em>, <em>Contact</em>, atau <em>Logout</em> untuk melanjutkan.
    </p>
</div>

</body>
</html>
