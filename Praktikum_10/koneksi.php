<?php
/**
 * Proyek: Sistem Informasi Data Mahasiswa
 * Pembuat: Muhammad Rivaldi Yusa (2410631170092)
 * Institusi: Universitas Singaperbangsa Karawang
 */

// Konfigurasi Database
$host = "localhost";
$user = "root";      // Default user XAMPP
$pass = "";          // Default password XAMPP biasanya kosong
$db   = "db_universitas";

// Membuat koneksi ke MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    // Jika gagal, hentikan program dan tampilkan pesan error
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengatur charset ke utf8 agar mendukung berbagai karakter
$conn->set_charset("utf8");

/**
 * Koneksi berhasil digunakan.
 * Gunakan variabel $conn ini di file index.php, tambah.php, dll.
 * dengan cara menyertakan: include 'koneksi.php';
 */
?>