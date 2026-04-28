<?php
// Menyertakan koneksi database
include 'koneksi.php';

// Menangkap ID dari URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Ambil data lama berdasarkan ID menggunakan Prepared Statement
$query = "SELECT * FROM mahasiswa WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

// Jika data tidak ditemukan, kembali ke index
if (!$data) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa - Fasilkom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #1e3a8a !important; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #475569; }
        footer { font-size: 0.85rem; color: #94a3b8; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="fa-solid fa-code-branch me-2"></i>Fasilkom
        </a>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <h4 class="fw-bold m-0 text-dark">Edit Data Mahasiswa</h4>
                    <a href="index.php" class="btn btn-outline-secondary btn-sm">
                        <i class="fa-solid fa-xmark me-1"></i> Batal
                    </a>
                </div>

                <form action="proses_edit.php" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id']; ?>">

                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= htmlspecialchars($data['nim']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Program Studi</label>
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="S-1 Informatika" <?= ($data['jurusan'] == 'S-1 Informatika') ? 'selected' : ''; ?>>Informatika</option>
                            <option value="S-1 Sistem Informasi" <?= ($data['jurusan'] == 'S-1 Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" name="update" class="btn btn-warning btn-lg text-white fw-bold">
                            <i class="fa-solid fa-rotate me-2"></i>Perbarui Data
                        </button>
                    </div>
                </form>
            </div>

            <footer class="mt-5 mb-4 text-center">
                <p class="mb-0 fw-bold text-dark">Muhammad Rivaldi Yusa</p>
                <p>2410631170092</p>
            </footer>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>