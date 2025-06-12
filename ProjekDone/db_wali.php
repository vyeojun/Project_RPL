<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'wali') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Manajemen TK - Wali</title>
    <style>
        body {
            background-color: #c3d2e0;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
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
            padding: 30px;
            max-width: 1000px;
            margin: auto;
        }

        .card {
            background-color: #ACB1D6;
            border-radius: 10px;
            padding: 20px;
            position: relative;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: center;
        }

        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table thead {
            background-color: #F8EDE3;
            color: #000000;
        }

        .action-buttons a {
            color: #000000;
            padding: 6px 12px;
            border-radius: 4px;
            margin: 0 2px;
            font-size: 0.9rem;
            display: inline-block;
            text-decoration: none;
        }

        .btn-info {
            background-color: #C6E7FF;
        }

        .btn-download {
             background-color: #D1C4E9;
        }
    </style>
</head>
<body>

<!-- === NAVBAR === -->
<div class="navbar">
    <div class="brand">Manajemen TK</div>
    <div class="nav-links">
        <a href="home.php">Home</a>
        <a href="db_wali.php" class="active">Master Data</a>
        <a href="about.php">About</a>
        <a href="kontak.php">Contact</a>
        <a href="login.php">Logout</a>
    </div>
</div>

<!-- === KONTEN UTAMA === -->
<div class="container">
    <div class="card">
        <div class="header">
            <h2>Data Anak Didik</h2>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Nama Orang Tua</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($conn, "SELECT * FROM data");
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>{$row['nis']}</td>";
                    echo "<td>{$row['nama_lengkap']}</td>";
                    echo "<td>{$row['jenis_kelamin']}</td>";
                    echo "<td>{$row['agama']}</td>";
                    echo "<td>{$row['nama_orang_tua']}</td>";
                    echo "<td class='action-buttons'>
                            <a class='btn-info' href='view.php?id={$row['id']}'>Lihat</a>
                            <a class='btn-download' href='download.php?id={$row['id']}'>Download</a>
                          </td>";
                    echo "</tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
