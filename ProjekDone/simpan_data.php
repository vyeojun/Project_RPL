<?php
$koneksi = new mysqli("localhost", "root", "", "rpl"); // sesuaikan user/password/database

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$nis = $_POST['nis'];
$nama = $_POST['nama_lengkap'];
$tgl = $_POST['tanggal_lahir'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$ortu = $_POST['nama_orang_tua'];

$sql = "INSERT INTO data (nis, nama_lengkap, tanggal_lahir, jenis_kelamin, alamat, agama, nama_orang_tua) 
        VALUES ('$nis', '$nama', '$tgl', '$jk', '$alamat', '$agama', '$ortu')";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil disimpan. <a href='dashboard.php'>Kembali</a>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>