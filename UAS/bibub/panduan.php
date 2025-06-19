<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Panduan Penggunaan - Money Tracker</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="main-content">
<div class="container">
    <div class="accordion" id="panduanAccordion">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <strong>1. Dashboard Utama</strong>
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#panduanAccordion">
        <div class="accordion-body">
            Halaman Dashboard adalah ringkasan utama dari kondisi keuangan Anda. Di sini Anda akan melihat tiga kartu informasi utama:
            <ul>
            <li><strong>Total Pemasukan:</strong> Menampilkan jumlah total dari semua transaksi yang berjenis 'Pemasukan'.</li>
            <li><strong>Total Pengeluaran:</strong> Menampilkan jumlah total dari semua transaksi yang berjenis 'Pengeluaran'.</li>
            <li><strong>Saldo Saat Ini:</strong> Menampilkan selisih antara Total Pemasukan dan Total Pengeluaran.</li>
            </ul>
        </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <strong>2. Menambah Transaksi Baru</strong>
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#panduanAccordion">
        <div class="accordion-body">
            Gunakan halaman "Tambah Transaksi" untuk mencatat setiap aktivitas keuangan Anda.
            <ul>
            <li><strong>Jenis Transaksi:</strong> Pilih antara "Pemasukan" untuk uang masuk atau "Pengeluaran" untuk uang keluar.</li>
            <li><strong>Nominal:</strong> Masukkan jumlah uang tanpa titik atau koma. Nilai harus positif.</li>
            <li><strong>Kategori:</strong> Tulis kategori transaksi untuk mempermudah pelacakan (contoh: Makanan, Transportasi, Gaji).</li>
            <li><strong>Tanggal:</strong> Pilih tanggal kapan transaksi tersebut terjadi.</li>
            </ul>
            Setelah semua kolom terisi, klik tombol simpan <button class="btn btn-primary btn-sm"><i class="mdi mdi-content-save"></i></button> untuk merekam transaksi Anda.
        </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <strong>3. Melihat & Mengelola Daftar Transaksi</strong>
        </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#panduanAccordion">
        <div class="accordion-body">
            Di halaman "Daftar Transaksi", Anda dapat melihat semua riwayat transaksi yang diurutkan dari yang paling baru.
            <ul>
            <li><strong>Edit:</strong> Klik ikon pensil <button class="btn btn-warning btn-sm" disabled><i class="mdi mdi-pencil"></i></button> untuk mengubah detail transaksi yang mungkin salah catat.</li>
            <li><strong>Hapus:</strong> Klik ikon tempat sampah <button class="btn btn-danger btn-sm" disabled><i class="mdi mdi-delete"></i></button> untuk menghapus transaksi secara permanen. Anda akan diminta konfirmasi sebelum data dihapus.</li>
            </ul>
        </div>
        </div>
    </div>
    
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            <strong>4. Membaca Grafik & Menggunakan Filter</strong>
        </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#panduanAccordion">
        <div class="accordion-body">
            Gunakan fitur visualisasi dan filter untuk analisis lebih dalam.
            <ul>
            <li><strong>Grafik:</strong> Halaman ini menampilkan perbandingan total pemasukan dan pengeluaran Anda setiap bulannya dalam bentuk diagram batang. Ini membantu Anda melihat tren keuangan dari waktu ke waktu.</li>
            <li><strong>Filter Data:</strong> Halaman ini memungkinkan Anda untuk menyaring transaksi berdasarkan bulan dan tahun tertentu, sehingga Anda dapat fokus pada periode keuangan yang spesifik.</li>
            </ul>
        </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            <strong>5. Mengelola Tujuan Tabungan</strong>
        </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#panduanAccordion">
        <div class="accordion-body">
            Fitur ini membantu Anda untuk menetapkan target tabungan dan melacak kemajuannya secara otomatis.
            <ul>
                <li><strong>Membuat Tujuan Baru:</strong> Isi nama tujuan (misal: "Dana Darurat"), target nominal, dan pilih kategori pemasukan yang akan ditautkan (misal: "Tabungan Khusus"). Setiap kali Anda mencatat 'Pemasukan' dengan kategori tersebut, progres tujuan akan bertambah secara otomatis.</li>
                <li><strong>Melacak Progres:</strong> Setiap kartu tujuan akan menampilkan progress bar dan jumlah dana yang sudah terkumpul dibandingkan dengan target.</li>
                <li><strong>Tanggal Target:</strong> Anda bisa menambahkan tanggal target (opsional) sebagai pengingat kapan tujuan tersebut ingin dicapai.</li>
                <li><strong>Menghapus Tujuan:</strong> Jika tujuan sudah tidak relevan atau telah tercapai, Anda bisa menghapusnya dengan menekan ikon silang (x) di pojok kanan atas kartu tujuan.</li>
            </ul>
        </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            <strong>6. Keluar (Logout)</strong>
        </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#panduanAccordion">
        <div class="accordion-body">
            Untuk keluar dari akun Anda dan mengamankan data, klik menu "Logout" di bagian bawah sidebar. Anda akan diarahkan kembali ke halaman login.
        </div>
        </div>
    </div>

    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>