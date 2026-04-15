<?php
echo "<h3>Soal 3: Menampilkan Array Hewan dengan Foreach</h3>";

$hewan = array("Kucing", "Anjing", "Harimau", "Burung", "Kelinci");

echo "<ul>";
foreach ($hewan as $namaHewan) {
    echo "<li>$namaHewan</li>";
}
echo "</ul>";
?>