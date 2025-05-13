-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 09:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `is_active` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `akses_aksi`
--

INSERT INTO `akses_aksi` (`id`, `uuid`, `aksi`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(2, '44345895-229c-11f0-89a0-080027307d45', 'ADD', 1, 'M. Miftakhudin', '2025-04-26 19:45:00', 'martajab anggiht kurniawan', '2025-05-03 16:44:37'),
(3, '1c004ee1-2806-11f0-89a0-080027307d45', 'EDIT', 1, 'martajab anggiht kurniawan', '2025-05-03 17:05:15', NULL, NULL);

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
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `group_tenant` varchar(225) DEFAULT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `author` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `is_active` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `uuid`, `icon`, `menu`, `link`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(1, '54aa7d76-2017-11f0-89a0-080027307d45', 'ICON', 'MENU TEST', '/testess', 1, 'M. Miftakhudin', '2025-04-23 14:48:22', 'M. Miftakhudin', '2025-05-01 19:41:56'),
(2, 'a3740990-2017-11f0-89a0-080027307d45', 'ICON 2', 'TESTER', '/sdae', 1, 'M. Miftakhudin', '2025-04-23 14:50:34', 'M. Miftakhudin', '2025-04-23 20:18:54'),
(3, '670cf623-202d-11f0-89a0-080027307d45', 'asdaad', 'Testing Admin', '123123123', 1, 'M. Miftakhudin', '2025-04-23 17:26:22', 'M. Miftakhudin', '2025-05-01 19:41:50'),
(4, 'acf4bac1-202d-11f0-89a0-080027307d45', 'TESTING ICON', 'TESTING MENU', 'MENUSa', 1, 'M. Miftakhudin', '2025-04-23 17:28:19', 'M. Miftakhudin', '2025-04-23 20:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_aksi`
--

CREATE TABLE `role_aksi` (
  `id` int(11) NOT NULL,
  `uuid_tenant` varchar(225) DEFAULT NULL,
  `uuid_aksi` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_aksi`
--

INSERT INTO `role_aksi` (`id`, `uuid_tenant`, `uuid_aksi`, `create_at`, `create_by`) VALUES
(8, '4a32f128-27fa-11f0-89a0-080027307d45', '44345895-229c-11f0-89a0-080027307d45', '2025-05-03 19:16:59', 'martajab anggiht kurniawan');

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
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_tenant`
--

INSERT INTO `role_tenant` (`id`, `uuid_tenant`, `uuid_menu`, `uuid_submenu`, `uuid_subsubmenu`, `create_by`, `create_at`) VALUES
(13, '4a32f128-27fa-11f0-89a0-080027307d45', '54aa7d76-2017-11f0-89a0-080027307d45', '8a94572d-2045-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-05 14:35:03'),
(14, '4a32f128-27fa-11f0-89a0-080027307d45', '670cf623-202d-11f0-89a0-080027307d45', NULL, NULL, 'M. Miftakhudin', '2025-05-05 14:35:03'),
(15, '4a32f128-27fa-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', '1c39515e-2040-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-05 14:35:03'),
(16, '4a32f128-27fa-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', '404b3a55-24b1-11f0-89a0-080027307d45', '7d9bd33a-2558-11f0-89a0-080027307d45', 'M. Miftakhudin', '2025-05-05 14:35:03'),
(17, '4a32f128-27fa-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'd3b62b06-20e2-11f0-89a0-080027307d45', '01478b4a-21bc-11f0-89a0-080027307d45', 'M. Miftakhudin', '2025-05-05 14:35:03'),
(18, '4a32f128-27fa-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'd3b62b06-20e2-11f0-89a0-080027307d45', '948044ed-24b5-11f0-89a0-080027307d45', 'M. Miftakhudin', '2025-05-05 14:35:03'),
(19, '4a32f128-27fa-11f0-89a0-080027307d45', 'acf4bac1-202d-11f0-89a0-080027307d45', '8ce031ef-2041-11f0-89a0-080027307d45', '57896707-2102-11f0-89a0-080027307d45', 'M. Miftakhudin', '2025-05-05 14:35:03'),
(20, 'b618e171-2685-11f0-89a0-080027307d45', '54aa7d76-2017-11f0-89a0-080027307d45', '8a94572d-2045-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-05 15:48:29'),
(22, 'b618e171-2685-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', '1c39515e-2040-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-05 16:15:59'),
(23, 'b618e171-2685-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', '404b3a55-24b1-11f0-89a0-080027307d45', NULL, 'M. Miftakhudin', '2025-05-05 16:15:59'),
(24, 'b618e171-2685-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'd3b62b06-20e2-11f0-89a0-080027307d45', '01478b4a-21bc-11f0-89a0-080027307d45', 'M. Miftakhudin', '2025-05-05 16:15:59'),
(25, 'b618e171-2685-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'd3b62b06-20e2-11f0-89a0-080027307d45', '948044ed-24b5-11f0-89a0-080027307d45', 'M. Miftakhudin', '2025-05-05 16:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `id_tenant` varchar(225) NOT NULL,
  `id_user` varchar(225) NOT NULL,
  `status` int(11) DEFAULT 0 COMMENT '0=false ; 1= true',
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `id_tenant`, `id_user`, `status`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(83, '6bd4fece-1ccf-11f0-89a0-080027307d45', 'ace9cfa0-1cd9-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:36:15', NULL, NULL),
(84, '57108368-1ccf-11f0-89a0-080027307d45', 'ace9cfa0-1cd9-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:36:15', NULL, NULL),
(85, 'b66ef146-1a60-11f0-89a0-080027307d45', 'ace9cfa0-1cd9-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:36:15', NULL, NULL),
(86, '91c6bd08-19c9-11f0-89a0-080027307d45', 'ace9cfa0-1cd9-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:36:15', NULL, NULL),
(87, '76570a71-19c9-11f0-89a0-080027307d45', 'ace9cfa0-1cd9-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:36:15', NULL, NULL),
(88, '54fa660e-19c9-11f0-89a0-080027307d45', 'ace9cfa0-1cd9-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:36:15', NULL, NULL),
(89, 'b7d0f85d-19c8-11f0-89a0-080027307d45', 'ace9cfa0-1cd9-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:36:15', NULL, NULL),
(90, '6bd4fece-1ccf-11f0-89a0-080027307d45', '55f11b5f-1cd8-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:38:10', NULL, NULL),
(91, '76570a71-19c9-11f0-89a0-080027307d45', '55f11b5f-1cd8-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:38:10', NULL, NULL),
(92, 'b7d0f85d-19c8-11f0-89a0-080027307d45', '55f11b5f-1cd8-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 21:38:10', NULL, NULL),
(93, '6bd4fece-1ccf-11f0-89a0-080027307d45', 'dcc207d0-1b58-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 22:40:47', NULL, NULL),
(94, 'b66ef146-1a60-11f0-89a0-080027307d45', 'dcc207d0-1b58-11f0-89a0-080027307d45', 1, 'M. Miftakhudin', '2025-04-21 22:40:47', NULL, NULL);

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
  `is_active` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `uuid`, `uuid_menu`, `submenu`, `link`, `icon`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(1, '1c39515e-2040-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'Submenu', 'tester', 'submenu', 1, 'M. Miftakhudin', '2025-04-23 19:40:17', 'M. Miftakhudin', '2025-04-25 17:00:01'),
(2, '8ce031ef-2041-11f0-89a0-080027307d45', 'acf4bac1-202d-11f0-89a0-080027307d45', 'tesMenu', 'asdasd', 'TOKAI', 1, 'M. Miftakhudin', '2025-04-23 19:50:35', 'M. Miftakhudin', '2025-04-23 20:22:24'),
(3, '8a94572d-2045-11f0-89a0-080027307d45', '54aa7d76-2017-11f0-89a0-080027307d45', 'submenu', 'asdasd', 'sss', 1, 'M. Miftakhudin', '2025-04-23 20:19:09', 'M. Miftakhudin', '2025-04-23 20:22:35'),
(4, 'd3b62b06-20e2-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'yrdd', 'sdfff', NULL, 1, 'M. Miftakhudin', '2025-04-24 15:05:03', 'M. Miftakhudin', '2025-04-29 11:19:52'),
(5, '404b3a55-24b1-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'Testing3', 'sss', NULL, 1, 'M. Miftakhudin', '2025-04-29 11:20:15', NULL, NULL);

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
  `is_active` int(11) NOT NULL DEFAULT 1,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subsubmenu`
--

INSERT INTO `subsubmenu` (`id`, `uuid`, `uuid_menu`, `uuid_submenu`, `subsubmenu`, `icon`, `link`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
(1, '57896707-2102-11f0-89a0-080027307d45', 'acf4bac1-202d-11f0-89a0-080027307d45', '8ce031ef-2041-11f0-89a0-080027307d45', 'Tes Subsubmenu', NULL, '/324234fffff', 1, 'M. Miftakhudin', '2025-04-24 18:50:39', 'M. Miftakhudin', '2025-04-25 16:53:44'),
(2, '01478b4a-21bc-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'd3b62b06-20e2-11f0-89a0-080027307d45', 'Tester', NULL, 'tester', 1, 'M. Miftakhudin', '2025-04-25 16:59:40', NULL, NULL),
(5, '948044ed-24b5-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', 'd3b62b06-20e2-11f0-89a0-080027307d45', 'tesste', NULL, 'ff', 1, 'M. Miftakhudin', '2025-04-29 11:51:14', NULL, NULL),
(6, '7d9bd33a-2558-11f0-89a0-080027307d45', 'a3740990-2017-11f0-89a0-080027307d45', '404b3a55-24b1-11f0-89a0-080027307d45', 'TRASD', NULL, 'sadasd', 0, 'M. Miftakhudin', '2025-04-30 07:17:24', 'M. Miftakhudin', '2025-05-05 16:13:59');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `urutan` int(11) NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_tenant` varchar(225) DEFAULT NULL,
  `nomor` varchar(225) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `is_active` int(11) DEFAULT 1 COMMENT '1= active;0= nonactive',
  `permission` text DEFAULT NULL,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(22, 'b618e171-2685-11f0-89a0-080027307d45', 'testing', '0812312', '012381230', 1, NULL, 'M. Miftakhudin', '2025-05-01 19:13:37', NULL, NULL),
(23, '4a32f128-27fa-11f0-89a0-080027307d45', 'Testing', '08234234', 'hfhfhf', 1, NULL, 'martajab anggiht kurniawan', '2025-05-03 15:40:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tenant`
--

CREATE TABLE `user_tenant` (
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `create_by` varchar(225) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_by` varchar(225) DEFAULT NULL,
  `modify_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_tenant`
--

INSERT INTO `user_tenant` (`uuid`, `username`, `password`, `nama`, `is_admin`, `is_active`, `create_by`, `create_at`, `modify_by`, `modify_at`) VALUES
('55f11b5f-1cd8-11f0-89a0-080027307d45', 'gestri', '$2y$10$q7XMuGNbDkd6ta1ByU0hTefED1mj.ZP3U.YNn5SRudWeR5Z/9oEPW', 'ges', 0, 1, 'M. Miftakhudin', '2025-04-19 11:39:53', NULL, NULL),
('ace9cfa0-1cd9-11f0-89a0-080027307d45', 'Teo', 'Tedi.123', 'Tedherik', 0, 1, 'M. Miftakhudin', '2025-04-19 11:49:28', 'M. Miftakhudin', '2025-04-21 17:03:11'),
('dcc207d0-1b58-11f0-89a0-080027307d45', 'sirs.123', '$2y$10$h6TivoQ6tKb2qe797nv6DeYm2/Wwy8IsgZggTff6drRq8uUQkQcQa', 'SIRS', 1, 1, 'M. Miftakhudin', '2025-04-17 13:54:52', NULL, NULL);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_akses_aksi`  AS SELECT `ra`.`uuid_tenant` AS `uuid_tenant`, `aa`.`aksi` AS `aksi` FROM (`role_aksi` `ra` left join `akses_aksi` `aa` on(`ra`.`uuid_aksi` = `aa`.`uuid`)) WHERE `aa`.`is_active` = 1 ;

-- --------------------------------------------------------

--
-- Structure for view `view_menu`
--
DROP TABLE IF EXISTS `view_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu`  AS SELECT `rt`.`uuid_tenant` AS `uuid_tenant`, `m`.`menu` AS `menu`, `m`.`is_active` AS `active_menu`, `sm`.`submenu` AS `submenu`, `sm`.`is_active` AS `active_submenu`, `ssm`.`subsubmenu` AS `subsubmenu`, `ssm`.`is_active` AS `active_subsubmenu` FROM (((`role_tenant` `rt` left join `menu` `m` on(`rt`.`uuid_menu` = `m`.`uuid`)) left join `submenu` `sm` on(`rt`.`uuid_submenu` = `sm`.`uuid`)) left join `subsubmenu` `ssm` on(`rt`.`uuid_subsubmenu` = `ssm`.`uuid`)) WHERE (`m`.`is_active` = 1 OR `m`.`is_active` is null) AND (`sm`.`is_active` = 1 OR `sm`.`is_active` is null) AND (`ssm`.`is_active` = 1 OR `ssm`.`is_active` is null) ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_tenant`
--
ALTER TABLE `role_tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subsubmenu`
--
ALTER TABLE `subsubmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `urutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
