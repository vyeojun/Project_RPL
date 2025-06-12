<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan!";
    exit;
}

$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM data WHERE id = '$id'");
$data = mysqli_fetch_assoc($sql);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Download Data Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #c3d2e0;
            margin: 0;
            padding: 0;
        }

        /* === NAVBAR === */
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
            margin: 30px;
            text-align: center;
        }

        .title {
            font-weight: bold;
            font-size: 20px;
        }

        .address {
            font-size: 14px;
            margin-top: 5px;
            margin-bottom: 20px;
        }

       table {
    margin: 0 auto;
    border-collapse: collapse;
    width: 50%;
    }   

    /* Semua sel */
         th, td {
            padding: 10px;
            border: 1px solid #000;
            text-align: left;
        }

        /* BARIS GANJIL: biru */
        tr:nth-child(odd) th,
        tr:nth-child(odd) td {
            background-color: #B9CDE5;
        }

        /* BARIS GENAP: putih */
        tr:nth-child(even) th,
        tr:nth-child(even) td {
            background-color: #ffffff;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
            margin-right: 10%;
        }

        .signature {
            margin-top: 60px;
            text-align: right;
            margin-right: 10%;
        }

        /* Sembunyikan navbar saat print */
        @media print {
            .navbar {
                display: none;
            }
        }
    </style>
</head>
<body>

<!-- === NAVBAR === -->
<div class="navbar">
    <div class="brand">Manajemen TK</div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="db.php" class="active">Master Data</a>
        <a href="about.php">About</a>
        <a href="kontak.php">Contact</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- === KONTEN === -->
<div class="content">
    <div class="title">Sistem Informasi TK Embun Pagi</div>
    <div class="address">
        Jalan Mawar Melati No 15 Banguntapan Bantul<br>
        Banguntapan Bantul 23452
    </div>

    <h3>DATA ANAK DIDIK</h3>

    <table>
        <tr><th>NIS</th><td><?= $data['nis']; ?></td></tr>
        <tr><th>Nama Lengkap</th><td><?= $data['nama_lengkap']; ?></td></tr>
        <tr><th>Jenis Kelamin</th><td><?= $data['jenis_kelamin']; ?></td></tr>
        <tr><th>Agama</th><td><?= $data['agama']; ?></td></tr>
        <tr><th>Nama Orang Tua</th><td><?= $data['nama_orang_tua']; ?></td></tr>
    </table>

    <div class="footer">
        Yogyakarta, <?= date("d F Y"); ?>
    </div>

    <div class="signature">
        <strong>Ketua Yayasan</strong><br>
        NIP.1234345676
    </div>
</div>

<script>
    window.print();
</script>

</body>
</html>
