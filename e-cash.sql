-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2022 pada 15.52
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-cash`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan_pembayaran`
--

CREATE TABLE `bulan_pembayaran` (
  `id_bulan_pembayaran` int(11) NOT NULL,
  `nama_bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tahun` int(4) NOT NULL,
  `pembayaran_perminggu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulan_pembayaran`
--

INSERT INTO `bulan_pembayaran` (`id_bulan_pembayaran`, `nama_bulan`, `tahun`, `pembayaran_perminggu`) VALUES
(13, 'Januari', 2022, 2000),
(14, 'April', 2022, 2000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `gambar`, `tanggal_pengeluaran`) VALUES
(3, 10000, 'Logo', '62566c943c339.279097.jpg', '2022-04-13'),
(4, 2000, 'Sapu', '62566e0295703.87205.jpg', '2022-04-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `no_hp`, `alamat`) VALUES
(15, 'Anisa Amelia Putri', '0800000000', 'Citatah'),
(16, 'Ayu Lela Cahyati', '0800000000', 'Cipatat'),
(17, 'Ayu Lestari', '0800000000', 'Cipatat'),
(18, 'Ayu Puspita Sari', '0800000000', 'Cipatat'),
(19, 'Bunga Cantika Juliyanti', '0800000000', 'Cipatat'),
(20, 'Deira Sepira M', '0800000000', 'Cipatat'),
(21, 'Dhafa Nazril', '0800000000', 'Cipatat'),
(22, 'Dina Rodiah', '0800000000', 'Cipatat'),
(23, 'Dwi Rida Lisdiana', '0800000000', 'Cipatat'),
(24, 'Elsa Nuraeni', '0800000000', 'Cipatat'),
(25, 'Epa Julianti', '0800000000', 'Cipatat'),
(26, 'Fitri Andrika Bella', '0800000000', 'Cipatat'),
(27, 'Fitri Julpanita', '0800000000', 'Cipatat'),
(28, 'Imelda Siti Febrianti', '0800000000', 'Cipatat'),
(29, 'Mahmud Akbar Ali', '0800000000', 'Cipatat'),
(30, 'Memey Melania', '0800000000', 'Cipatat'),
(31, 'Muammad Yusuf S', '0800000000', 'Cipatat'),
(32, 'Nabila Hidayat', '0800000000', 'Cipatat'),
(33, 'Naya Nurayanti', '0800000000', 'Cipatat'),
(34, 'Nurul Aeni Saidah', '0800000000', 'Cipatat'),
(35, 'Rahma Julia Aftian', '0800000000', 'Negri Bersalju'),
(36, 'Rina Saidah', '0800000000', 'Cipatat'),
(37, 'Reva Nur Asih', '0800000000', 'Cipatat'),
(38, 'Salma Aulia P', '0800000000', 'Cipatat'),
(39, 'Salsabila', '0800000000', 'Cipatat'),
(40, 'Selvi Aulia Zahra', '0800000000', 'Cipatat'),
(41, 'Sindi Yulianti', '0800000000', 'Cipatat'),
(42, 'Siti Nur Fadilah', '0800000000', 'Cipatat'),
(43, 'Syaila Natalia Putri', '0800000000', 'Cipatat'),
(44, 'Siti Uswatun Hasanah', '0800000000', 'Cipatat'),
(45, 'Ulfah Sayidah', '0800000000', 'Cipatat'),
(46, 'Yesti Nur Apriliani', '0800000000', 'Cipatat'),
(47, 'Zaskia Halimatun Sadiah', '0800000000', 'Cipatat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang_kas`
--

CREATE TABLE `uang_kas` (
  `id_uang_kas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_bulan_pembayaran` int(11) NOT NULL,
  `minggu_ke_1` int(11) NOT NULL,
  `minggu_ke_2` int(11) NOT NULL,
  `minggu_ke_3` int(11) NOT NULL,
  `minggu_ke_4` int(11) NOT NULL,
  `status` enum('Lunas','Belum lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uang_kas`
--

INSERT INTO `uang_kas` (`id_uang_kas`, `id_siswa`, `id_bulan_pembayaran`, `minggu_ke_1`, `minggu_ke_2`, `minggu_ke_3`, `minggu_ke_4`, `status`) VALUES
(40, 15, 13, 2000, 2000, 2000, 2000, 'Lunas'),
(41, 16, 13, 2000, 2000, 2000, 2000, 'Lunas'),
(42, 17, 13, 0, 0, 0, 0, 'Belum lunas'),
(43, 18, 13, 0, 0, 0, 0, 'Belum lunas'),
(44, 19, 13, 0, 0, 0, 0, 'Belum lunas'),
(45, 20, 13, 0, 0, 0, 0, 'Belum lunas'),
(46, 21, 13, 0, 0, 0, 0, 'Belum lunas'),
(47, 22, 13, 0, 0, 0, 0, 'Belum lunas'),
(48, 23, 13, 0, 0, 0, 0, 'Belum lunas'),
(49, 24, 13, 0, 0, 0, 0, 'Belum lunas'),
(50, 25, 13, 0, 0, 0, 0, 'Belum lunas'),
(51, 26, 13, 0, 0, 0, 0, 'Belum lunas'),
(52, 27, 13, 0, 0, 0, 0, 'Belum lunas'),
(53, 28, 13, 0, 0, 0, 0, 'Belum lunas'),
(54, 29, 13, 0, 0, 0, 0, 'Belum lunas'),
(55, 30, 13, 0, 0, 0, 0, 'Belum lunas'),
(56, 31, 13, 0, 0, 0, 0, 'Belum lunas'),
(57, 32, 13, 0, 0, 0, 0, 'Belum lunas'),
(58, 33, 13, 0, 0, 0, 0, 'Belum lunas'),
(59, 34, 13, 0, 0, 0, 0, 'Belum lunas'),
(60, 35, 13, 0, 0, 0, 0, 'Belum lunas'),
(61, 36, 13, 0, 0, 0, 0, 'Belum lunas'),
(62, 37, 13, 0, 0, 0, 0, 'Belum lunas'),
(63, 38, 13, 0, 0, 0, 0, 'Belum lunas'),
(64, 39, 13, 0, 0, 0, 0, 'Belum lunas'),
(65, 40, 13, 0, 0, 0, 0, 'Belum lunas'),
(66, 41, 13, 0, 0, 0, 0, 'Belum lunas'),
(67, 42, 13, 0, 0, 0, 0, 'Belum lunas'),
(68, 43, 13, 0, 0, 0, 0, 'Belum lunas'),
(69, 44, 13, 0, 0, 0, 0, 'Belum lunas'),
(70, 45, 13, 0, 0, 0, 0, 'Belum lunas'),
(71, 46, 13, 0, 0, 0, 0, 'Belum lunas'),
(72, 47, 13, 0, 0, 0, 0, 'Belum lunas'),
(73, 15, 14, 0, 0, 0, 0, 'Belum lunas'),
(74, 16, 14, 0, 0, 0, 0, 'Belum lunas'),
(75, 17, 14, 0, 0, 0, 0, 'Belum lunas'),
(76, 18, 14, 0, 0, 0, 0, 'Belum lunas'),
(77, 19, 14, 0, 0, 0, 0, 'Belum lunas'),
(78, 20, 14, 0, 0, 0, 0, 'Belum lunas'),
(79, 21, 14, 0, 0, 0, 0, 'Belum lunas'),
(80, 22, 14, 0, 0, 0, 0, 'Belum lunas'),
(81, 23, 14, 0, 0, 0, 0, 'Belum lunas'),
(82, 24, 14, 0, 0, 0, 0, 'Belum lunas'),
(83, 25, 14, 0, 0, 0, 0, 'Belum lunas'),
(84, 26, 14, 0, 0, 0, 0, 'Belum lunas'),
(85, 27, 14, 0, 0, 0, 0, 'Belum lunas'),
(86, 28, 14, 0, 0, 0, 0, 'Belum lunas'),
(87, 29, 14, 0, 0, 0, 0, 'Belum lunas'),
(88, 30, 14, 0, 0, 0, 0, 'Belum lunas'),
(89, 31, 14, 0, 0, 0, 0, 'Belum lunas'),
(90, 32, 14, 0, 0, 0, 0, 'Belum lunas'),
(91, 33, 14, 0, 0, 0, 0, 'Belum lunas'),
(92, 34, 14, 0, 0, 0, 0, 'Belum lunas'),
(93, 35, 14, 0, 0, 0, 0, 'Belum lunas'),
(94, 36, 14, 0, 0, 0, 0, 'Belum lunas'),
(95, 37, 14, 0, 0, 0, 0, 'Belum lunas'),
(96, 38, 14, 0, 0, 0, 0, 'Belum lunas'),
(97, 39, 14, 0, 0, 0, 0, 'Belum lunas'),
(98, 40, 14, 0, 0, 0, 0, 'Belum lunas'),
(99, 41, 14, 0, 0, 0, 0, 'Belum lunas'),
(100, 42, 14, 0, 0, 0, 0, 'Belum lunas'),
(101, 43, 14, 0, 0, 0, 0, 'Belum lunas'),
(102, 44, 14, 0, 0, 0, 0, 'Belum lunas'),
(103, 45, 14, 0, 0, 0, 0, 'Belum lunas'),
(104, 46, 14, 0, 0, 0, 0, 'Belum lunas'),
(105, 47, 14, 0, 0, 0, 0, 'Belum lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(8, 'admin', '$2y$10$.HWhyRdgWYiVcoJ1tSJkcuowO.9YzEG/S.2yameoj.xix2v61pZuG'),
(9, 'hilman', '$2y$10$uqMhVYhasMK4VIzoJhH7sO/RG4y6YJ8OG7aUxC53ThXGv1MZLnW/a'),
(10, 'rahmajulia9', '$2y$10$w1ZQC55gL3jQxaBHhbTjRuXNNWEI/giKRoY5ArgC5nDs6MgZSlxW2'),
(11, 'iksan', '$2y$10$GnmZXZ8lFTa6zfJ3ICc/e.q1lqx4cujkvLm2yh1xdMAkFVQDNpWbC'),
(12, 'OneAdmin', '$2y$10$4g3/pf/2sSI5OhdeHMSr3.McIRRxwy8mBOSy63cxaBwab1GNbB0F2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulan_pembayaran`
--
ALTER TABLE `bulan_pembayaran`
  ADD PRIMARY KEY (`id_bulan_pembayaran`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD PRIMARY KEY (`id_uang_kas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_bulan_pembayaran` (`id_bulan_pembayaran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bulan_pembayaran`
--
ALTER TABLE `bulan_pembayaran`
  MODIFY `id_bulan_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  MODIFY `id_uang_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD CONSTRAINT `uang_kas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uang_kas_ibfk_2` FOREIGN KEY (`id_bulan_pembayaran`) REFERENCES `bulan_pembayaran` (`id_bulan_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
