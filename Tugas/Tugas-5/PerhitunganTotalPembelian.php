<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Total Pembelian (Dengan Array)</title>
</head>
<body>
    <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
    <hr>

    <?php
    // 1. Konstanta pajak
    define("PAJAK", 0.10);

    // 2. Array harga barang
    $barang = array("Keyboard" => 150000); 

    // 3. Jumlah beli
    $nama_barang = "Keyboard";
    $harga_satuan = $barang[$nama_barang];
    $jumlah_beli = 2;

    // 4. Perhitungan total
    $total_harga = $harga_satuan * $jumlah_beli;
    $jumlah_pajak = $total_harga * PAJAK;
    $total_bayar = $total_harga + $jumlah_pajak;

    // 5. Tampilkan hasil
    echo "Nama Barang: $nama_barang<br>";
    echo "Harga Satuan: Rp " . number_format($harga_satuan, 0, ',', '.') . "<br>";
    echo "Jumlah Beli: $jumlah_beli<br>";
    echo "Total Harga (Sebelum Pajak): Rp " . number_format($total_harga, 0, ',', '.') . "<br>";
    echo "Pajak (10%): Rp " . number_format($jumlah_pajak, 0, ',', '.') . "<br>";
    echo "<strong>Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "</strong><br>";
    ?>

</body>
</html>

