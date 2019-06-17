-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2019 pada 10.13
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
,`id_kat` char(5)
,`tipe` enum('makanan','minuman')
,`hrg_porsi` int(11)
,`gambar` text
,`deskripsi` text
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
,`nm_kat` varchar(50)
,`tipe` enum('makanan','minuman')
,`hrg_porsi` int(11)
,`gambar` text
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
,`nm_kat` varchar(50)
,`tipe` enum('makanan','minuman')
,`hrg_porsi` int(11)
,`gambar` text
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
,`gambar` text
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
('BN-04', 'MN-003'),
('BN-05', 'MN-006'),
('BN-06', 'MN-009'),
('BN-07', 'MN-011');

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
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `nm_customer`, `almt_customer`, `jenkel_customer`, `no_hp`, `email`, `username`, `password`, `tanggal`, `photo`) VALUES
('1506190001', 'hhh', 'asd', 'pria', '12323', 'asdasd', 'eee', '$2y$10$EJZuVxaYSQkk6EuAuoe8xeAoErBHywY9EA9MCimUt/QjSkwhelq2.', '2019-06-15 10:51:35', ''),
('1605190001', 'kika', 'kikaqwe', 'pria', '08816007580', 'rizkika.palindungan1@gmail.com', 'kika', '$2y$10$vdK9GFXd91pVk8auMebwFe/HUmwasuOk3yfTk3EifpNaYJu4HOlFC', '2019-05-15 19:16:27', ''),
('1705190002', 'fadil', 'fadil222', 'pria', '273127310283', 'FADIL@GMAIL.COM', 'fadil', '$2y$10$PEY40zJIdLnk5kOO8eqeZu0r31/wY0qsnzZ2QAc/2pdSLFh8H6WVq', '2019-05-17 07:37:39', 'http://192.168.56.1/project_smtr4//upload/bukti_bayar/1705190002.jpeg'),
('2105190001', 'qwe', 'qwe', 'pria', '123', 'qwe@gmail.com', 'qwe', '$2y$10$ozdze4sgoQWxYBQSk.4tJeTTTy2U.XzFCeM1Evqbdq6aZtN2PiJuC', '2019-05-20 18:49:41', ''),
('2405190001', 'haha', 'haha', 'pria', '2o123ni', 'asdnasd', 'hehehe', '$2y$10$pVB2JiEW7ZJ8hrzNj2oPBuWfcUfhPM2ExKpeam9fQiFmsT.HIZXHe', '2019-05-23 17:27:24', ''),
('2905190001', 'Meta comel', 'Probolinggo', 'pria', '081111111', 'meta@gmail.com', 'meta', '$2y$10$p8p4qUDbQxmioEiGDQbNSOqSK8rxpHwzoixP/WjsUzNOFtGDOavX2', '2019-05-29 03:12:15', '');

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
(14, 'PK-001', 'BN-01'),
(16, 'PK-003', 'BN-05'),
(17, 'PK-004', 'BN-07');

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
(29, 'PK-001', 'MN-005'),
(40, 'PK-003', 'MN-005'),
(41, 'PK-003', 'MN-002'),
(42, 'PK-003', 'MN-006'),
(43, 'PK-003', 'MN-004'),
(44, 'PK-003', 'MN-006'),
(45, 'PK-003', 'MN-005'),
(46, 'PK-003', 'MN-006'),
(47, 'PK-003', 'MN-006'),
(48, 'PK-003', 'MN-006'),
(49, 'PK-003', 'MN-003'),
(50, 'PK-003', 'MN-008'),
(51, 'PK-003', 'MN-006'),
(52, 'PK-004', 'MN-002'),
(53, 'PK-004', 'MN-004'),
(54, 'PK-004', 'MN-006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kat` char(5) NOT NULL,
  `nm_kat` varchar(50) NOT NULL,
  `gmbr_kat` text NOT NULL,
  `desk_kat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kat`, `nm_kat`, `gmbr_kat`, `desk_kat`) VALUES
