<!DOCTYPE html>
<html>
<head>
    <title>Latihan Nilai</title>
</head>
<body>

<h2>Form Input Nilai Mahasiswa</h2>
<form method="post" action="">
    Nama: <input type="text" name="nama"><br>
    Nilai: <input type="number" name="nilai"><br>
    <input type="submit" value="Proses">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nilai = $_POST["nilai"];
    $predikat = "";
    $status = "";

    if ($nilai >= 85 && $nilai <= 100) {
        $predikat = "A";
        $status = "Lulus";
    } elseif ($nilai >= 75 && $nilai <= 84) {
        $predikat = "B";
        $status = "Lulus";
    } elseif ($nilai >= 65 && $nilai <= 74) {
        $predikat = "C";
        $status = "Lulus";
    } elseif ($nilai >= 50 && $nilai <= 64) {
        $predikat = "D";
        $status = "Tidak Lulus";
    } elseif ($nilai >= 0 && $nilai <= 49) {
        $predikat = "E";
        $status = "Tidak Lulus";
    } else {
        $predikat = "Tidak valid";
        $status = "Tidak valid";
    }

    echo "<hr>";
    echo "<h3>Luaran yang diharapkan</h3>";
    echo "Nama : $nama<br>";
    echo "Nilai : $nilai<br>";
    echo "Predikat : $predikat<br>";
    echo "Status : $status<br>";
}
?>

</body>
</html>
