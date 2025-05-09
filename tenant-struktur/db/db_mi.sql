-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 13.52
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(225) DEFAULT NULL,
  `nama_barang` varchar(225) DEFAULT NULL,
  `merk_barang` varchar(50) DEFAULT NULL,
  `jenis_barang` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL,
  `input_user` varchar(225) DEFAULT NULL,
  `waktu_input` datetime DEFAULT current_timestamp(),
  `update_user` varchar(225) DEFAULT NULL,
  `waktu_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id`, `id_barang`, `nama_barang`, `merk_barang`, `jenis_barang`, `gambar`, `satuan`, `active`, `input_user`, `waktu_input`, `update_user`, `waktu_update`) VALUES
(1, 'BR001', 'Lemari Pakaian', 'SHENAR', 13, '629c866bdc9a0.jpg', 3, 'ya', 'udin', '2022-05-27 21:22:45', 'cucun saodah', '2022-06-05 17:33:15'),
(2, 'BR002', 'Lemari Sepatu', 'GRACE RS 39', 13, '629c86b651aa4.jpg', 3, 'ya', 'cucun saodah', '2022-06-05 16:51:13', 'cucun saodah', '2022-06-05 17:34:30'),
(3, 'BR003', 'Kasur Pocket Spring Bad', 'Zinus', 12, '629c87408b0c3.jpg', 3, 'ya', 'cucun saodah', '2022-06-05 16:58:00', 'cucun saodah', '2022-06-05 17:36:48'),
(4, 'BR004', 'Kasur Lipat', 'SOTERA', 12, '629e9e2a85804.jpg', 3, 'ya', 'cucun saodah', '2022-06-05 17:00:25', 'cucun saodah', '2022-06-07 07:39:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `id_jenis` varchar(50) DEFAULT NULL,
  `nama_jenis` varchar(225) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL,
  `user_input` varchar(100) NOT NULL,
  `waktu_input` datetime NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(100) DEFAULT NULL,
  `waktu_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `id_jenis`, `nama_jenis`, `tanggal`, `active`, `user_input`, `waktu_input`, `user_update`, `waktu_update`) VALUES
(12, 'JB001', 'Kasur', '2022-05-24', 'ya', 'udin', '2022-05-24 20:58:22', 'udin', '2022-05-28 06:46:41'),
(13, 'JB002', 'Lemari', '2022-05-24', 'ya', 'udin', '2022-05-24 22:05:22', 'udin', '2022-05-28 08:43:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `id_satuan` varchar(50) DEFAULT NULL,
  `nama_satuan` varchar(225) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL,
  `user_input` varchar(100) DEFAULT NULL,
  `waktu_input` datetime NOT NULL DEFAULT current_timestamp(),
  `user_update` varchar(100) DEFAULT NULL,
  `waktu_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id`, `id_satuan`, `nama_satuan`, `tanggal`, `active`, `user_input`, `waktu_input`, `user_update`, `waktu_update`) VALUES
(3, 'ST001', 'Buah', '2022-05-24', 'ya', 'udin', '2022-05-24 21:07:21', 'udin', '2022-05-28 06:46:28'),
(4, 'ST002', 'Set', '2022-05-28', 'ya', 'udin', '2022-05-28 06:07:29', 'udin', '2022-05-28 08:46:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(225) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id`, `id_barang`, `stok`) VALUES
(1, 'BR-01', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `id_supplier` varchar(50) DEFAULT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat_supplier` text DEFAULT NULL,
  `kontak_supplier` varchar(100) DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL,
  `input_by` varchar(100) DEFAULT NULL,
  `input_at` datetime DEFAULT current_timestamp(),
  `update_by` varchar(100) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `id_supplier`, `nama_supplier`, `alamat_supplier`, `kontak_supplier`, `active`, `input_by`, `input_at`, `update_by`, `update_at`) VALUES
(4, 'SP001', 'DIO LIVING', 'Jl.Prof.Dr. Satrio Kav 11 Jakarta 12950 Indonesia                        ', '82240005456', 'ya', 'udin', '2022-05-24 21:20:19', 'udin', '2022-05-28 06:50:05'),
(23, 'SP002', 'qweqwdasd', '                       cxdcsd ', '23421', 'ya', 'cucun saodah', '2022-06-05 22:16:27', NULL, NULL),
(24, 'SP003', 'qweqw', 'ddd                        ', '1312313', 'ya', 'cucun saodah', '2022-06-05 22:16:49', NULL, NULL),
(25, 'SP004', 'adasd', '                        asda', '32234', 'ya', 'cucun saodah', '2022-06-05 22:16:57', NULL, NULL),
(26, 'SP005', 'dasdasd', '                        asda', '2142', 'ya', 'cucun saodah', '2022-06-05 22:17:04', NULL, NULL),
(27, 'SP006', 'dasda', '                        asda', '432423', 'ya', 'cucun saodah', '2022-06-05 22:17:12', NULL, NULL),
(28, 'SP007', 'casca', '                        asasd', '32423', 'ya', 'cucun saodah', '2022-06-05 22:17:21', NULL, NULL),
(29, 'SP008', 'scsss', '                        wqwq', '3442', 'ya', 'cucun saodah', '2022-06-05 22:17:35', NULL, NULL),
(30, 'SP009', 'casca', '                        wqw', '123123', 'ya', 'cucun saodah', '2022-06-05 22:17:44', NULL, NULL),
(31, 'SP0010', 'asdadsa', '                        qwqwd', '3242', 'ya', 'cucun saodah', '2022-06-05 22:18:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_keluar`
--

CREATE TABLE `t_keluar` (
  `id` int(100) NOT NULL,
  `id_trans_keluar` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` varchar(225) DEFAULT NULL,
  `jumlah_keluar` int(225) DEFAULT 0,
  `status` varchar(40) DEFAULT NULL,
  `insert_user` varchar(225) DEFAULT NULL,
  `insert_waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `update_user` varchar(225) DEFAULT NULL,
  `update_waktu` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_keluar`
--

INSERT INTO `t_keluar` (`id`, `id_trans_keluar`, `tanggal`, `id_barang`, `jumlah_keluar`, `status`, `insert_user`, `insert_waktu`, `update_user`, `update_waktu`) VALUES
(1, 'TRK001', '2018-01-20', 'BR001', 20, 'accept', 'suryati', '2022-06-05 17:13:47', NULL, '2022-06-05 17:21:32'),
(2, 'TRK002', '2018-01-21', 'BR001', 10, 'accept', 'suryati', '2022-06-05 17:14:14', 'suryati', '2022-06-05 17:22:07'),
(3, 'TRK003', '2018-01-22', 'BR002', 15, 'accept', 'suryati', '2022-06-05 17:14:47', NULL, '2022-06-05 17:22:41'),
(4, 'TRK004', '2022-06-09', 'BR001', 5, NULL, 'suryati', '2022-06-09 23:47:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_masuk`
--

CREATE TABLE `t_masuk` (
  `id` int(100) NOT NULL,
  `id_trans_masuk` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_barang` varchar(225) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `jumlah_masuk` int(225) DEFAULT 0,
  `insert_user` varchar(225) DEFAULT NULL,
  `insert_waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `update_user` varchar(225) DEFAULT NULL,
  `update_waktu` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_masuk`
--

INSERT INTO `t_masuk` (`id`, `id_trans_masuk`, `tanggal`, `id_barang`, `id_supplier`, `jumlah_masuk`, `insert_user`, `insert_waktu`, `update_user`, `update_waktu`) VALUES
(1, 'TRM002', '2018-01-18', 'BR001', 4, 40, 'udin', '2022-05-28 06:50:26', 'cucun saodah', '2022-06-05 17:19:16'),
(2, 'TRM001', '2018-01-19', 'BR002', 4, 50, 'cucun saodah', '2022-06-05 17:02:12', NULL, '2022-06-05 17:18:30'),
(3, 'TRM003', '2022-01-19', 'BR004', 4, 100, 'cucun saodah', '2022-06-05 17:11:15', NULL, '2022-06-05 17:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `jabatan` varchar(225) DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `username` varchar(225) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `input_by` varchar(50) DEFAULT NULL,
  `input_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_by` varchar(50) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `jabatan`, `jk`, `username`, `password`, `level`, `status`, `alamat`, `input_by`, `input_at`, `update_by`, `update_at`) VALUES
(2, 'regina', 'owner', 'Perempuan', 'regina', '$2y$10$8CEdqYHjoVEXuBmkjklrz.QVcSZTvAAuUMCz8rY7dBHPriBmN/O1.', 'user', 0, 'Jl.Keramat Jaya', 'regina', '2022-06-05 16:14:54', NULL, NULL),
(3, 'suryati', 'karyawan', 'Perempuan', 'ati', '$2y$10$YJrQygFrVC9N6Dbx5KDdeOVRfhnI0t.GLVnZ9pg4LuYFOso4WVa9.', 'user', 0, 'Jl.Keramat Jaya', 'suryati', '2022-06-05 16:15:42', NULL, NULL),
(4, 'cucun saodah', 'admin gudang', 'Perempuan', 'cucun', '$2y$10$KrawBdyOsGVvOnVvD21ybumMQ6JlvLLxnaeFS3ZQXlEaOitzr2cni', 'admin', 0, 'Jl.Kramat Jaya\n                            ', 'cucun saodah', '2022-06-28 08:27:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_databarang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_databarang` (
`id` int(11)
,`id_barang` varchar(225)
,`nama_barang` varchar(225)
,`merk_barang` varchar(50)
,`jenis_barang` int(11)
,`gambar` varchar(255)
,`nama_jenis` varchar(225)
,`nama_satuan` varchar(225)
,`active` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_keluar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_keluar` (
`id` int(100)
,`tanggal` date
,`id_barang` varchar(225)
,`id_trans_keluar` varchar(50)
,`nama_barang` varchar(225)
,`merk_barang` varchar(50)
,`jenis_barang` int(11)
,`nama_satuan` varchar(225)
,`jumlah_keluar` int(225)
,`status` varchar(40)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_masuk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_masuk` (
`id` int(100)
,`id_trans_masuk` varchar(50)
,`tanggal` date
,`id_barang` varchar(225)
,`nama_barang` varchar(225)
,`merk_barang` varchar(50)
,`jenis_barang` int(11)
,`nama_satuan` varchar(225)
,`jumlah_masuk` int(225)
,`nama_supplier` varchar(100)
,`waktu` datetime
,`id_supplier` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_stok`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_stok` (
`id_barang` varchar(225)
,`merk_barang` varchar(50)
,`nama_satuan` varchar(225)
,`status` varchar(40)
,`jenis_barang` int(11)
,`jumlah_masuk` int(225)
,`jumlah_keluar` int(225)
,`stok` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_databarang`
--
DROP TABLE IF EXISTS `view_databarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_databarang`  AS SELECT `a`.`id` AS `id`, `a`.`id_barang` AS `id_barang`, `a`.`nama_barang` AS `nama_barang`, `a`.`merk_barang` AS `merk_barang`, `a`.`jenis_barang` AS `jenis_barang`, `a`.`gambar` AS `gambar`, `b`.`nama_jenis` AS `nama_jenis`, `c`.`nama_satuan` AS `nama_satuan`, `a`.`active` AS `active` FROM ((`data_barang` `a` join `jenis_barang` `b` on(`a`.`jenis_barang` = `b`.`id`)) join `satuan` `c` on(`a`.`satuan` = `c`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_keluar`
--
DROP TABLE IF EXISTS `view_data_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_keluar`  AS SELECT `a`.`id` AS `id`, `a`.`tanggal` AS `tanggal`, `b`.`id_barang` AS `id_barang`, `a`.`id_trans_keluar` AS `id_trans_keluar`, `b`.`nama_barang` AS `nama_barang`, `b`.`merk_barang` AS `merk_barang`, `b`.`jenis_barang` AS `jenis_barang`, `b`.`nama_satuan` AS `nama_satuan`, `a`.`jumlah_keluar` AS `jumlah_keluar`, `a`.`status` AS `status` FROM (`t_keluar` `a` join `view_databarang` `b` on(`a`.`id_barang` = `b`.`id_barang`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_masuk`
--
DROP TABLE IF EXISTS `view_data_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_masuk`  AS SELECT `a`.`id` AS `id`, `a`.`id_trans_masuk` AS `id_trans_masuk`, `a`.`tanggal` AS `tanggal`, `b`.`id_barang` AS `id_barang`, `b`.`nama_barang` AS `nama_barang`, `b`.`merk_barang` AS `merk_barang`, `b`.`jenis_barang` AS `jenis_barang`, `b`.`nama_satuan` AS `nama_satuan`, `a`.`jumlah_masuk` AS `jumlah_masuk`, `c`.`nama_supplier` AS `nama_supplier`, `a`.`insert_waktu` AS `waktu`, `a`.`id_supplier` AS `id_supplier` FROM ((`t_masuk` `a` join `view_databarang` `b` on(`a`.`id_barang` = `b`.`id_barang`)) join `supplier` `c` on(`a`.`id_supplier` = `c`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_stok`
--
DROP TABLE IF EXISTS `view_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok`  AS SELECT `gabung`.`id_barang` AS `id_barang`, `gabung`.`merk_barang` AS `merk_barang`, `gabung`.`nama_satuan` AS `nama_satuan`, `gabung`.`status` AS `status`, `gabung`.`jenis_barang` AS `jenis_barang`, `gabung`.`jumlah_masuk` AS `jumlah_masuk`, `gabung`.`jumlah_keluar` AS `jumlah_keluar`, sum(`gabung`.`jumlah_masuk`) - sum(`gabung`.`jumlah_keluar`) AS `stok` FROM (select `view_data_masuk`.`id_barang` AS `id_barang`,`view_data_masuk`.`merk_barang` AS `merk_barang`,`view_data_masuk`.`jenis_barang` AS `jenis_barang`,`view_data_masuk`.`jumlah_masuk` AS `jumlah_masuk`,0 AS `jumlah_keluar`,`view_data_masuk`.`nama_satuan` AS `nama_satuan`,NULL AS `status` from `view_data_masuk` union select `view_data_keluar`.`id_barang` AS `id_barang`,`view_data_keluar`.`merk_barang` AS `merk_barang`,`view_data_keluar`.`jenis_barang` AS `jenis_barang`,0 AS `jumlah_masuk`,if(`view_data_keluar`.`status` = 'accept',`view_data_keluar`.`jumlah_keluar`,0) AS `jumlah_keluar`,`view_data_keluar`.`nama_satuan` AS `nama_satuan`,`view_data_keluar`.`status` AS `status` from `view_data_keluar`) AS `gabung` GROUP BY `gabung`.`id_barang` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_keluar`
--
ALTER TABLE `t_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_masuk`
--
ALTER TABLE `t_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `t_keluar`
--
ALTER TABLE `t_keluar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_masuk`
--
ALTER TABLE `t_masuk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
