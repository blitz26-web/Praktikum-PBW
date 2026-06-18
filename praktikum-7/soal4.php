<?php
echo "<h3>Soal 4: Menentukan Genap atau Ganjil dengan Ternary</h3>";

$angka = 7; 
$status = ($angka % 2 == 0) ? "Genap" : "Ganjil";

echo "Angka $angka adalah bilangan $status.";
?>