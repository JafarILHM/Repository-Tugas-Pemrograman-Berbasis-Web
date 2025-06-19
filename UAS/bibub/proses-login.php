<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['notif'] = ['pesan' => 'Username atau password yang Anda masukkan salah!', 'tipe' => 'danger'];
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['notif'] = ['pesan' => 'Username atau password yang Anda masukkan salah!', 'tipe' => 'danger'];
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>