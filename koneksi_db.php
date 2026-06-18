<?php
$host     = "localhost";
$username = "root";
$password = ""; // Kosongkan saja jika kamu menggunakan settingan default Laragon/XAMPP
$database = "db_auth";

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil atau error
if ($conn->connect_error) {
    die("Koneksi ke database gagal bro: " . $conn->connect_error);
}

// Jika berhasil, biarkan kosong di bawah sini. 
// Jangan tambahkan echo atau spasi di luar tag PHP agar tidak mengganggu proses header() saat login.
?>