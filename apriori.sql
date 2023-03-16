-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Feb 2023 pada 04.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apriori`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisa`
--

CREATE TABLE `analisa` (
  `id` int(5) NOT NULL,
  `kelompok` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `itemset` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `asso2`
--

CREATE TABLE `asso2` (
  `id` int(10) NOT NULL,
  `id_produk_1` int(10) NOT NULL,
  `id_produk_2` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asso2`
--

INSERT INTO `asso2` (`id`, `id_produk_1`, `id_produk_2`, `jumlah`) VALUES
(466, 2, 14, 0),
(467, 14, 2, 0),
(468, 14, 21, 0),
(469, 21, 14, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_asso2`
--

CREATE TABLE `hasil_asso2` (
  `id` int(10) NOT NULL,
  `id_produk_1` int(10) NOT NULL,
  `id_produk_2` int(10) NOT NULL,
  `support` float NOT NULL,
  `cofidence` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_asso2`
--

INSERT INTO `hasil_asso2` (`id`, `id_produk_1`, `id_produk_2`, `support`, `cofidence`, `total`) VALUES
(75, 2, 14, 0, 0.5, 0.0666667),
(76, 14, 2, 0, 0.461538, 0.0615385),
(77, 14, 21, 0, 0.384615, 0.042735),
(78, 21, 14, 0, 0.555556, 0.0617284);

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemset1`
--

CREATE TABLE `itemset1` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `lolos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `itemset1`
--

INSERT INTO `itemset1` (`id`, `id_produk`, `jumlah`, `support`, `lolos`) VALUES
(4206, 1, 5, 0.11111111111111, '1'),
(4207, 2, 12, 0.26666666666667, '1'),
(4208, 3, 1, 0.022222222222222, '0'),
(4209, 4, 7, 0.15555555555556, '1'),
(4210, 5, 1, 0.022222222222222, '0'),
(4211, 6, 7, 0.15555555555556, '1'),
(4212, 7, 7, 0.15555555555556, '1'),
(4213, 8, 2, 0.044444444444444, '0'),
(4214, 9, 2, 0.044444444444444, '0'),
(4215, 10, 1, 0.022222222222222, '0'),
(4216, 11, 1, 0.022222222222222, '0'),
(4217, 12, 2, 0.044444444444444, '0'),
(4218, 13, 1, 0.022222222222222, '0'),
(4219, 14, 13, 0.28888888888889, '1'),
(4220, 15, 3, 0.066666666666667, '0'),
(4221, 16, 2, 0.044444444444444, '0'),
(4222, 17, 1, 0.022222222222222, '0'),
(4223, 18, 1, 0.022222222222222, '0'),
(4224, 19, 6, 0.13333333333333, '1'),
(4225, 20, 1, 0.022222222222222, '0'),
(4226, 21, 9, 0.2, '1'),
(4227, 22, 1, 0.022222222222222, '0'),
(4228, 23, 2, 0.044444444444444, '0'),
(4229, 24, 1, 0.022222222222222, '0'),
(4230, 25, 1, 0.022222222222222, '0'),
(4231, 26, 1, 0.022222222222222, '0'),
(4232, 27, 1, 0.022222222222222, '0'),
(4233, 28, 1, 0.022222222222222, '0'),
(4234, 29, 1, 0.022222222222222, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemset2`
--

CREATE TABLE `itemset2` (
  `id` int(11) NOT NULL,
  `id_produk_1` int(11) NOT NULL,
  `id_produk_2` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `support` double NOT NULL,
  `lolos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `itemset2`
--

INSERT INTO `itemset2` (`id`, `id_produk_1`, `id_produk_2`, `jumlah`, `support`, `lolos`) VALUES
(3298, 1, 2, 1, 0.022222222222222, ''),
(3299, 1, 4, 0, 0, ''),
(3300, 1, 6, 1, 0.022222222222222, ''),
(3301, 1, 7, 2, 0.044444444444444, ''),
(3302, 1, 14, 2, 0.044444444444444, ''),
(3303, 1, 19, 1, 0.022222222222222, ''),
(3304, 1, 21, 0, 0, ''),
(3305, 2, 4, 2, 0.044444444444444, ''),
(3306, 2, 6, 1, 0.022222222222222, ''),
(3307, 2, 7, 1, 0.022222222222222, ''),
(3308, 2, 14, 6, 0.13333333333333, ''),
(3309, 2, 19, 3, 0.066666666666667, ''),
(3310, 2, 21, 3, 0.066666666666667, ''),
(3311, 4, 6, 1, 0.022222222222222, ''),
(3312, 4, 7, 2, 0.044444444444444, ''),
(3313, 4, 14, 1, 0.022222222222222, ''),
(3314, 4, 19, 2, 0.044444444444444, ''),
(3315, 4, 21, 1, 0.022222222222222, ''),
(3316, 6, 7, 3, 0.066666666666667, ''),
(3317, 6, 14, 1, 0.022222222222222, ''),
(3318, 6, 19, 2, 0.044444444444444, ''),
(3319, 6, 21, 1, 0.022222222222222, ''),
(3320, 7, 14, 1, 0.022222222222222, ''),
(3321, 7, 19, 3, 0.066666666666667, ''),
(3322, 7, 21, 2, 0.044444444444444, ''),
(3323, 14, 19, 2, 0.044444444444444, ''),
(3324, 14, 21, 5, 0.11111111111111, ''),
(3325, 19, 21, 3, 0.066666666666667, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_penjualan` varchar(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_penjualan`, `id_produk`, `jumlah`, `tanggal`, `status`) VALUES
(1, 'TMS001', 14, 2, '2023-02-22', '1'),
(2, 'TMS001', 1, 1, '2023-02-22', '1'),
(3, 'TMS001', 2, 5, '2023-02-22', '1'),
(4, 'TMS002', 3, 1, '2023-02-22', '1'),
(5, 'TMS002', 4, 1, '2023-02-22', '1'),
(6, 'TMS002', 5, 1, '2023-02-22', '1'),
(7, 'TMS003', 6, 1, '2023-02-22', '1'),
(8, 'TMS004', 4, 1, '2023-02-22', '1'),
(9, 'TMS004', 7, 2, '2023-02-22', '1'),
(10, 'TMS004', 8, 1, '2023-02-22', '1'),
(11, 'TMS004', 9, 1, '2023-02-22', '1'),
(12, 'TMS004', 6, 1, '2023-02-22', '1'),
(13, 'TMS005', 10, 1, '2023-02-22', '1'),
(14, 'TMS005', 2, 1, '2023-02-22', '1'),
(15, 'TMS005', 4, 1, '2023-02-22', '1'),
(16, 'TMS006', 2, 2, '2023-02-22', '1'),
(17, 'TMS007', 11, 1, '2023-02-22', '1'),
(18, 'TMS008', 12, 2, '2023-02-22', '1'),
(19, 'TMS009', 13, 1, '2023-02-22', '1'),
(20, 'TMS010', 14, 1, '2023-02-22', '1'),
(21, 'TMS010', 1, 1, '2023-02-22', '1'),
(22, 'TMS011', 15, 1, '2023-02-22', '1'),
(23, 'TMS012', 4, 3, '2023-02-22', '1'),
(24, 'TMS012', 14, 2, '2023-02-22', '1'),
(25, 'TMS013', 15, 1, '2023-02-22', '1'),
(26, 'TMS014', 7, 1, '2023-02-22', '1'),
(27, 'TMS014', 1, 1, '2023-02-22', '1'),
(28, 'TMS015', 16, 1, '2023-02-22', '1'),
(29, 'TMS015', 17, 1, '2023-02-22', '1'),
(30, 'TMS015', 14, 7, '2023-02-22', '1'),
(31, 'TMS016', 18, 1, '2023-02-22', '1'),
(32, 'TMS017', 2, 4, '2023-02-22', '1'),
(33, 'TMS017', 14, 6, '2023-02-22', '1'),
(34, 'TMS018', 7, 1, '2023-02-22', '1'),
(35, 'TMS019', 6, 1, '2023-02-22', '1'),
(36, 'TMS020', 2, 2, '2023-02-22', '1'),
(37, 'TMS020', 19, 1, '2023-02-22', '1'),
(38, 'TMS021', 20, 1, '2023-02-22', '1'),
(39, 'TMS022', 9, 1, '2023-02-22', '1'),
(40, 'TMS022', 14, 2, '2023-02-22', '1'),
(41, 'TMS022', 21, 1, '2023-02-22', '1'),
(42, 'TMS023', 7, 1, '2023-02-22', '1'),
(43, 'TMS024', 22, 2, '2023-02-22', '1'),
(44, 'TMS024', 14, 10, '2023-02-22', '1'),
(45, 'TMS024', 2, 2, '2023-02-22', '1'),
(46, 'TMS024', 21, 6, '2023-02-22', '1'),
(47, 'TMS024', 19, 7, '2023-02-22', '1'),
(48, 'TMS024', 23, 2, '2023-02-22', '1'),
(49, 'TMS025', 21, 1, '2023-02-22', '1'),
(50, 'TMS026', 4, 2, '2023-02-22', '1'),
(51, 'TMS026', 7, 1, '2023-02-22', '1'),
(52, 'TMS026', 19, 1, '2023-02-22', '1'),
(53, 'TMS026', 21, 2, '2023-02-22', '1'),
(54, 'TMS027', 24, 1, '2023-02-22', '1'),
(55, 'TMS028', 6, 1, '2023-02-22', '1'),
(56, 'TMS029', 14, 4, '2023-02-22', '1'),
(57, 'TMS029', 21, 2, '2023-02-22', '1'),
(58, 'TMS030', 6, 1, '2023-02-22', '1'),
(59, 'TMS030', 25, 2, '2023-02-22', '1'),
(60, 'TMS031', 2, 7, '2023-02-22', '1'),
(61, 'TMS031', 4, 2, '2023-02-22', '1'),
(62, 'TMS032', 21, 2, '2023-02-22', '1'),
(63, 'TMS033', 19, 3, '2023-02-22', '1'),
(64, 'TMS033', 6, 1, '2023-02-22', '1'),
(65, 'TMS033', 27, 1, '2023-02-22', '1'),
(66, 'TMS033', 1, 1, '2023-02-22', '1'),
(67, 'TMS033', 7, 1, '2023-02-22', '1'),
(68, 'TMS034', 26, 1, '2023-02-22', '1'),
(69, 'TMS035', 12, 1, '2023-02-22', '1'),
(70, 'TMS036', 14, 3, '2023-02-22', '1'),
(71, 'TMS036', 2, 1, '2023-02-22', '1'),
(72, 'TMS036', 6, 1, '2023-02-22', '1'),
(73, 'TMS036', 19, 1, '2023-02-22', '1'),
(74, 'TMS036', 7, 1, '2023-02-22', '1'),
(75, 'TMS036', 15, 1, '2023-02-22', '1'),
(76, 'TMS036', 21, 1, '2023-02-22', '1'),
(77, 'TMS037', 2, 1, '2023-02-22', '1'),
(78, 'TMS038', 14, 2, '2023-02-22', '1'),
(79, 'TMS039', 14, 10, '2023-02-22', '1'),
(80, 'TMS040', 4, 1, '2023-02-22', '1'),
(81, 'TMS040', 19, 2, '2023-02-22', '1'),
(82, 'TMS041', 21, 1, '2023-02-22', '1'),
(83, 'TMS042', 1, 1, '2023-02-22', '1'),
(84, 'TMS043', 14, 9, '2023-02-22', '1'),
(85, 'TMS043', 2, 2, '2023-02-22', '1'),
(86, 'TMS043', 8, 1, '2023-02-22', '1'),
(87, 'TMS044', 23, 1, '2023-02-22', '1'),
(88, 'TMS044', 28, 1, '2023-02-22', '1'),
(89, 'TMS044', 29, 1, '2023-02-22', '1'),
(90, 'TMS044', 2, 4, '2023-02-22', '1'),
(91, 'TMS044', 14, 7, '2023-02-22', '1'),
(92, 'TMS044', 21, 1, '2023-02-22', '1'),
(93, 'TMS044', 16, 1, '2023-02-22', '1'),
(94, 'TMS045', 2, 2, '2023-02-22', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` text NOT NULL,
  `berat` float NOT NULL,
  `harga` int(10) NOT NULL,
  `is_delete` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode`, `nama`, `berat`, `harga`, `is_delete`) VALUES
(1, 'JHT048', 'Rein', 500, 20000, '0'),
(2, 'JHD008', 'Chloe', 500, 20000, '0'),
(3, 'JHT062', 'Keiko', 500, 20000, '0'),
(4, 'JHT031', 'Kenneth', 500, 20000, '0'),
(5, 'JHT063', 'Florence', 500, 20000, '0'),
(6, 'JHT064', 'Kimora', 500, 20000, '0'),
(7, 'JHD009', 'Lawrence', 500, 20000, '0'),
(8, 'JHT065', 'Adeline', 500, 20000, '0'),
(9, 'JHD016', 'Katy', 500, 20000, '0'),
(10, 'JHD015', 'Xavier', 500, 20000, '0'),
(11, 'JHD007', 'Carlotta', 500, 20000, '0'),
(12, 'JHT066', 'Cyncyn', 500, 20000, '0'),
(13, 'JHW009', 'JT 8052', 500, 20000, '0'),
(14, 'JHW012', 'JT8123', 500, 20000, '0'),
(15, 'JHT067', 'Lily', 500, 20000, '0'),
(16, 'JHT068', 'Ellysa', 500, 20000, '0'),
(17, 'JHT043', 'Mona', 500, 20000, '0'),
(18, 'JHT017', 'Erica', 500, 20000, '0'),
(19, 'JHD017', 'Elena', 500, 20000, '0'),
(20, 'JHT069', 'Callista', 500, 20000, '0'),
(21, 'JHD018', 'Aimy', 500, 20000, '0'),
(22, 'JHW006', 'JT 8036', 500, 20000, '0'),
(23, 'JHT016', 'Elica', 500, 20000, '0'),
(24, 'JHT070', 'Gigi', 500, 20000, '0'),
(25, 'JHW017', 'JT 8151', 500, 20000, '0'),
(26, 'JHT004', 'Baby', 500, 20000, '0'),
(27, 'JHT051', 'Sharon', 500, 20000, '0'),
(28, 'JHT024', 'Janneth', 500, 20000, '0'),
(29, 'JHT037', 'Maddie', 500, 20000, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analisa`
--
ALTER TABLE `analisa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `asso2`
--
ALTER TABLE `asso2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil_asso2`
--
ALTER TABLE `hasil_asso2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `itemset1`
--
ALTER TABLE `itemset1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `itemset2`
--
ALTER TABLE `itemset2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisa`
--
ALTER TABLE `analisa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT untuk tabel `asso2`
--
ALTER TABLE `asso2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=470;

--
-- AUTO_INCREMENT untuk tabel `hasil_asso2`
--
ALTER TABLE `hasil_asso2`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `itemset1`
--
ALTER TABLE `itemset1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4235;

--
-- AUTO_INCREMENT untuk tabel `itemset2`
--
ALTER TABLE `itemset2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3326;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
