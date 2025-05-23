<!DOCTYPE html>
<html>
<head>
    <title>Daftar Hewan</title>
</head>
<body>
    <h2>Daftar Nama Hewan</h2>
    <?php include 'nav.php'; ?>

    <?php
    $hewan = ["Kucing", "Anjing", "Gajah", "Kelinci", "Harimau"];

    echo "<ul>";
    foreach ($hewan as $nama) {
        echo "<li>$nama</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>
