-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2019 pada 20.33
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tabel_bonus`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tabel_bonus` (
`id_bonus` char(5)
,`id_menu` char(6)
,`nm_menu` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tabel_detail_paket_bonus`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tabel_detail_paket_bonus` (
`id_paket` char(6)
,`id_bonus` char(5)
,`id_menu` char(6)
,`nm_menu` varchar(50)
,`id_kat` char(5)
,`tipe` enum('makanan','minuman')
,`hrg_porsi` int(11)
,`gambar` varchar(100)
,`deskripsi` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tabel_detail_paket_menu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tabel_detail_paket_menu` (
`id_paket` char(6)
,`id_menu` char(6)
,`nm_menu` varchar(50)
,`id_kat` char(5)
,`tipe` enum('makanan','minuman')
,`hrg_porsi` int(11)
,`gambar` varchar(100)
,`deskripsi` text
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tabel_menu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tabel_menu` (
`id_menu` char(6)
,`nm_menu` varchar(50)
,`nm_kat` varchar(50)
,`tipe` enum('makanan','minuman')
,`hrg_porsi` int(11)
,`gambar` varchar(100)
,`deskripsi` text
,`id_kat` char(5)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bonus`
--

CREATE TABLE `tbl_bonus` (
  `id_bonus` char(5) NOT NULL,
  `id_menu` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bonus`
--

INSERT INTO `tbl_bonus` (`id_bonus`, `id_menu`) VALUES
('BN-01', 'MN-002'),
('BN-03', 'MN-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` char(10) NOT NULL,
  `nm_customer` varchar(50) DEFAULT NULL,
  `almt_customer` text,
  `jenkel_customer` enum('pria','wanita') DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nm_customer`, `almt_customer`, `jenkel_customer`, `no_hp`, `email`, `username`, `password`, `tanggal`) VALUES
('1005190001', 'asdasd', '123', 'wanita', '312', '312', '312', '312', '2019-05-10 06:48:15'),
('1904270001', 'asdasd', '123', 'pria', '312', '312', '312', '312', '2019-05-10 07:40:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_paket_bonus`
--

CREATE TABLE `tbl_detail_paket_bonus` (
  `id_detail_paket_bonus` int(11) NOT NULL,
  `id_paket` char(6) NOT NULL,
  `id_bonus` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_paket_bonus`
--

INSERT INTO `tbl_detail_paket_bonus` (`id_detail_paket_bonus`, `id_paket`, `id_bonus`) VALUES
(14, 'PK-001', 'BN-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_paket_menu`
--

CREATE TABLE `tbl_detail_paket_menu` (
  `id_detail_paket_menu` int(11) NOT NULL,
  `id_paket` char(6) NOT NULL,
  `id_menu` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_paket_menu`
--

INSERT INTO `tbl_detail_paket_menu` (`id_detail_paket_menu`, `id_paket`, `id_menu`) VALUES
(28, 'PK-001', 'MN-002'),
(29, 'PK-001', 'MN-005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kat` char(5) NOT NULL,
  `nm_kat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kat`, `nm_kat`) VALUES
('KT-01', 'aneka bubur'),
('KT-02', 'aneka sup'),
('KT-03', 'aneka mie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keterangan_paket`
--

CREATE TABLE `tbl_keterangan_paket` (
  `id_keterangan_paket` char(6) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_keterangan_paket`
--

INSERT INTO `tbl_keterangan_paket` (`id_keterangan_paket`, `deskripsi`) VALUES
('KET-01', 'sfd sdfsd fsd sdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` char(6) NOT NULL,
  `nm_menu` varchar(50) NOT NULL,
  `id_kat` char(5) NOT NULL,
  `tipe` enum('makanan','minuman') NOT NULL,
  `hrg_porsi` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nm_menu`, `id_kat`, `tipe`, `hrg_porsi`, `gambar`, `deskripsi`) VALUES
('MN-002', 'menu1', 'KT-02', 'makanan', 123, 'APK_format_icon.png', '12323'),
('MN-003', ' 1cr', 'KT-01', 'makanan', 3123, 'superthumb.jpg', '123123'),
('MN-004', 'asdads', 'KT-03', 'minuman', 123123, '9fce80e65934cce4e44b59a83c42d70f.jpg', '123123'),
('MN-005', '1232', 'KT-01', 'makanan', 123123, '1f8c58860040e37b3d6665725e4c7318.jpg', '123123'),
('MN-006', '123', 'KT-01', 'makanan', 123, '20160227_140220.jpg', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` char(6) NOT NULL,
  `nm_paket` varchar(50) NOT NULL,
  `hrg_paket` int(11) NOT NULL,
  `jml_menu` int(2) NOT NULL,
  `jml_bonus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `nm_paket`, `hrg_paket`, `jml_menu`, `jml_bonus`) VALUES
('PK-001', 'paket 1', 37500, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` char(5) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `almt_user` text NOT NULL,
  `jenkel_user` enum('pria','wanita') NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `level` enum('owner','admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `almt_user`, `jenkel_user`, `no_hp`, `username`, `password`, `level`) VALUES
('US-01', 'kika', 'kika', 'pria', '08816007580', 'kika', '$2y$10$UUm2G/YeQ9ixhZ.vbhAfFOVGhxEp9TxBPc9a/HbzmnpA0DdBsLrU2', 'admin');

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_bonus`
--
DROP TABLE IF EXISTS `tabel_bonus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_bonus`  AS  select `tb`.`id_bonus` AS `id_bonus`,`tm`.`id_menu` AS `id_menu`,`tm`.`nm_menu` AS `nm_menu` from (`tbl_bonus` `tb` join `tbl_menu` `tm`) where (`tb`.`id_menu` = `tm`.`id_menu`) order by `tb`.`id_bonus` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_detail_paket_bonus`
--
DROP TABLE IF EXISTS `tabel_detail_paket_bonus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_detail_paket_bonus`  AS  select `d`.`id_paket` AS `id_paket`,`b`.`id_bonus` AS `id_bonus`,`m`.`id_menu` AS `id_menu`,`m`.`nm_menu` AS `nm_menu`,`m`.`id_kat` AS `id_kat`,`m`.`tipe` AS `tipe`,`m`.`hrg_porsi` AS `hrg_porsi`,`m`.`gambar` AS `gambar`,`m`.`deskripsi` AS `deskripsi` from ((`tbl_detail_paket_bonus` `d` join `tbl_bonus` `b`) join `tbl_menu` `m`) where ((`d`.`id_bonus` = `b`.`id_bonus`) and (`b`.`id_menu` = `m`.`id_menu`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_detail_paket_menu`
--
DROP TABLE IF EXISTS `tabel_detail_paket_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_detail_paket_menu`  AS  select `d`.`id_paket` AS `id_paket`,`m`.`id_menu` AS `id_menu`,`m`.`nm_menu` AS `nm_menu`,`m`.`id_kat` AS `id_kat`,`m`.`tipe` AS `tipe`,`m`.`hrg_porsi` AS `hrg_porsi`,`m`.`gambar` AS `gambar`,`m`.`deskripsi` AS `deskripsi` from (`tbl_detail_paket_menu` `d` join `tbl_menu` `m`) where (`d`.`id_menu` = `m`.`id_menu`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_menu`
--
DROP TABLE IF EXISTS `tabel_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_menu`  AS  select `tm`.`id_menu` AS `id_menu`,`tm`.`nm_menu` AS `nm_menu`,`tk`.`nm_kat` AS `nm_kat`,`tm`.`tipe` AS `tipe`,`tm`.`hrg_porsi` AS `hrg_porsi`,`tm`.`gambar` AS `gambar`,`tm`.`deskripsi` AS `deskripsi`,`tk`.`id_kat` AS `id_kat` from (`tbl_menu` `tm` join `tbl_kategori` `tk`) where (`tm`.`id_kat` = `tk`.`id_kat`) order by `tm`.`id_menu` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bonus`
--
ALTER TABLE `tbl_bonus`
  ADD PRIMARY KEY (`id_bonus`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tbl_detail_paket_bonus`
--
ALTER TABLE `tbl_detail_paket_bonus`
  ADD PRIMARY KEY (`id_detail_paket_bonus`);

--
-- Indeks untuk tabel `tbl_detail_paket_menu`
--
ALTER TABLE `tbl_detail_paket_menu`
  ADD PRIMARY KEY (`id_detail_paket_menu`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `tbl_keterangan_paket`
--
ALTER TABLE `tbl_keterangan_paket`
  ADD PRIMARY KEY (`id_keterangan_paket`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_paket_bonus`
--
ALTER TABLE `tbl_detail_paket_bonus`
  MODIFY `id_detail_paket_bonus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_paket_menu`
--
ALTER TABLE `tbl_detail_paket_menu`
  MODIFY `id_detail_paket_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
