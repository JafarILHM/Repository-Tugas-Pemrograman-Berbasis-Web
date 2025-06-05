<!DOCTYPE html>
<html>
<head>
    <title>Diskon Pembayaran Mahasiswa</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
    <form method="post">
        NPM: <input type="text" name="npm" required><br><br>
        Nama: <input type="text" name="nama" required><br><br>
        Prodi: <input type="text" name="prodi" required><br><br>
        Semester: <input type="number" name="semester" required><br><br>
        Biaya UKT (Rp): <input type="number" name="ukt" required><br><br>
        <input type="submit" name="submit" value="Hitung Diskon">
    </form>
    <?php include 'nav.php'; ?>
    <?php
    if (isset($_POST['submit'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $semester = $_POST['semester'];
        $ukt = $_POST['ukt'];

        // Hitung diskon
        $diskon = 0;
        if ($ukt >= 5000000) {
            $diskon = 10;
            if ($semester > 8) {
                $diskon += 5;
            }
        }

        $potongan = ($diskon / 100) * $ukt;
        $total_bayar = $ukt - $potongan;

        echo "<hr>";
        echo "<h3>Luaran yang diharuskan</h3>";
        echo "NPM : $npm<br>";
        echo "NAMA : " . strtoupper($nama) . "<br>";
        echo "PRODI : " . strtoupper($prodi) . "<br>";
        echo "SEMESTER : $semester<br>";
        echo "BIAYA UKT : Rp. " . number_format($ukt, 0, ',', '.') . ",-<br>";
        echo "DISKON : $diskon%<br>";
        echo "YANG HARUS DIBAYAR : Rp. " . number_format($total_bayar, 0, ',', '.') . "<br>";
    }
    ?>
</body>
</html>
