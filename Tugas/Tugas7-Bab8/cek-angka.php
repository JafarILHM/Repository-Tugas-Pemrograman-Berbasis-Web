<!DOCTYPE html>
<html>
<head>
    <title>Cek Angka</title>
</head>
<body>
    <h2>Cek Apakah Angka Genap atau Ganjil</h2>
    <?php include 'nav.php'; ?>

    <?php
    $angka = 7;
    $hasil = ($angka % 2 == 0) ? "Genap" : "Ganjil";
    echo "Angka $angka adalah $hasil";
    ?>
</body>
</html>
