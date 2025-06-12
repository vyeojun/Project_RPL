<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Cek apakah parameter ID dikirim lewat URL
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

// Ambil data anak berdasarkan ID
$id = mysqli_real_escape_string($conn, $_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM data WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lihat Data Anak Didik</title>
  <style>
    /* Atur warna latar dan font dasar */
    body {
      background-color: #BCCCDC; /* warna bg */
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    /* Bagian header: warna abu gelap, isi rata kanan kiri */
    header {
      background-color: #BCCCDC;
      color: black;
      display: flex;
      justify-content: space-between;
      padding: 15px 40px;
      align-items: center;

      /* Garis bawah hitam sebagai pemisah */
      border-bottom: 2px solid #000;
    }

    /* Link navigasi di header */
    header nav a {
      margin: 0 10px;
      color: black;
      text-decoration: none;
      font-weight: bold;
    }

    /* Kontainer utama: kotak putih di tengah */
    .container {
      max-width: 600px;
      background: #ACB1D6;
      margin: 50px auto;
      padding: 30px;
      border-radius: 12px;
      position: relative;
    }

    /* Judul */
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }

    /* Tabel data */
    .data-table {
      width: 100%;
    }

    /* Isi setiap sel */
    .data-table td {
      padding: 10px;
      font-size: 16px;
      font-family: 'Segoe UI', sans-serif;
    }

    .data-table td:first-child {
      font-weight: bold;
      width: 40%;
    }

    .bottom-button {
      margin-top: 40px;
      display: flex;
      justify-content: flex-end;
    }

    /* Gaya tombol kembali */
    .btn-kembali {
      padding: 10px 20px;
      background-color: #F8EDE3;
      color: black;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
    }

    /* Hover effect tombol kembali */
    .btn-kembali:hover {
      background-color: #BCCCDC;
    }
  </style>
</head>
<body>

<header>
  <div>Manajement TK</div>
  <nav>
    <a href="home.php">Home</a>
    <a href="db.php">Master Data</a>
    <a href="about.php">About</a>
    <a href="kontak.php">Contact</a>
  </nav>
  <div><a href="login.php" style="color:black;">Logout</a></div>
</header>

<div class="container">
  <h2>Detail Data Anak Didik</h2>
  <table class="data-table">
    <tr>
      <td>NIS</td>
      <td><?= $data['nis']; ?></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td><?= $data['nama_lengkap']; ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td><?= $data['jenis_kelamin']; ?></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td><?= $data['agama']; ?></td>
    </tr>
    <tr>
      <td>Nama Orang Tua</td>
      <td><?= $data['nama_orang_tua']; ?></td>
    </tr>
  </table>

  <div class="bottom-button">
    <a href="db.php" class="btn-kembali">Kembali ke data anak</a>
  </div>
</div>

</body>
</html>
