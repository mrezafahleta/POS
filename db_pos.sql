-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Sep 2020 pada 22.45
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `coba`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `coba` (
`id` int(11)
,`hpp` int(11)
,`jumlah` int(11)
,`total1` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `title`) VALUES
(1, 'Gas 3 Kg'),
(2, 'Gas 12 Kg'),
(3, 'Galon 10 Liter'),
(4, 'Galon 5 Liter'),
(6, 'Air Mineral'),
(11, 'testing'),
(12, 'Dll'),
(13, 'tes'),
(14, 'te2'),
(15, 'coba'),
(16, '22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_stok`, `nama`, `alamat`, `nohp`, `harga`, `jumlah`, `total`, `tanggal_beli`) VALUES
(1, 1, 'jajak', 'bukit', '085758595958', 14000, 10, 140000, '2020-08-04'),
(2, 1, 'jajak', 'bukit', '085758595958', 14000, 5, 70000, '2020-08-04'),
(3, 1, 'jajak', 'bukit', '085758595958', 14000, 5, 70000, '2020-08-06'),
(4, 1, 'jajak', 'bukit', '085758595958', 14000, 50, 700000, '2020-08-15');

--
-- Trigger `penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualanafterdelete` AFTER DELETE ON `penjualan` FOR EACH ROW UPDATE stok SET stok_akhir =  stok_akhir + old.jumlah
WHERE id = old.id_stok
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `penjualanstok` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
	UPDATE stok SET stok_akhir = stok_akhir - NEW.jumlah
    WHERE id = NEW.id_stok;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_penjualan_kurang` BEFORE UPDATE ON `penjualan` FOR EACH ROW update stok SET stok_akhir = stok_akhir - NEW.jumlah 
where id = NEW.id_stok
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_penjualan_tambah` AFTER UPDATE ON `penjualan` FOR EACH ROW UPDATE stok SET stok_akhir = stok_akhir + old.jumlah 
WHERE id = old.id_stok
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_harian`
--

CREATE TABLE `penjualan_harian` (
  `kode_barang` varchar(120) NOT NULL,
  `tanggal` date NOT NULL,
  `total_penjualan` int(11) NOT NULL,
  `keuntungan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `hpp` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `stok_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id`, `id_kategori`, `title`, `hpp`, `jumlah`, `total`, `tanggal_masuk`, `stok_akhir`) VALUES
(1, 1, 'Gas Elpiji', 14000, 100, 1400000, '2020-07-22', 30),
(3, 4, 'galon', 10000, 1000, 10000000, '2020-08-01', 498),
(6, 11, 'testing aja', 5000, 100, 500000, '2020-08-03', 100),
(7, 11, 'oke', 5000, 500, 2500000, '2020-08-04', 500),
(8, 11, 'Lagi Testing', 16000, 10000, 160000000, '2020-08-06', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_akhir`
--

CREATE TABLE `stok_akhir` (
  `kode_barang` varchar(120) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`name`, `email`, `password`, `role`, `is_active`, `id`) VALUES
('ejak', 'ejak@gmail.com', '*6677DB42F238B83F0B8B6C40D49177F0577D2243', 'admin', 1, 3),
('reza', 'reizrn.ajah@gmail.com', '$2y$10$C8BwFbjpw5fG4tmDy7Lt6ub5efNIJA4znacbpwOIMgjyqhsGYOnuq', 'admin', 1, 4);

-- --------------------------------------------------------

--
-- Struktur untuk view `coba`
--
DROP TABLE IF EXISTS `coba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `coba`  AS  select `stok`.`id` AS `id`,`stok`.`hpp` AS `hpp`,`stok`.`jumlah` AS `jumlah`,(`stok`.`jumlah` * `stok`.`hpp`) AS `total1` from `stok` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_ibfk_1` (`id_stok`);

--
-- Indeks untuk tabel `penjualan_harian`
--
ALTER TABLE `penjualan_harian`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `stok_akhir`
--
ALTER TABLE `stok_akhir`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `stok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
