<!DOCTYPE html>
<html>
<head>
    <title>Jenis Kendaraan</title>
</head>
<body>
    <h2>Jenis Kendaraan Berdasarkan Jumlah Roda</h2>
    <?php 
    $jumlah_roda = 4;

    switch ($jumlah_roda) {
        case 2:
            echo "Kendaraan: Sepeda Motor";
            break;
        case 3:
            echo "Kendaraan: Bajaj";
            break;
        case 4:
            echo "Kendaraan: Mobil";
            break;
        case 6:
            echo "Kendaraan: Truk";
            break;
        default:
            echo "Jenis kendaraan tidak diketahui";
    }
    ?>
</body>
</html>
