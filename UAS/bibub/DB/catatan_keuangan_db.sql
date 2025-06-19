-- Membuat database jika belum ada
CREATE DATABASE IF NOT EXISTS `catatan_keuangan_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `catatan_keuangan_db`;

-- Struktur tabel untuk `users`
-- Tabel ini menyimpan data login pengguna.
CREATE TABLE `users` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(100) NOT NULL,
`password` varchar(255) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Struktur tabel untuk `transactions`
-- Tabel ini menyimpan semua data pemasukan dan pengeluaran.
CREATE TABLE `transactions` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`type` enum('Pemasukan','Pengeluaran') NOT NULL,
`amount` int(11) NOT NULL,
`kategori` varchar(100) NOT NULL,
`tanggal` date NOT NULL,
PRIMARY KEY (`id`),
KEY `user_id` (`user_id`),
CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Struktur tabel untuk `goals`
-- Tabel ini menyimpan data tujuan tabungan pengguna.
CREATE TABLE `goals` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`nama_tujuan` varchar(255) NOT NULL,
`target_amount` int(11) NOT NULL,
`kategori_terkait` varchar(100) NOT NULL,
`target_date` date DEFAULT NULL,
`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
PRIMARY KEY (`id`),
KEY `user_id` (`user_id`),
CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;