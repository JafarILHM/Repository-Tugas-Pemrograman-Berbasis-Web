<!DOCTYPE html>
<html>
<head>
    <title>Bilangan Genap</title>
</head>
<body>
    <h2>Bilangan Genap dari 2 sampai 10</h2>
    <?php include 'nav.php'; ?>

    <?php
    for ($i = 2; $i <= 10; $i += 2) {
        echo $i . " ";
    }
    ?>
</body>
</html>
