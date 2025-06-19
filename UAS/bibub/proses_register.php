<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    $_SESSION['notif'] = ['pesan' => 'Username dan password tidak boleh kosong.', 'tipe' => 'danger'];
    header("Location: register.php");
    exit();
}

$check_query = "SELECT id FROM users WHERE username='$username'";
$check_result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($check_result) > 0) {
    $_SESSION['notif'] = ['pesan' => 'Username sudah digunakan! Silakan pilih yang lain.', 'tipe' => 'danger'];
    header("Location: register.php");
    exit();
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if (mysqli_query($conn, $insert_query)) {
    $_SESSION['notif'] = ['pesan' => 'Registrasi berhasil! Silakan login dengan akun baru Anda.', 'tipe' => 'success'];
    header("Location: login.php");
    exit();
    } else {
    $_SESSION['notif'] = ['pesan' => 'Terjadi kesalahan pada server. Registrasi gagal!', 'tipe' => 'danger'];
    header("Location: register.php");
    exit();
    }
}
} else {
header("Location: register.php");
exit();
}
?>