<html>
<head>
    <title>Latihan Diskon Pembayaran UKT</title>
</head>
<body>

    <h3>Form Diskon Pembayaran Mahasiswa</h3>

    <form method="post" action="">
        NPM: <input type="text" name="npm" required>
        Nama: <input type="text" name="nama" required>
        Prodi: <input type="text" name="prodi" required>
        Semester: <input type="number" name="semester" required>
        Biaya UKT (Rp): <input type="number" name="biaya_ukt" required>
        <input type="submit" name="submit" value="Hitung Pembayaran">
    </form>

    <?php
    if (isset($_POST['submit'])) {

        $npm = htmlspecialchars($_POST['npm']);
        $nama = strtoupper(htmlspecialchars($_POST['nama']));
        $prodi = strtoupper(htmlspecialchars($_POST['prodi']));
        $semester = $_POST['semester'];
        $biayaUKT = $_POST['biaya_ukt'];

        if ($biayaUKT >= 5000000) {
            if ($semester > 8) {
                $total = $biayaUKT - ($biayaUKT * 0.15);
                $diskon = "15%";
            } else {
                $total = $biayaUKT - ($biayaUKT * 0.10);
                $diskon = "10%";
            }
        } else {
            $total = $biayaUKT;
            $diskon = "0%";
        }

        $format_ukt = "Rp. " . number_format($biayaUKT, 0, ',', '.') . ",-";
        $format_total = "Rp. " . number_format($total, 0, ',', '.') . ",-";

        echo "<b>Hasil Diskon</b><br><br>";
        echo "NPM : $npm <br><br>";
        echo "NAMA : $nama <br><br>";
        echo "PRODI : $prodi <br><br>";
        echo "SEMESTER : $semester <br><br>";
        echo "BIAYA UKT : $format_ukt <br><br>";
        echo "DISKON : $diskon <br><br>";
        echo "YANG HARUS DIBAYAR : $format_total <br>";
    }
    ?>

</body>
</html>