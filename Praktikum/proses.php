<?php
define("PAJAK", 0.15);

$nama = $_POST['nama'];
$npm = $_POST['npm'];
$email   = $_POST['email'];
$layanan = $_POST['layanan'];
$metode  = $_POST['metode'];
$barang_terpilih = isset($_POST['barang']) ? $_POST['barang'] : [];
$jumlah_barang   = $_POST['jumlah'];

$daftar_harga = [
    "Buku Tulis" => 5000,
    "Pensil" => 3000,
    "Penghapus" => 2000,
];

$subtotal = 0;
$detail_belanja = [];

if (!empty($barang_terpilih)) {
    foreach ($barang_terpilih as $item) {
        $qty = (int)$jumlah_barang[$item];
        if ($qty > 0) {
            $harga_satuan = $daftar_harga[$item];
            $total_item = $harga_satuan * $qty;
            $subtotal += $total_item;
            $detail_belanja[] = "$item ($qty pcs)";     
        }
    }
}

$biaya_layanan = 0;
if ($layanan == "Reguler") {
    $biaya_layanan = 0;
} elseif ($layanan == "Prioritas") {
    $biaya_layanan = 10000;
}

$total_pajak = $subtotal * PAJAK;
$total_bayar = $subtotal + $biaya_layanan + $total_pajak;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pembelian</title>
</head>
<body>
    <?php if (empty($detail_belanja)): ?>
        <h2>Anda belum memilih barang.</h2>
    <?php else: ?>
        <table>
            <tr><td>Nama / NIM</td><td>: <?= $nama ?> / <?= $npm ?></td></tr>
            <tr><td>Email</td><td>: <?= $email ?></td></tr>
            <tr><td>Layanan / Metode</td><td>: <?= $layanan ?> / <?= $metode ?></td></tr>
            <tr><td>Daftar Barang</td><td>: <?= implode(", ", $detail_belanja) ?></td></tr>
            <tr><td>Subtotal</td><td>: Rp <?= number_format($subtotal) ?></td></tr>
            <tr><td>Biaya Layanan</td><td>: Rp <?= number_format($biaya_layanan) ?></td></tr>
            <tr><td>Pajak (15%)</td><td>: Rp <?= number_format($total_pajak) ?></td></tr>
            <tr><td>Total Bayar</td><td>: Rp <?= number_        format($total_bayar) ?></td></tr>
        </table>
    <?php endif; ?>

    <br>
    <a href="index.html">Kembali ke Form</a>
</body>
</html>