('KT-01', 'aneka bubur', 'Screenshot_2.png', 'qweqwe'),
('KT-02', 'aneka sup', 'children-environment-vector-57706.jpg', 'asfafasf adasdasdasd '),
('KT-03', 'aneka ayam', 'Default_routing.jpg', 'asda ad dasd ad as as dasd asdas'),
('KT-04', 'dessert', 'data-pattern-2024196_640.png', ' adaskas dadk adas as asd asd'),
('KT-05', 'aneka sate', 'mansion-160425_640.png', 'askd;aksd a jasd asdasd asdasd'),
('KT-06', 'mie ', 'add-button-blue-hi.png', 'adjasldj dasdasdd'),
('KT-07', 'gorengan', 'bookstack_libr_3024.png', 'asda sasdasdasdsds  a as das a da sdas ');

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
('KET-01', 'qwewqe');

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
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nm_menu`, `id_kat`, `tipe`, `hrg_porsi`, `gambar`, `deskripsi`) VALUES
('MN-002', 'sup ayam', 'KT-02', 'makanan', 123, '160_F_87463551_FZGEpWkpGl0zCsItLPjRuxvPYkAFLvNQ.jpg', '12323'),
('MN-003', 'bubur kacang ijo', 'KT-01', 'makanan', 3123, 'f22dd78fb59e98fecb07a42729df14c9.png', '123123'),
('MN-004', 'ayam goreng', 'KT-03', 'minuman', 10000, '54a92e960a8e80287574168ea5da3818.jpg', '123123'),
('MN-005', 'bubur kecap', 'KT-01', 'makanan', 15000, '08e305f2c2347e1dd7f98d62bda193ac.jpg', '123123'),
('MN-006', 'bubur ayam', 'KT-01', 'makanan', 123, 'e53d980681a837663005e6993fa5b444.jpg', '123'),
('MN-008', 'bubur saos', 'KT-01', 'minuman', 123, '8a544ffb998a27378d0d4ab4a64a7373.jpg', '12312312'),
('MN-009', 'sup wortel', 'KT-02', 'makanan', 12000, 'anime-girl-hairstyles_571455273b0f4.jpg', 'ahjshjasd ajhdkjasd  adjash adjhas'),
('MN-010', 'sup telor', 'KT-02', 'makanan', 0, '932a00d9c9b9b2c530a9f332a4420ec6--manga-hairstyles-drawing-hairstyles.jpg', 'ahasdjhashd'),
('MN-011', 'Nasi goreng', 'KT-03', 'makanan', 10000, '08e305f2c2347e1dd7f98d62bda193ac1.jpg', 'Enak');

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
('PK-001', 'paket 1', 37500, 2, 1),
('PK-003', 'paket 3', 34000, 12, 1),
('PK-004', 'PAket 4', 1000, 3, 1);

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
('US-01', 'kika', 'kika', 'pria', '08816007580', 'kika', '$2y$10$aX4B5JvFH6QxALpZZSXpK.iAmL2mHsd2aRjY8VlGvD4CN8ujBL2KK', 'admin'),
('US-02', 'meta', 'ini adalah meta', 'wanita', '081235612323', 'meta', '$2y$10$4VgXGgQNw4RdYariefFJju4OgOvfsa7Iqeha/vuBgAJOdyOKgdwhK', 'admin');

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_bonus`
--
DROP TABLE IF EXISTS `tabel_bonus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_bonus`  AS  select `tb`.`id_bonus` AS `id_bonus`,`tm`.`id_menu` AS `id_menu`,`tm`.`nm_menu` AS `nm_menu`,`tm`.`id_kat` AS `id_kat`,`tm`.`tipe` AS `tipe`,`tm`.`hrg_porsi` AS `hrg_porsi`,`tm`.`gambar` AS `gambar`,`tm`.`deskripsi` AS `deskripsi` from (`tbl_bonus` `tb` join `tbl_menu` `tm`) where (`tb`.`id_menu` = `tm`.`id_menu`) order by `tb`.`id_bonus` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_detail_paket_bonus`
--
DROP TABLE IF EXISTS `tabel_detail_paket_bonus`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_detail_paket_bonus`  AS  select `d`.`id_paket` AS `id_paket`,`b`.`id_bonus` AS `id_bonus`,`m`.`id_menu` AS `id_menu`,`m`.`nm_menu` AS `nm_menu`,`k`.`id_kat` AS `id_kat`,`k`.`nm_kat` AS `nm_kat`,`m`.`tipe` AS `tipe`,`m`.`hrg_porsi` AS `hrg_porsi`,`m`.`gambar` AS `gambar`,`m`.`deskripsi` AS `deskripsi` from (((`tbl_detail_paket_bonus` `d` join `tbl_bonus` `b`) join `tbl_menu` `m`) join `tbl_kategori` `k`) where ((`d`.`id_bonus` = `b`.`id_bonus`) and (`b`.`id_menu` = `m`.`id_menu`) and (`m`.`id_kat` = `k`.`id_kat`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tabel_detail_paket_menu`
--
DROP TABLE IF EXISTS `tabel_detail_paket_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tabel_detail_paket_menu`  AS  select `d`.`id_paket` AS `id_paket`,`m`.`id_menu` AS `id_menu`,`m`.`nm_menu` AS `nm_menu`,`k`.`id_kat` AS `id_kat`,`k`.`nm_kat` AS `nm_kat`,`m`.`tipe` AS `tipe`,`m`.`hrg_porsi` AS `hrg_porsi`,`m`.`gambar` AS `gambar`,`m`.`deskripsi` AS `deskripsi` from ((`tbl_detail_paket_menu` `d` join `tbl_menu` `m`) join `tbl_kategori` `k`) where ((`d`.`id_menu` = `m`.`id_menu`) and (`m`.`id_kat` = `k`.`id_kat`)) ;

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
  MODIFY `id_detail_paket_bonus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_paket_menu`
--
ALTER TABLE `tbl_detail_paket_menu`
  MODIFY `id_detail_paket_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
