-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 09:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenant_mmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_aksi`
--

CREATE TABLE `akses_aksi` (
  `id` int(11) NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `aksi` varchar(225) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_perubahan_user_tenant`
--

CREATE TABLE `log_perubahan_user_tenant` (
  `id` int(11) NOT NULL,
  `uuid` varchar(225) DEFAULT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `group_tenant` varchar(225) DEFAULT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `author` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `icon` varchar(225) DEFAULT NULL,
  `menu` varchar(225) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `uuid`, `icon`, `menu`, `link`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(1, '4ea3cf39-3226-11f0-89a0-080027307d45', 'fas fa-chart-line', 'Dashboard', '/dashboard', 1, 'M. Miftakhudin', '2025-05-16 14:20:55', NULL, NULL),
(2, '6bbe44f1-3226-11f0-89a0-080027307d45', 'fas fa-exchange-alt', 'Pendaftaran', '/pendaftaran', 1, 'M. Miftakhudin', '2025-05-16 14:21:44', 'M. Miftakhudin', '2025-05-26 07:37:49'),
(3, '77d1c31d-3226-11f0-89a0-080027307d45', 'fas fa-history', 'History', '/history', 1, 'M. Miftakhudin', '2025-05-16 14:22:04', NULL, NULL),
(4, '8ec7cd30-3226-11f0-89a0-080027307d45', 'fas fa-cogs', 'Config', '/config', 1, 'M. Miftakhudin', '2025-05-16 14:22:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_aksi`
--

CREATE TABLE `role_aksi` (
  `id` int(11) NOT NULL,
  `uuid_tenant` varchar(225) DEFAULT NULL,
  `uuid_aksi` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role_tenant`
--

CREATE TABLE `role_tenant` (
  `id` int(11) NOT NULL,
  `uuid_tenant` varchar(225) DEFAULT NULL,
  `uuid_menu` varchar(225) DEFAULT NULL,
  `uuid_submenu` varchar(225) DEFAULT NULL,
  `uuid_subsubmenu` varchar(225) DEFAULT NULL,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_tenant`
--

INSERT INTO `role_tenant` (`id`, `uuid_tenant`, `uuid_menu`, `uuid_submenu`, `uuid_subsubmenu`, `create_by`, `create_at`) VALUES
(1, '4f9803f6-2685-11f0-89a0-080027307d45', '4ea3cf39-3226-11f0-89a0-080027307d45', 'a3295cae-3226-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-16 14:27:33'),
(2, '4f9803f6-2685-11f0-89a0-080027307d45', '6bbe44f1-3226-11f0-89a0-080027307d45', NULL, NULL, 'M. Miftakhudin', '2025-05-16 14:27:33'),
(3, '4f9803f6-2685-11f0-89a0-080027307d45', '77d1c31d-3226-11f0-89a0-080027307d45', 'cbeb959d-3226-11f0-89a0-080027307d45', '085ccb00-3227-11f0-89a0-080027307d45', 'M. Miftakhudin', '2025-05-16 14:27:33'),
(4, '4f9803f6-2685-11f0-89a0-080027307d45', '8ec7cd30-3226-11f0-89a0-080027307d45', 'b60cc486-3226-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-16 14:27:33'),
(5, '4f9803f6-2685-11f0-89a0-080027307d45', '8ec7cd30-3226-11f0-89a0-080027307d45', 'e36af9ab-3226-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-16 14:27:33'),
(6, 'b618e171-2685-11f0-89a0-080027307d45', '4ea3cf39-3226-11f0-89a0-080027307d45', 'a3295cae-3226-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-20 14:50:51'),
(8, 'b618e171-2685-11f0-89a0-080027307d45', '6bbe44f1-3226-11f0-89a0-080027307d45', NULL, NULL, 'M. Miftakhudin', '2025-05-23 18:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `id_tenant` varchar(225) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0=false ; 1= true',
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `id_tenant`, `id_user`, `status`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(3, '4f9803f6-2685-11f0-89a0-080027307d45', 'dcc207d0-1b58-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-05-16 14:27:10', NULL, NULL),
(4, '1f58c9e0-2684-11f0-89a0-080027307d45', '55f11b5f-1cd8-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-05-20 14:31:42', NULL, NULL),
(5, 'b99bcbf3-2683-11f0-89a0-080027307d45', '55f11b5f-1cd8-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-05-20 14:31:42', NULL, NULL),
(11, 'b618e171-2685-11f0-89a0-080027307d45', '5348b544-354f-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-05-22 16:57:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `uuid_menu` varchar(225) DEFAULT NULL,
  `submenu` varchar(225) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL,
  `icon` varchar(225) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `uuid`, `uuid_menu`, `submenu`, `link`, `icon`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(1, 'a3295cae-3226-11f0-89a0-080027307d45', '4ea3cf39-3226-11f0-89a0-080027307d45', 'Dashboard', '/dashboard', NULL, 1, 'M. Miftakhudin', '2025-05-16 14:23:17', 'M. Miftakhudin', '2025-05-16 14:23:30'),
(2, 'b60cc486-3226-11f0-89a0-080027307d45', '8ec7cd30-3226-11f0-89a0-080027307d45', 'Config', '/subconfig', NULL, 1, 'M. Miftakhudin', '2025-05-16 14:23:49', NULL, NULL),
(3, 'cbeb959d-3226-11f0-89a0-080027307d45', '77d1c31d-3226-11f0-89a0-080027307d45', 'History', '/subhistory', NULL, 1, 'M. Miftakhudin', '2025-05-16 14:24:25', NULL, NULL),
(4, 'e36af9ab-3226-11f0-89a0-080027307d45', '8ec7cd30-3226-11f0-89a0-080027307d45', 'subsubconfig', '#', NULL, 1, 'M. Miftakhudin', '2025-05-16 14:25:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsubmenu`
--

CREATE TABLE `subsubmenu` (
  `id` int(11) NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `uuid_menu` varchar(225) DEFAULT NULL,
  `uuid_submenu` varchar(225) DEFAULT NULL,
  `subsubmenu` varchar(225) DEFAULT NULL,
  `icon` varchar(225) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subsubmenu`
--

INSERT INTO `subsubmenu` (`id`, `uuid`, `uuid_menu`, `uuid_submenu`, `subsubmenu`, `icon`, `link`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(1, '085ccb00-3227-11f0-89a0-080027307d45', '8ec7cd30-3226-11f0-89a0-080027307d45', 'e36af9ab-3226-11f0-89a0-080027307d45', 'Sub History', NULL, '/subsubhistory', 1, 'M. Miftakhudin', '2025-05-16 14:26:07', 'M. Miftakhudin', '2025-05-22 18:47:34'),
(2, 'c4be53f9-32cf-11f0-89a0-080027307d45', '8ec7cd30-3226-11f0-89a0-080027307d45', 'e36af9ab-3226-11f0-89a0-080027307d45', 'HistorySub  Test', NULL, '/subtest', 1, 'M. Miftakhudin', '2025-05-17 10:33:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `urutan` int(11) NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `nama_tenant` varchar(225) DEFAULT NULL,
  `nomor` varchar(225) DEFAULT NULL,
  `alamat` text,
  `is_active` int(11) DEFAULT '1' COMMENT '1= active;0= nonactive',
  `permission` text,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`urutan`, `uuid`, `nama_tenant`, `nomor`, `alamat`, `is_active`, `permission`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(3, 'd46f44fc-19aa-11f0-89a0-080027307d45', 'TES', '082342', 'jl.kenam', 0, NULL, NULL, '2025-04-15 10:36:34', 'M. Miftakhudin', '2025-04-15 14:35:34'),
(6, '81ae55f3-19c8-11f0-89a0-080027307d45', 'ewrwe', '125445745', 'dasdads', 0, NULL, 'M. Miftakhudin', '2025-04-15 14:09:00', 'M. Miftakhudin', '2025-04-15 14:37:02'),
(7, 'b7d0f85d-19c8-11f0-89a0-080027307d45', 'yrsdf', '0823423', 'sdasdasd', 1, NULL, 'M. Miftakhudin', '2025-04-15 14:10:31', NULL, NULL),
(8, '54fa660e-19c9-11f0-89a0-080027307d45', '123', '091231231', '12931239', 1, NULL, 'M. Miftakhudin', '2025-04-15 14:14:55', NULL, NULL),
(9, '76570a71-19c9-11f0-89a0-080027307d45', 'treas', '08123312', 'jffha', 1, NULL, 'M. Miftakhudin', '2025-04-15 14:15:51', NULL, NULL),
(10, '91c6bd08-19c9-11f0-89a0-080027307d45', 'tesasd', '0823423', 'oasodashd', 1, NULL, 'M. Miftakhudin', '2025-04-15 14:16:37', NULL, NULL),
(11, 'b66ef146-1a60-11f0-89a0-080027307d45', 'RSASDAS', '081231123123', 'Testing', 1, NULL, 'M. Miftakhudin', '2025-04-16 08:18:32', NULL, NULL),
(12, '57108368-1ccf-11f0-89a0-080027307d45', 'tes', '08123123', 'Teasdd', 1, NULL, 'M. Miftakhudin', '2025-04-19 10:35:29', NULL, NULL),
(13, '6bd4fece-1ccf-11f0-89a0-080027307d45', 'jari', '123123', 'rwaaa', 1, NULL, 'M. Miftakhudin', '2025-04-19 10:36:04', NULL, NULL),
(15, 'c6b73895-256d-11f0-89a0-080027307d45', 'Tenat BOASORTE', '081233121212', 'Jl.Kemana Saja', 1, NULL, 'M. Miftakhudin', '2025-04-30 09:49:46', NULL, NULL),
(16, '4733ddba-2663-11f0-89a0-080027307d45', 'Tes1222', '0923423', 'Tester', 1, NULL, 'M. Miftakhudin', '2025-05-01 15:07:08', NULL, NULL),
(17, '1063dc48-2664-11f0-89a0-080027307d45', 'trsfd', '089789789789', 'sdfsdfsdf', 1, NULL, 'M. Miftakhudin', '2025-05-01 15:12:46', NULL, NULL),
(18, 'e66d16a7-2669-11f0-89a0-080027307d45', 'trsfd', '089789789789', 'sdfsdfsdf', 1, NULL, 'M. Miftakhudin', '2025-05-01 15:54:32', NULL, NULL),
(19, 'b99bcbf3-2683-11f0-89a0-080027307d45', 'Tesd', '0812312', 'kdkdkdkdkd', 1, NULL, 'M. Miftakhudin', '2025-05-01 18:59:24', NULL, NULL),
(20, '1f58c9e0-2684-11f0-89a0-080027307d45', 'tes menu', '08123123', 'sdudbfsdf', 1, NULL, 'M. Miftakhudin', '2025-05-01 19:02:15', NULL, NULL),
(21, '4f9803f6-2685-11f0-89a0-080027307d45', 'cek sub menu subsubmenu', '078123123', 'Jl.jkebasd', 1, NULL, 'M. Miftakhudin', '2025-05-01 19:10:45', NULL, NULL),
(22, 'b618e171-2685-11f0-89a0-080027307d45', 'Kato Ojin', '0812312', '012381230', 1, NULL, 'M. Miftakhudin', '2025-05-01 19:13:37', 'M. Miftakhudin', '2025-05-20 14:47:53'),
(23, '4a32f128-27fa-11f0-89a0-080027307d45', 'Testing', '08234234', 'hfhfhf', 1, NULL, 'martajab anggiht kurniawan', '2025-05-03 15:40:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tenant`
--

CREATE TABLE `user_tenant` (
  `uuid` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tenant`
--

INSERT INTO `user_tenant` (`uuid`, `username`, `password`, `nama`, `is_admin`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
('5348b544-354f-11f0-89a0-080027307d45', 'kato.123', '$2y$10$eOvv3CcNZHJHJJIpkGxriOe8gpfUZxqcWn3e1mSlj8dhzWGs4L6Oa', 'KATO12', 0, 1, 'M. Miftakhudin', '2025-05-20 14:52:06', NULL, NULL),
('55f11b5f-1cd8-11f0-89a0-080027307d45', 'gestri', '$2y$10$q7XMuGNbDkd6ta1ByU0hTefED1mj.ZP3U.YNn5SRudWeR5Z/9oEPW', 'ges', 0, 1, 'M. Miftakhudin', '2025-04-19 11:39:53', NULL, NULL),
('ace9cfa0-1cd9-11f0-89a0-080027307d45', 'Teo', 'Tedi.123', 'Tedherik', 0, 1, 'M. Miftakhudin', '2025-04-19 11:49:28', 'M. Miftakhudin', '2025-04-21 17:03:11'),
('dcc207d0-1b58-11f0-89a0-080027307d45', 'sirs.123', '$2y$10$zuKnQK52XzR5iMAdRn0B4OjveWTjPSr.55NERNFJ1K5hL7KkL0xqm', 'SIRS', 1, 1, 'M. Miftakhudin', '2025-04-17 13:54:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_akses_aksi`
-- (See below for the actual view)
--
CREATE TABLE `view_akses_aksi` (
`uuid_tenant` varchar(225)
,`aksi` varchar(225)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_menu`
-- (See below for the actual view)
--
CREATE TABLE `view_menu` (
`uuid_tenant` varchar(225)
,`menu` varchar(225)
,`active_menu` int(11)
,`submenu` varchar(225)
,`active_submenu` int(11)
,`subsubmenu` varchar(225)
,`active_subsubmenu` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `view_akses_aksi`
--
DROP TABLE IF EXISTS `view_akses_aksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_akses_aksi`  AS  select `ra`.`uuid_tenant` AS `uuid_tenant`,`aa`.`aksi` AS `aksi` from (`role_aksi` `ra` left join `akses_aksi` `aa` on((`ra`.`uuid_aksi` = `aa`.`uuid`))) where (`aa`.`is_active` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `view_menu`
--
DROP TABLE IF EXISTS `view_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu`  AS  select `rt`.`uuid_tenant` AS `uuid_tenant`,`m`.`menu` AS `menu`,`m`.`is_active` AS `active_menu`,`sm`.`submenu` AS `submenu`,`sm`.`is_active` AS `active_submenu`,`ssm`.`subsubmenu` AS `subsubmenu`,`ssm`.`is_active` AS `active_subsubmenu` from (((`role_tenant` `rt` left join `menu` `m` on((`rt`.`uuid_menu` = `m`.`uuid`))) left join `submenu` `sm` on((`rt`.`uuid_submenu` = `sm`.`uuid`))) left join `subsubmenu` `ssm` on((`rt`.`uuid_subsubmenu` = `ssm`.`uuid`))) where (((`m`.`is_active` = 1) or isnull(`m`.`is_active`)) and ((`sm`.`is_active` = 1) or isnull(`sm`.`is_active`)) and ((`ssm`.`is_active` = 1) or isnull(`ssm`.`is_active`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_aksi`
--
ALTER TABLE `akses_aksi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `uuid_2` (`uuid`);

--
-- Indexes for table `log_perubahan_user_tenant`
--
ALTER TABLE `log_perubahan_user_tenant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_aksi`
--
ALTER TABLE `role_aksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uuid_tenant` (`uuid_tenant`,`uuid_aksi`) USING BTREE;

--
-- Indexes for table `role_tenant`
--
ALTER TABLE `role_tenant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_uuid` (`uuid_tenant`,`uuid_menu`,`uuid_submenu`,`uuid_subsubmenu`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uuid_menu` (`uuid_menu`,`uuid`) USING BTREE;

--
-- Indexes for table `subsubmenu`
--
ALTER TABLE `subsubmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uuid_menu` (`uuid_menu`,`uuid_submenu`) USING BTREE;

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`urutan`),
  ADD UNIQUE KEY `uuid` (`uuid`),
  ADD KEY `nama_tenant` (`nama_tenant`) USING BTREE;

--
-- Indexes for table `user_tenant`
--
ALTER TABLE `user_tenant`
  ADD PRIMARY KEY (`uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_aksi`
--
ALTER TABLE `akses_aksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_perubahan_user_tenant`
--
ALTER TABLE `log_perubahan_user_tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_aksi`
--
ALTER TABLE `role_aksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_tenant`
--
ALTER TABLE `role_tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subsubmenu`
--
ALTER TABLE `subsubmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `urutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
