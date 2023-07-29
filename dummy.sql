-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jul 2023 pada 02.40
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daser`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `uid`, `name`, `desc`, `point`, `created_at`, `updated_at`) VALUES
(1, 'BRG-978144', 'dolores', 'Veritatis aut voluptatem doloremque dolores consequuntur.', 9, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(2, 'BRG-186120', 'numquam', 'Aut rem enim alias et ut tenetur dolorum sed.', 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(3, 'BRG-138668', 'nesciunt', 'Repellat et fuga laudantium.', 7, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(4, 'BRG-201786', 'ducimus', 'Aut unde consequatur corporis dolorem pariatur.', 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(5, 'BRG-738322', 'nihil', 'Inventore optio impedit error error tenetur.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(6, 'BRG-334592', 'autem', 'Magni animi eos molestias velit similique.', 5, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(7, 'BRG-612005', 'quasi', 'Quia pariatur cupiditate rerum et facere eos qui.', 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(8, 'BRG-673147', 'expedita', 'Est accusamus deleniti excepturi id sed.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(9, 'BRG-814144', 'quia', 'Nam sint voluptatem odit facere dolorem totam.', 8, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(10, 'BRG-726059', 'ipsa', 'Expedita itaque consequatur quisquam facilis laboriosam.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(11, 'BRG-847405', 'enim', 'Quo fugit corporis adipisci voluptas veniam dolor.', 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(12, 'BRG-761251', 'consequatur', 'Eligendi impedit neque harum labore fugiat et provident.', 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(13, 'BRG-7681', 'sunt', 'Iure ipsa quo alias tempore sint voluptatem.', 8, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(14, 'BRG-749414', 'perferendis', 'Laborum autem non fuga.', 6, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(15, 'BRG-49713', 'tempora', 'Occaecati vero a magni.', 9, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(16, 'BRG-367267', 'vel', 'Pariatur ex aut praesentium error facilis consectetur.', 5, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(17, 'BRG-865770', 'earum', 'Deleniti porro numquam laudantium sapiente quia commodi.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(18, 'BRG-998494', 'sunt', 'Et architecto officiis aliquam aut.', 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(19, 'BRG-922940', 'corporis', 'Itaque aut ad modi vero.', 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(20, 'BRG-669113', 'velit', 'At ut ipsa molestias ea ex.', 7, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(21, 'BRG-497873', 'in', 'Et sequi sit et fugiat.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(22, 'BRG-505855', 'ullam', 'Nihil voluptas et qui aut praesentium.', 6, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(23, 'BRG-114882', 'consequatur', 'Consequatur rerum error et aliquam unde iure.', 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(24, 'BRG-102144', 'velit', 'Itaque unde ipsa ex et.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(25, 'BRG-451493', 'esse', 'Et asperiores aliquid enim fuga recusandae qui.', 6, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(26, 'BRG-844455', 'error', 'Quidem provident ipsam voluptatibus fuga accusantium.', 9, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(27, 'BRG-763642', 'excepturi', 'Ab itaque ut autem dignissimos in consectetur.', 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(28, 'BRG-364736', 'eaque', 'Placeat ab perspiciatis eum molestias dolores autem suscipit.', 8, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(29, 'BRG-651994', 'consequatur', 'Atque ratione in rerum quo.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(30, 'BRG-3880', 'quaerat', 'Vero impedit rerum eligendi recusandae delectus sit quis et.', 0, '2023-07-28 19:38:02', '2023-07-28 19:38:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msc_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teknisi` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_masuks`
--

INSERT INTO `barang_masuks` (`id`, `uid`, `msc_barang`, `id_teknisi`, `id_barang`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, 'KBH-3078-56', 'MSC-2183-88', 9, 28, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(2, 'KBH-4965-00', 'MSC-2456-56', 11, 12, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(3, 'KBH-6186-54', 'MSC-2204-85', 7, 7, 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(4, 'KBH-5697-17', 'MSC-7813-89', 4, 27, 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(5, 'KBH-3194-98', 'MSC-2968-59', 8, 13, 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(6, 'KBH-9465-12', 'MSC-7708-15', 9, 1, 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(7, 'KBH-3714-81', 'MSC-3665-51', 8, 30, 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(8, 'KBH-8293-80', 'MSC-5996-20', 7, 16, 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(9, 'KBH-1734-62', 'MSC-6782-31', 8, 18, 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(10, 'KBH-9248-20', 'MSC-9764-07', 3, 24, 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(11, 'KBH-9825-94', 'MSC-5916-82', 11, 12, 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(12, 'KBH-3502-01', 'MSC-2411-93', 3, 3, 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(13, 'KBH-5167-12', 'MSC-2657-31', 10, 17, 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(14, 'KBH-4993-38', 'MSC-3956-66', 2, 28, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(15, 'KBH-3573-74', 'MSC-1015-53', 8, 12, 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(16, 'KBH-9359-31', 'MSC-9511-31', 7, 28, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(17, 'KBH-2840-21', 'MSC-7897-71', 7, 18, 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(18, 'KBH-8578-09', 'MSC-6452-94', 2, 8, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(19, 'KBH-1756-39', 'MSC-9000-47', 9, 13, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(20, 'KBH-3751-43', 'MSC-6221-55', 8, 11, 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(21, 'KBH-6158-59', 'MSC-5690-04', 10, 20, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(22, 'KBH-3042-05', 'MSC-9804-79', 5, 8, 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(23, 'KBH-5487-20', 'MSC-6126-60', 5, 4, 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(24, 'KBH-1778-00', 'MSC-7222-71', 8, 3, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(25, 'KBH-9922-95', 'MSC-4116-90', 10, 15, 1, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(26, 'KBH-1065-62', 'MSC-0096-75', 2, 11, 4, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(27, 'KBH-5632-60', 'MSC-5879-90', 4, 28, 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(28, 'KBH-4726-97', 'MSC-9034-58', 10, 30, 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(29, 'KBH-5363-64', 'MSC-9218-54', 2, 29, 3, '2023-07-28 19:38:02', '2023-07-28 19:38:02'),
(30, 'KBH-8288-43', 'MSC-8267-36', 4, 26, 2, '2023-07-28 19:38:02', '2023-07-28 19:38:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `histories`
--

CREATE TABLE `histories` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msc_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_teknisi` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_teknisis`
--

CREATE TABLE `history_teknisis` (
  `id` bigint UNSIGNED NOT NULL,
  `id_teknisi` bigint UNSIGNED NOT NULL,
  `modul` json DEFAULT NULL,
  `performance` int NOT NULL DEFAULT '0',
  `target` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `point` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Selesai', 'Proses servis sudah selesai dengan kondisi bagus.', '2023-07-22 16:11:55', '2023-07-22 16:20:57'),
(2, 'AWP', 'Proses servis sudah membelikan komponen namun sulit ditemukan.', '2023-07-22 16:16:10', '2023-07-22 16:21:21'),
(3, 'OOC', 'Proses servis sedang berlangsung dan sedang menunggu komponen.', '2023-07-22 16:17:32', '2023-07-22 16:17:32'),
(4, 'Unrepair', 'Barang tidak dapat diperbaiki', '2023-07-28 19:38:02', '2023-07-28 19:38:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_20_171800_create_kategoris_table', 1),
(7, '2023_07_20_171837_create_barangs_table', 1),
(8, '2023_07_23_012401_create_barang_masuks_table', 1),
(9, '2023_07_23_013219_add_point_table_users', 1),
(10, '2023_07_23_013557_add_uid_barangs_table', 1),
(11, '2023_07_28_203937_create_histories_table', 1),
(12, '2023_07_28_213112_add_mscbarang_to_barang_masuks_table', 1),
(13, '2023_07_28_213515_create_history_teknisis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','teknisi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'teknisi',
  `point` int DEFAULT NULL COMMENT 'point teknisi',
  `status` tinyint(1) DEFAULT NULL COMMENT 'status teknisi',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `email`, `email_verified_at`, `password`, `role`, `point`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@admin.com', '2023-07-28 19:37:35', '$2y$10$bj8F1a.U9lTWuYmPyKR9We/xi./EdmM1mJXY0Sc9kXOYk.uTYGODK', 'admin', NULL, NULL, 'TxUMN0RHnw', '2023-07-28 19:37:35', '2023-07-28 19:37:35'),
(2, 'TECH86660', 'Melba Hahn', 'mstrosin@example.net', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 8, 1, 'Bu7B0kVF1T', '2023-07-28 19:38:02', '2023-07-28 19:40:11'),
(3, 'TECH91352', 'Dr. Jamar Keeling', 'block.gladyce@example.net', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, 'oRXtrtwp9F', '2023-07-28 19:38:02', '2023-07-28 19:40:11'),
(4, 'TECH68817', 'Edythe Barton', 'anibal.mertz@example.com', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, 'yihpXkBF6X', '2023-07-28 19:38:02', '2023-07-28 19:40:11'),
(5, 'TECH17061', 'Jermaine Lehner', 'dryan@example.com', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, 'koTQ5GKHuv', '2023-07-28 19:38:02', '2023-07-28 19:40:12'),
(6, 'TECH67229', 'Issac O\'Hara', 'von.brianne@example.com', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 0, 'NinQYasie8', '2023-07-28 19:38:02', '2023-07-28 19:40:12'),
(7, 'TECH25343', 'Barney Kozey', 'casper.elliott@example.com', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, 'xwh8rc8INA', '2023-07-28 19:38:02', '2023-07-28 19:40:12'),
(8, 'TECH51906', 'Jaclyn Ferry', 'colleen10@example.com', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, 'Tdr2Z5HV7g', '2023-07-28 19:38:02', '2023-07-28 19:40:12'),
(9, 'TECH76435', 'Kylie Lakin MD', 'claudie45@example.net', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, '6ysnu63Znl', '2023-07-28 19:38:02', '2023-07-28 19:40:12'),
(10, 'TECH97846', 'Miss Monique Lesch II', 'raina83@example.net', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, 'Jtnmwd7jck', '2023-07-28 19:38:02', '2023-07-28 19:40:12'),
(11, 'TECH89993', 'Laisha Schultz', 'jamaal.von@example.org', '2023-07-28 19:38:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', NULL, 1, 'vRcwFWhgdm', '2023-07-28 19:38:02', '2023-07-28 19:40:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuks_id_teknisi_foreign` (`id_teknisi`),
  ADD KEY `barang_masuks_id_barang_foreign` (`id_barang`),
  ADD KEY `barang_masuks_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_id_teknisi_foreign` (`id_teknisi`),
  ADD KEY `histories_id_barang_foreign` (`id_barang`),
  ADD KEY `histories_id_kategori_foreign` (`id_kategori`);

--
-- Indeks untuk tabel `history_teknisis`
--
ALTER TABLE `history_teknisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_teknisis_id_teknisi_foreign` (`id_teknisi`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uid_unique` (`uid`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_teknisis`
--
ALTER TABLE `history_teknisis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD CONSTRAINT `barang_masuks_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `barang_masuks_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`),
  ADD CONSTRAINT `barang_masuks_id_teknisi_foreign` FOREIGN KEY (`id_teknisi`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_id_barang_foreign` FOREIGN KEY (`id_barang`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `histories_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`),
  ADD CONSTRAINT `histories_id_teknisi_foreign` FOREIGN KEY (`id_teknisi`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `history_teknisis`
--
ALTER TABLE `history_teknisis`
  ADD CONSTRAINT `history_teknisis_id_teknisi_foreign` FOREIGN KEY (`id_teknisi`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
