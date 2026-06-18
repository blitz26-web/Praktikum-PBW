<?php
echo "<h3>Soal 1: Menentukan Kendaraan dengan Switch</h3>";
$jumlahRoda = 4; 

switch ($jumlahRoda) {
    case 2:
        echo "Kendaraan roda $jumlahRoda adalah: Sepeda Motor / Sepeda";
        break;
    case 3:
        echo "Kendaraan roda $jumlahRoda adalah: Becak / Bajaj";
        break;
    case 4:
        echo "Kendaraan roda $jumlahRoda adalah: Mobil";
        break;
    case 6:
    case 8:
    case 10:
        echo "Kendaraan roda $jumlahRoda adalah: Truk / Bus";
        break;
    default:
        echo "Kendaraan roda $jumlahRoda: Jenis kendaraan tidak terdaftar";
        break;
}
?>