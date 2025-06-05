<!DOCTYPE html>
<html>
<head>
    <title>Praktikum Latihan BAB 6</title>
</head>
<body>
    <h2>Praktikum Latihan BAB 6</h2>
    <hr>

    <?php
        // $nama = "Andi";
        // echo "Nama saya adalah " . $nama; 
        
        // $umur = 25; 
        // echo "Umur saya”. $umur. “tahun"; 
        
        // $berat = 55.5; 
        // echo "Berat badan saya". $berat ."kg"; 

        // $buah = ["apel", "jeruk", "mangga"]; 
        // echo $buah[1]; 

        class Mahasiswa { 
            public $nama; 
            public function sapa() { 
                return "Halo, saya $this->nama"; 
            } 
        } 
        $mhs = new Mahasiswa(); 
        $mhs->nama = "Jeni"; 
        echo $mhs->sapa(); 
    ?>
</body>
</html>