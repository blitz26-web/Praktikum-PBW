<?php
define("PAJAK", 0.1);

$barang = [
    "nama" => "Keyboard",
    "harga" => 150000
];

$jumlah_beli = 2;

$total_sebelum_pajak = $barang['harga'] * $jumlah_beli;
$nominal_pajak = $total_sebelum_pajak * PAJAK;
$total_bayar = $total_sebelum_pajak + $nominal_pajak;

echo "<h2>Perhitungan Total Pembelian (Dengan Array)</h2>";
echo "<hr>";
echo "Nama Barang: " . $barang['nama'] . "<br>";
echo "Harga Satuan: Rp " . number_format($barang['harga'], 0, ',', '.') . "<br>";
echo "Jumlah Beli: " . $jumlah_beli . "<br>";
echo "Total Harga (Sebelum Pajak): Rp " . number_format($total_sebelum_pajak, 0, ',', '.') . "<br>";
echo "Pajak (10%): Rp " . number_format($nominal_pajak, 0, ',', '.') . "<br>";
echo "<b>Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "</b>";
echo "<hr>";
echo "<a href='../Pertemuan_6/latihan_nilai.php'> Menuju ke Tugas Selanjutnya (Latihan Nilai)</a>";
?>