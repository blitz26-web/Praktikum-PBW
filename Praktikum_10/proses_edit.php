<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id      = $_POST['id'];
    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];

    // Query UPDATE dengan Prepared Statement
    $query = "UPDATE mahasiswa SET nim=?, nama=?, email=?, jurusan=?, alamat=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssi", $nim, $nama, $email, $jurusan, $alamat, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }

    $stmt->close();
}
?>  