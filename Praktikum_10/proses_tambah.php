<?php
// 1. Sertakan file koneksi database
include 'koneksi.php';

// 2. Periksa apakah form benar-benar disubmit (tombol dengan name="submit" ditekan)
if (isset($_POST['submit'])) {
    
    // 3. Ambil data yang dikirimkan dari form
    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];

    // 4. Siapkan query SQL menggunakan Prepared Statements
    // Tanda tanya (?) berfungsi sebagai placeholder untuk mencegah SQL Injection
    $query = "INSERT INTO mahasiswa (nim, nama, email, jurusan, alamat) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    
    if ($stmt) {
        // 5. Hubungkan parameter dengan variabel (bind_param)
        // "sssss" berarti ada 5 parameter yang semuanya bertipe String (termasuk NIM karena VARCHAR)
        $stmt->bind_param("sssss", $nim, $nama, $email, $jurusan, $alamat);

        // 6. Eksekusi perintah SQL
        if ($stmt->execute()) {
            // Jika berhasil disimpan, kembalikan user ke halaman utama (index.php)
            header("Location: index.php");
            exit();
        } else {
            // Jika gagal saat eksekusi
            echo "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
        }

        // 7. Tutup statement untuk menghemat memori
        $stmt->close();
    } else {
        // Jika query gagal disiapkan oleh database
        echo "Gagal menyiapkan query: " . $conn->error;
    }

} else {
    // Jika file ini diakses langsung melalui URL tanpa mengisi form, lempar kembali ke index
    header("Location: index.php");
    exit();
}
?>