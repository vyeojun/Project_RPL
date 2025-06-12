<?php

$host = 'localhost'; 
$username = 'root';  
$password = '';      
$dbname = 'rpl'; 

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
