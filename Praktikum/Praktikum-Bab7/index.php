<!DOCTYPE html>
<html>
<head>
    <title>Praktikum Latihan BAB 6</title>
</head>
<body>
    <h2>Praktikum Latihan BAB 6</h2>
    <hr>

    <form action="proses.php" method="post"></form>
        <?php 
        // $var_nama = $_POST['nama']; 
        // $var_email = $_POST['email']; 

        // nilai = 75; 
        // if ($nilai >= 80) { 
        // echo "Nilai A"; 

        // } elseif ($nilai >= 70) { 
        // echo "Nilai B"; 
        // } else { 
        // echo "Nilai C"; 
        // } 

        // $umur = 20; 
        // $ktp = true; 
        // if ($umur >= 17 && $ktp) { 
        // echo "Boleh memilih"; 
        // }

        if (!empty($_POST['nama'])) { 
        echo "Nama: " . htmlspecialchars($_POST['nama']); 
        } else { 
        echo "Nama tidak boleh kosong!"; 
        } 
        ?>
    </form>
</body>
</html>