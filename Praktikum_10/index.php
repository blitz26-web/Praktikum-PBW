<?php 
// Menyertakan koneksi database
include 'koneksi.php'; 

// Menangkap input pencarian jika ada
$search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa - Fasilkom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #1e3a8a !important; }
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .table thead { background-color: #f1f5f9; color: #475569; }
        .btn-action { width: 35px; height: 35px; display: inline-flex; align-items: center; justify-content: center; }
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
    <div class="row">
        <div class="col-12">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold m-0 text-dark">Data Mahasiswa</h4>
                    <a href="tambah.php" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-2"></i>Tambah Baru
                    </a>
                </div>

                <form action="index.php" method="GET" class="row g-2 mb-4">
                    <div class="col-md-4 col-sm-8">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="fa fa-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0" placeholder="Cari nama atau NIM..." value="<?= htmlspecialchars($search) ?>">
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <button type="submit" class="btn btn-outline-primary w-100">Cari</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th class="px-3" width="60">No</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Jurusan</th>
                                <th class="text-center" width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Query SQL dengan Prepared Statement untuk keamanan
                            $query = "SELECT * FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY id DESC";
                            $stmt = $conn->prepare($query);
                            $search_param = "%$search%";
                            $stmt->bind_param("ss", $search_param, $search_param);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            
                            $no = 1;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td class="px-3"><?= $no++; ?></td>
                                        <td><code><?= $row['nim']; ?></code></td>
                                        <td class="fw-medium"><?= $row['nama']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><span class="badge bg-light text-secondary border"><?= $row['jurusan']; ?></span></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm text-white btn-action rounded-circle me-1" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm btn-action rounded-circle" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center py-5 text-muted'>Belum ada data mahasiswa yang ditemukan.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5 mb-4 text-center">
        <p class="mb-0 fw-bold text-dark">Muhammad Rivaldi Yusa</p>
        <p>2410631170092</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>