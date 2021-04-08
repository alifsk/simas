-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 04:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simas`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kegiatan`
--

CREATE TABLE `detail_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_kegiatan`
--

INSERT INTO `detail_kegiatan` (`id`, `kegiatan_id`, `foto`, `created_at`, `updated_at`) VALUES
(1, 6, NULL, '2021-03-30 23:46:03', '2021-03-30 23:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imam_sholat`
--

CREATE TABLE `imam_sholat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `muadzin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `imam_sholat`
--

INSERT INTO `imam_sholat` (`id`, `hari`, `users_id`, `muadzin`, `created_at`, `updated_at`) VALUES
(1, 'Ahad', 11, 'Rakhmad', '2021-03-08 07:08:51', '2021-03-10 05:22:38'),
(2, 'Senin', 8, 'Rizky', '2021-03-10 05:15:57', '2021-03-10 05:15:57'),
(3, 'Selasa', 10, 'Ilham', '2021-03-10 05:16:35', '2021-03-10 05:16:35'),
(4, 'Rabu', 11, 'Mujib', '2021-03-10 05:16:54', '2021-03-10 05:16:54'),
(5, 'Kamis', 7, 'Aril', '2021-03-10 05:17:20', '2021-03-10 05:17:20'),
(6, 'Jumat', 6, 'Bakhrul', '2021-03-10 05:17:44', '2021-03-10 05:17:44'),
(7, 'Sabtu', 4, 'Iqbal', '2021-03-10 05:19:22', '2021-03-10 05:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Khotmil Quran', '2021-03-08 07:10:11', '2021-03-08 07:10:11'),
(2, 'Pengajian', '2021-03-08 07:10:21', '2021-03-08 07:10:21'),
(3, 'Sholawat Akbar', '2021-03-08 07:10:31', '2021-03-08 07:10:31'),
(4, 'Kajian', '2021-03-08 07:10:38', '2021-03-08 07:10:38'),
(5, 'Tahlil', '2021-03-11 07:59:06', '2021-03-11 07:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_zakat`
--

CREATE TABLE `jenis_zakat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_zakat`
--

INSERT INTO `jenis_zakat` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Fitrah', '2021-03-08 06:51:57', '2021-03-08 06:51:57'),
(2, 'Maal', '2021-03-08 06:52:04', '2021-03-08 06:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `nama_kegiatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kegiatan_id` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `tgl`, `nama_kegiatan`, `jenis_kegiatan_id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '2021-03-11', 'Khotmil Quran Jumat Legi', 1, 'Kegiatan dimulai pukul 09.00 WIB.\r\nPeserta membawa Al-Quran, perlengkapan sholat sendiri-sendiri, dan Selalu menerapkan protokol kesehatan 3M.', '2021-03-08 07:11:40', '2021-03-11 08:38:42'),
(2, '2021-03-11', 'Memperingati Isra\' Mi\'raj Nabi Muhammad SAW', 3, 'Pukul : 19.00\r\nPeserta membawa perlengkapan sholat dari rumah masing-masing, menerapkan protokol kesehatan 3M', '2021-03-11 06:53:43', '2021-03-11 08:39:24'),
(3, '2021-03-13', 'Penerapan Ilmu Fiqih dikehidupan sehari-hari', 4, 'Pukul : Ba\'da Sholat Isya\'. \r\nPemateri : Ustad Maulana Malik Ibrahim. \r\nPeserta membawa kitab fiqih sendiri-sendiri, membawa perlengkapan sholat, menerapkan protokol kesehaatan 3M', '2021-03-11 07:56:47', '2021-03-11 09:27:58'),
(4, '2021-03-12', 'Tahlilan Online', 5, 'Via Google Meet : https://meet.google.com/yqa-djca-zpb. \r\nPukul : 19.30. \r\nPeserta wajib menyalakan microphone dan selalu mengikuti bacaan tahlil imam selama kegiatan berlangsung', '2021-03-11 08:01:46', '2021-03-11 09:26:41'),
(5, '2021-03-11', 'Pengajian Umum Memperingati Isra\' Mi\'raj Nabi Muhammad SAW', 2, 'Pukul : 19.00 WIB ba\'da Isya\'.\r\nPemateri : Ustad Ahmad Ali bin Assegaff. \r\nSelama berlangsungnya kegiatan peserta diwajibkan menerapkan protokol kesehatan 3M.', '2021-03-11 08:52:36', '2021-03-11 08:54:43'),
(6, '2021-03-15', 'Pengajian Rutin', 2, 'Pukul : Ba\'da Sholat Magrib. \r\nTopik : Menerapkan sunnah Rasul dalam menghadapi pandemi.\r\nPembicara : Ustad Ali Imron.', '2021-03-11 09:26:08', '2021-03-11 09:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `khutbah_jumat`
--

CREATE TABLE `khutbah_jumat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl` date NOT NULL,
  `users_id` int(11) NOT NULL,
  `topik` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khutbah_jumat`
--

INSERT INTO `khutbah_jumat` (`id`, `tgl`, `users_id`, `topik`, `created_at`, `updated_at`) VALUES
(1, '2021-03-12', 3, 'Hidup Sehat dengan Menerapkan Sunnah Nabi Muhammad SAW', '2021-03-08 07:04:26', '2021-03-08 07:04:26'),
(2, '2021-04-02', 8, 'Menerapkan Kehidupan Islamiah pada Era Modernisasi', '2021-04-01 04:08:37', '2021-04-01 04:08:37'),
(3, '2021-04-09', 9, 'Menyambut Bulan Penuh Berkah', '2021-04-01 04:10:16', '2021-04-01 04:10:16'),
(4, '2021-04-16', 10, 'Mengoptimalkan Ibadah di Bulan Suci Ramadhan', '2021-04-01 04:57:16', '2021-04-01 04:57:16'),
(5, '2021-04-23', 9, 'Beramal Sebanyak  - banyaknya di Bulan Ramadhan', '2021-04-01 04:58:19', '2021-04-01 04:58:19'),
(6, '2021-04-30', 7, 'Aktivitas dan Kegiatan yang dapat memberikan pahala besar pada bulan suci Ramadhan', '2021-04-01 05:01:41', '2021-04-01 05:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_04_135736_create_visi_table', 1),
(5, '2021_02_08_153647_create_jenis_zakat_table', 1),
(6, '2021_02_08_154556_create_zakat_table', 1),
(7, '2021_02_10_140030_create_misi_table', 1),
(8, '2021_02_11_045143_create_sumber_dana_table', 1),
(9, '2021_02_11_050225_create_jenis_kegiatan_table', 1),
(10, '2021_02_12_122604_create_kegiatan_table', 1),
(11, '2021_02_12_143715_create_pemasukan_table', 1),
(12, '2021_02_22_114907_create_pengeluaran_table', 1),
(13, '2021_02_25_123315_create_detail_kegiatan_table', 1),
(14, '2021_02_25_134937_create_gallery_table', 1),
(15, '2021_03_03_115344_create_khutbah_jumat_table', 1),
(16, '2021_03_04_120405_create_imam_sholat_table', 1),
(17, '2021_03_30_150904_create_muallaf_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `misi`
--

INSERT INTO `misi` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Ketuhanan yang Maha Esa.', '2021-03-08 05:22:55', '2021-03-11 05:54:38'),
(2, 'Menciptakan suasana kehidupan dan pemikiran yang Islami, khususnya di lingkungan masyarakat Minomartani dan umumnya di masyarakat luas.', '2021-03-11 05:54:17', '2021-03-11 05:54:17'),
(3, 'Membangun sistem pembinaan untuk menghasilkan intelektual muslim yang berakhlakul karimah, cerdas dan responsif.', '2021-03-11 05:54:33', '2021-03-11 05:54:33'),
(4, 'Mengembangkan model masyarakat Islami yang sesuai dengan tuntutan perkembangan zaman.', '2021-03-11 05:54:52', '2021-03-11 05:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `muallaf`
--

CREATE TABLE `muallaf` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kebangsaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` blob NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernyataan1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernyataan2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pernyataan3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `sumber_dana_id` int(11) NOT NULL,
  `jumlah_pemasukan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `tgl_pemasukan`, `sumber_dana_id`, `jumlah_pemasukan`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2021-01-01', 1, '2000000', 'Infaq Bulanan', '2021-03-08 06:50:31', '2021-04-04 06:12:42'),
(2, '2021-01-12', 2, '1500000', 'Riba pemberian PT. Motasa', '2021-03-28 06:50:16', '2021-03-28 06:50:16'),
(3, '2021-02-01', 4, '1500000', 'Wakaf Alm. Bapak Tukimin', '2021-03-29 04:59:24', '2021-03-29 04:59:24'),
(4, '2021-02-01', 1, '1850000', 'Kotak amal bulan Februari', '2021-03-29 05:00:52', '2021-03-29 05:00:52'),
(5, '2021-03-01', 1, '1550000', 'Kotak amal bulan Maret', '2021-03-29 05:01:42', '2021-03-29 09:09:15'),
(6, '2021-03-31', 1, '1985000', 'Infaq bulan maret', '2021-04-04 06:10:43', '2021-04-04 06:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jumlah_pengeluaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tgl_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2021-01-28', '985000', 'Pembayaraan Listrik Bulan Januari', '2021-03-09 05:28:05', '2021-03-09 05:28:05'),
(2, '2021-02-27', '1000000', 'Pembayaran Listrik Bulan Februari', '2021-03-09 05:29:01', '2021-03-09 05:29:01'),
(3, '2021-03-27', '975000', 'Bayar listrik bulan Maret', '2021-03-29 05:02:45', '2021-03-29 05:02:45'),
(4, '2021-03-18', '250000', 'Pembelian Keperluan Bulanan', '2021-03-29 07:47:21', '2021-03-29 07:47:21'),
(5, '2021-04-28', '1000000', 'Pembayaran listrik bulan April', '2021-03-29 08:02:30', '2021-03-29 08:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `sumber_dana`
--

CREATE TABLE `sumber_dana` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sumber_dana`
--

INSERT INTO `sumber_dana` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Infaq', '2021-03-08 06:49:59', '2021-03-08 06:49:59'),
(2, 'Riba', '2021-03-08 06:50:06', '2021-03-08 06:50:06'),
(3, 'Sumbangan', '2021-03-29 04:56:52', '2021-03-29 04:56:52'),
(4, 'Wakaf', '2021-03-29 04:57:03', '2021-03-29 04:57:03'),
(5, 'Sedekah', '2021-03-29 04:58:00', '2021-03-29 04:58:00'),
(6, 'Bantuan', '2021-03-29 04:58:10', '2021-03-29 04:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `telp`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alif Setyakurniawan', '085646023469', 'admin@role.test', NULL, '$2y$10$YXXuSOM51I6w3oGJ9HDBR.VX00MoM38JdtKam.f0AFW0Y0/lAO4Um', 1, NULL, '2021-03-08 04:54:41', '2021-03-08 04:54:41'),
(2, 'Mukhlis', '081359871623', 'bendahara@role.test', NULL, '$2y$10$WvN3dcCsnUIaGJ84aPK.FeYYrYtEjCB7FHQhDrv9BBWqFXGtk2bt2', 2, NULL, '2021-03-08 05:50:39', '2021-03-08 05:50:39'),
(3, 'M. Ali Assegaff', '08213482191', 'assegaff@role.test', NULL, '$2y$10$hq1DFZ5ifaQWeJbkHI7HUOUukTdhGCYg5xMwxbwQDHzzm4U4REX46', 3, NULL, '2021-03-08 06:14:38', '2021-03-08 06:14:38'),
(4, 'Ahmad Dahlan, S.Ag.', '089876351124', 'dahlan@role.test', NULL, '$2y$10$asT0SyzeaD9T0h.Ue6/bfOKGTMfhujxMSx7ur/2DGC67OM31dXj9i', 3, NULL, '2021-03-08 07:15:59', '2021-03-08 07:15:59'),
(5, 'Amin Rays, S.Ag.', '082463781632', 'amin@mail.com', NULL, '$2y$10$i88QFghpqm.gjJp7vm2/rexhvF2hbbQP1jm/8mfwgvVcNv2C54ObW', 3, NULL, '2021-03-09 05:02:03', '2021-03-09 05:06:06'),
(6, 'Muhammad Ali, M.Ag.', '081398765412', 'ali@mail.com', NULL, '$2y$10$e/Oa19wXDURuzphsf5D/8OgYUZM513.Truz9VIVYbsU/9qWvgT/IW', 3, NULL, '2021-03-09 05:05:29', '2021-03-09 05:05:29'),
(7, 'Abdul Shomad, S.Ag.', '087876512300', 'shomad@gmail.com', NULL, '$2y$10$ZVmeQKN6/EBwMutJv6QPguAfNOo6VJAEywXUK9IlAaSxTMnHXRBsO', 3, NULL, '2021-03-09 05:10:30', '2021-03-09 05:10:30'),
(8, 'H. M. Qodir Jaelani, M.Ag.', '0321458761211', 'qodir@mail.com', NULL, '$2y$10$tcIIzGmCSS3JFTGLdHEVluSHvRr6ZRXo/BvgH678f2GP4Q2ArE.CK', 3, NULL, '2021-03-09 05:14:55', '2021-03-09 05:14:55'),
(9, 'H. Khusnul Anam, S.Ag., M.Ag.', '032109873641', 'khusnul@gmail.com', NULL, '$2y$10$lE4TBncCSb0GNjJ9lyBz6emCOkYoGrTT6NC0fd1oFaS3mVRW/p.26', 3, NULL, '2021-03-09 05:16:28', '2021-03-09 05:16:28'),
(10, 'H. Imam Habibi, S.Ag.', '087653412131', 'imam@gmail.com', NULL, '$2y$10$D9J638OVw08v1Y9lN29lVuX0/5fWXWOOSfCyL3yoo6AyMFNf6pnqC', 3, NULL, '2021-03-09 05:17:36', '2021-03-09 05:17:36'),
(11, 'H. Ahmad Basri, M.Ag.', '089765142137', 'basri@gmail.com', NULL, '$2y$10$6f.Roen3eRmxnMbHjjxn9e.iO7MnLacGML04DA1.nFMmAHuW0ea0a', 3, NULL, '2021-03-09 05:18:51', '2021-03-09 05:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Menjadi masjid  yang mandiri sebagai wadah pembinaan insan, pengembangan masyarakat, dan pembangunan peradaban yang Islami', NULL, '2021-03-30 04:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `zakat`
--

CREATE TABLE `zakat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_zakat_id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `pembayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zakat`
--

INSERT INTO `zakat` (`id`, `jenis_zakat_id`, `tgl`, `pembayar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-01', 'Allison Pagac', 'Rp30000', '2021-03-08 06:56:12', '2021-03-08 06:56:12'),
(2, 1, '2021-04-23', 'Gaga Muhammad', 'Beras 2.5 kg', '2021-04-04 06:14:40', '2021-04-04 06:14:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imam_sholat`
--
ALTER TABLE `imam_sholat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_zakat`
--
ALTER TABLE `jenis_zakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khutbah_jumat`
--
ALTER TABLE `khutbah_jumat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muallaf`
--
ALTER TABLE `muallaf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zakat`
--
ALTER TABLE `zakat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kegiatan`
--
ALTER TABLE `detail_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imam_sholat`
--
ALTER TABLE `imam_sholat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_zakat`
--
ALTER TABLE `jenis_zakat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khutbah_jumat`
--
ALTER TABLE `khutbah_jumat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `muallaf`
--
ALTER TABLE `muallaf`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sumber_dana`
--
ALTER TABLE `sumber_dana`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zakat`
--
ALTER TABLE `zakat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
