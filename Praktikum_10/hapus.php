<?php
include 'koneksi.php';

// Pastikan ada parameter ID di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query DELETE dengan Prepared Statement untuk keamanan
    $query = "DELETE FROM mahasiswa WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Berhasil hapus, kembali ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>