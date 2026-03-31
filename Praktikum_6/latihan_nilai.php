<html>
<head>
    <title>Praktikum 6</title>
</head>
<body>

    <h3>Form Input Nilai Mahasiswa</h3>

    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br><br>
        Nilai: <input type="number" name="nilai" required><br><br>
        <input type="submit" value="Proses">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = htmlspecialchars($_POST["nama"]);
    $nilai = $_POST["nilai"];
    $predikat = "";
    $status = "";

    if ($nilai >= 85 && $nilai <= 100) {
        $predikat = "A";
    } elseif ($nilai >= 75 && $nilai <= 84) {
        $predikat = "B";
    } elseif ($nilai >= 65 && $nilai <= 74) {
        $predikat = "C";
    } elseif ($nilai >= 50 && $nilai <= 64) {
        $predikat = "D";
    } elseif ($nilai >= 0 && $nilai <= 49) {
        $predikat = "E";
    } else {
        $predikat = "Tidak valid";
    }

    if ($predikat == "A" || $predikat == "B" || $predikat == "C") {
        $status = "Lulus";
    } elseif ($predikat == "D" || $predikat == "E") {
        $status = "Tidak Lulus";
    } else {
        $status = "Nilai Tidak Valid";
    }

    echo "<b>Hasil</b><br><br>";
    echo "Nama : $nama <br><br>";
    echo "Nilai : $nilai <br><br>";
    echo "Predikat : $predikat <br><br>";
    echo "Status : $status <br>";
    }
    ?>

</body>
</html>