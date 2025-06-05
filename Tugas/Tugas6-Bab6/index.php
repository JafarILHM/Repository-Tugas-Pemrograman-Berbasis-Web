<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Total Pembelian</title>
</head>
<body>

    <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
    <hr>

    <?php
    define("PAJAK", 0.10); 

    $barang = [
        "nama" => "Keyboard",
        "harga_satuan" => 150000
    ];

    $jumlahBeli = 2;

    $totalHargaSebelumPajak = $barang["harga_satuan"] * $jumlahBeli;
    $nilaiPajak = $totalHargaSebelumPajak * PAJAK;
    $totalBayar = $totalHargaSebelumPajak + $nilaiPajak;

    echo "<p>Nama Barang: " . htmlspecialchars($barang["nama"]) . "</p>";
    echo "<p>Harga Satuan: Rp " . number_format($barang["harga_satuan"], 0, ',', '.') . "</p>";
    echo "<p>Jumlah Beli: " . $jumlahBeli . "</p>";
    echo "<p>Total Harga (Sebelum Pajak): Rp " . number_format($totalHargaSebelumPajak, 0, ',', '.') . "</p>";
    echo "<p>Pajak (10%): Rp " . number_format($nilaiPajak, 0, ',', '.') . "</p>";
    echo "<p><strong>Total Bayar: Rp " . number_format($totalBayar, 0, ',', '.') . "</strong></p>"; // Total Bayar ditebalkan dengan <strong>
    ?>

</body>
</html>