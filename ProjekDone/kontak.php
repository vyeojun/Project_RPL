<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak - Manajemen TK</title>
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

        .content {
            text-align: center;
            padding: 50px 20px 100px;
        }

        .content h2 {
            margin-bottom: 10px;
            font-size: 28px;
        }

        .content p {
            margin: 5px 0;
            font-size: 18px;
        }

        .contact-box {
            margin: 30px auto;
            background-color: #d2cff7;
            padding: 30px;
            width: fit-content;
            border-radius: 25px;
            font-weight: bold;
        }

        .image-bottom-left {
            position: absolute;
            bottom: 20px;
            left: 20px;
            width: 300px; <!-- besar kecil gambar -->
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
        <a href="about.php">About</a>
        <a href="kontak.php" class="active">Contact</a>
        <a href="login.php">Logout</a>
    </div>
</div>

<!-- Konten Utama -->
<div class="content">
    <h2>Taman Kanak - Kanak Embun Pagi </h2>
    <p>Jalan Mawar Melati No 15 Banguntapan Bantul</p>
    <p>Banguntapan Bantul 23452</p>

    <div class="contact-box">
        <p>Dwi Puji Astuti (0812-3234-4454)</p>
        <p>Wulandari (0813-2334-3456)</p>
        <p>Bambang P (0881-3324-0012)</p>
    </div>
</div>

<!-- Gambar Anak-anak -->
<img src="gambar/oke.png" alt="Anak-anak" class="image-bottom-left">

</body>
</html>
