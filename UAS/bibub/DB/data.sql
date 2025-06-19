-- Menambahkan pengguna 'tester' dengan password hash 
-- Passwordnya adalah tester123
INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'tester', '$2y$10$QUiZE/WglYhN5VrTqEc9jOKpG4y0ENdscSA8.irjviYP94Ii2J69K');

INSERT INTO `transactions` (`user_id`, `type`, `amount`, `kategori`, `tanggal`) VALUES
(1, 'Pemasukan', 7500000, 'Gaji', '2025-05-01'),
(1, 'Pengeluaran', 500000, 'Sewa Kos', '2025-05-02'),
(1, 'Pengeluaran', 75000, 'Transportasi', '2025-05-05'),
(1, 'Pengeluaran', 300000, 'Listrik & Air', '2025-05-06'),
(1, 'Pengeluaran', 1200000, 'Belanja Bulanan', '2025-05-07'),
(1, 'Pengeluaran', 85000, 'Makan Siang', '2025-05-10'),
(1, 'Pengeluaran', 250000, 'Hiburan', '2025-05-15'),
(1, 'Pemasukan', 2000000, 'Proyek Freelance', '2025-05-20'),
(1, 'Pemasukan', 7500000, 'Gaji', '2025-06-01'),
(1, 'Pengeluaran', 500000, 'Sewa Kos', '2025-06-02'),
(1, 'Pengeluaran', 150000, 'Internet', '2025-06-05'),
(1, 'Pengeluaran', 1350000, 'Belanja Bulanan', '2025-06-07'),
(1, 'Pengeluaran', 120000, 'Makan Malam', '2025-06-12'),
(1, 'Pemasukan', 500000, 'Bonus', '2025-06-15'),
(1, 'Pengeluaran', 450000, 'Servis Motor', '2025-06-18');


INSERT INTO `goals` (`user_id`, `nama_tujuan`, `target_amount`, `kategori_terkait`, `target_date`, `created_at`) VALUES
(1, 'Beli Laptop Gaming Baru', 20000000, 'Gaji', '2025-12-31', '2025-05-01 10:00:00'),
(1, 'Dana Darurat Tahap 1', 5000000, 'Proyek Freelance', '2025-09-30', '2025-05-21 11:30:00'),
(1, 'Liburan Akhir Tahun', 8000000, 'Bonus', '2025-11-30', '2025-06-16 09:00:00');

ALTER TABLE `transactions`
ADD KEY `type` (`type`),
ADD KEY `kategori` (`kategori`);

COMMIT;