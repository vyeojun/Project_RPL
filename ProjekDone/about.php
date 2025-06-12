<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang - Manajemen TK</title>
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

        .header-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 20px 30px 0;
            text-align: left;
        }

        .header-left h3 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .header-left img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .about-content {
            max-width: 700px;
            margin: 40px auto;
            background-color: #ACB1D6;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .about-content h2 {
            margin-bottom: 15px;
            font-size: 26px;
        }

        .about-content p {
            font-size: 17px;
            line-height: 1.7;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div class="brand">Manajemen TK</div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="db.php">Master Data</a>
        <a href="about.php" class="active">About</a>
        <a href="kontak.php">Contact</a>
        <a href="login.php">Logout</a>
    </div>
</div>

<!-- Selamat Datang + Gambar di kiri atas -->
<div class="header-left">
    <h3>Selamat Datang, <?= htmlspecialchars($username) ?></h3>
    <img src="gambar/tk.png" alt="Logo TK">
</div>

<!-- Isi Tengah Tentang TK -->
<div class="about-content">
    <h2>Tentang Taman Kanak-Kanak Embun Pagi</h2>
    <p>
        Taman Kanak-Kanak kami merupakan tempat belajar yang menyenangkan bagi anak usia dini untuk mengembangkan potensi secara optimal. Kami menyediakan berbagai kegiatan pembelajaran yang dirancang sesuai perkembangan anak, seperti:
    </p>
    <p>
        🌼 Pembelajaran Tematik Interaktif<br>
        🎨 Kegiatan Seni & Kerajinan<br>
        🎵 Musik & Gerak<br>
        📖 Pengenalan Huruf & Angka<br>
        🤝 Kegiatan Sosial & Karakter<br>
        🧠 Stimulasi Motorik & Kognitif<br>
    </p>
    <p>
        Didukung oleh tenaga pengajar profesional dan lingkungan yang ramah anak, kami berkomitmen untuk membentuk generasi masa depan yang cerdas, kreatif, dan berakhlak mulia.
    </p>
</div>

</body>
</html>
