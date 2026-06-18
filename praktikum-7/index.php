<?php
include 'header.php'; 
?>

    <div class="konten">
        <?php
        if (isset($_GET['halaman'])) {
            $halaman = $_GET['halaman'];

            switch ($halaman) {
                case 'soal1':
                    include 'soal1.php';
                    break;
                case 'soal2':
                    include 'soal2.php';
                    break;
                case 'soal3':
                    include 'soal3.php';
                    break;
                case 'soal4':
                    include 'soal4.php';
                    break;
                default:
                    echo "<p>Halaman tidak ditemukan.</p>";
                    break;
            }
        } else {
            echo "<p>Silakan klik salah satu menu navigasi di atas untuk melihat jawaban.</p>";
        }
        ?>
    </div>

</body>
</html>