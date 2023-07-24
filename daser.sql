-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Jul 2023 pada 15.10
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
(2, 'MSC198216', 'Laptop', 'Jenis layanan: Ada beberapa jenis layanan yang tersedia untuk service laptop, seperti perbaikan hardware, instalasi software, upgrade komponen, dan pembersihan atau perawatan rutin.', 5, '2023-07-22 18:41:23', '2023-07-22 18:41:23'),
(6, 'MSC325810', 'maxime', 'Voluptatum veniam nam dolorem molestiae consequuntur qui.', 5, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(7, 'MSC860290', 'inventore', 'Rem dolorum voluptas nihil non adipisci porro ipsa.', 5, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(8, 'MSC209001', 'ipsam', 'Sapiente eum numquam in.', 5, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(9, 'MSC34096', 'est', 'Blanditiis sed consequatur qui a deleniti accusamus aliquam.', 4, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(15, 'MSC782532', 'impedit', 'Rerum incidunt libero voluptatibus.', 6, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(29, 'MSC117729', 'optio', 'Culpa aut rem et nemo eaque.', 6, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(55, 'MSC540303', 'et', 'Sed dicta minus laborum vel ut.', 8, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(99, 'MSC190772', 'cupiditate', 'Qui consequuntur harum nihil quia.', 9, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(638, 'MSC909937', 'et', 'Et nihil dolor nihil error nulla atque.', 5, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(2062, 'MSC973965', 'sed', 'Laudantium nobis quo dolor qui.', 8, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(5006, 'MSC319973', 'blanditiis', 'Harum provident voluptatem suscipit doloremque quam blanditiis odio omnis.', 2, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(6117, 'MSC444826', 'qui', 'Laboriosam id et tempora alias necessitatibus assumenda repudiandae.', 5, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(6414, 'MSC631768', 'ullam', 'Suscipit maxime consequatur dolores quas vero debitis nemo.', 0, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(6961, 'MSC418956', 'est', 'Consequuntur veritatis libero voluptatem reiciendis natus magnam sit.', 3, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(7143, 'MSC71756', 'neque', 'Omnis eligendi sequi eaque sint aut.', 3, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(41237, 'MSC65828', 'ducimus', 'Necessitatibus quia esse aut culpa accusantium.', 0, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(52341, 'MSC611776', 'officia', 'Qui et et corporis laboriosam officia enim.', 1, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(52436, 'MSC322179', 'et', 'Dignissimos deleniti dolor nemo ullam earum quasi.', 8, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(81071, 'MSC52531', 'quis', 'Quam corporis quas dolor sed et quam similique repellat.', 1, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(102797, 'MSC40678', 'dolor', 'Quia nisi consequatur autem in corrupti asperiores.', 5, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(135877, 'MSC80131', 'voluptatem', 'Quia recusandae esse expedita in.', 6, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(720689, 'MSC323614', 'ea', 'Vero quidem et a aut.', 6, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(911858, 'MSC312524', 'facilis', 'Enim blanditiis animi perferendis cumque quia praesentium saepe ducimus.', 7, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(973634, 'MSC91888', 'quos', 'Accusamus enim impedit tempora qui voluptates qui commodi voluptatem.', 7, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(2015794, 'MSC558752', 'odio', 'Eos inventore est error facilis.', 8, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(2133546, 'MSC127629', 'repellat', 'Quibusdam error magnam ex deserunt harum non.', 2, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(2726726, 'MSC534619', 'aut', 'Earum facere quos dolorem debitis impedit.', 0, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(3013603, 'MSC526523', 'totam', 'Iure ut odit id est qui similique blanditiis.', 7, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(5374329, 'MSC853023', 'vero', 'Assumenda quia fugit nam recusandae pariatur quia rerum.', 1, '2023-07-23 10:10:15', '2023-07-23 10:10:15'),
(5909400, 'MSC986961', 'et', 'Possimus architecto repellendus doloremque dolorum qui non fuga aliquid.', 9, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(9515655, 'MSC493236', 'dolores', 'Consequuntur culpa aspernatur deserunt a fuga aperiam.', 6, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(36374892, 'MSC75567', 'aliquid', 'Laudantium tempora sed aut vel natus unde.', 4, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(42375589, 'MSC900706', 'non', 'Maxime molestias culpa dolorem et.', 1, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(53456730, 'MSC279635', 'et', 'Possimus rerum vitae ea qui.', 7, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(66628880, 'MSC35924', 'eos', 'Molestiae aperiam sequi doloremque laudantium provident repellat itaque.', 5, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(83751516, 'MSC515485', 'consequatur', 'Sed sint consequatur eius sit.', 0, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(89617019, 'MSC985765', 'ea', 'Qui quis iure impedit ut itaque.', 4, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(532465954, 'MSC559465', 'facilis', 'Ducimus recusandae neque aliquam enim.', 6, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(911757476, 'MSC595526', 'perferendis', 'Nisi et dicta esse aut magni et.', 2, '2023-07-23 10:10:06', '2023-07-23 10:10:06'),
(911757477, 'MSC958278', 'totam', 'Aspernatur temporibus animi minima ut accusamus corrupti officiis.', 6, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757478, 'MSC918834', 'officia', 'Labore optio assumenda ea soluta aut beatae sequi sapiente.', 2, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757479, 'MSC663341', 'totam', 'Neque nesciunt dolore et in commodi a quis quasi.', 3, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757480, 'MSC105336', 'non', 'Et incidunt magnam vitae ducimus nam.', 6, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757481, 'MSC555683', 'ea', 'Ut veniam corporis aut numquam aut inventore.', 5, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757482, 'MSC896644', 'nihil', 'Sapiente iure ut atque.', 8, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757483, 'MSC830036', 'vitae', 'Debitis praesentium perspiciatis nemo unde incidunt excepturi consequatur provident.', 8, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757484, 'MSC66202', 'id', 'Quo doloribus ducimus nulla libero velit non numquam eos.', 8, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757485, 'MSC34291', 'soluta', 'Dolores magni quod id quia ipsa enim ut dolore.', 6, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757486, 'MSC549217', 'tenetur', 'Ea ab voluptas eos aut.', 6, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757487, 'MSC625455', 'molestiae', 'Corporis consequatur expedita alias enim.', 1, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757488, 'MSC703832', 'incidunt', 'Corporis nulla non odit et modi nihil et possimus.', 5, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757489, 'MSC891027', 'non', 'Magnam autem at mollitia reprehenderit.', 6, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757490, 'MSC294600', 'ducimus', 'Voluptatum et iusto iure.', 3, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757491, 'MSC394431', 'enim', 'Sed quae minus temporibus in.', 8, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757492, 'MSC920846', 'sit', 'Quibusdam quia nisi fugit sit earum vero praesentium.', 6, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757493, 'MSC44363', 'quis', 'Perferendis et est expedita.', 2, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757494, 'MSC192296', 'minus', 'Itaque rerum velit inventore voluptas quaerat hic.', 9, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757495, 'MSC797553', 'corporis', 'Neque facilis repellat nemo a dignissimos in temporibus.', 0, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757496, 'MSC395751', 'non', 'Quia nemo qui eum aliquid a eaque qui.', 1, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757497, 'MSC89581', 'saepe', 'Ut impedit sed itaque aperiam non dolorum nisi.', 3, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757498, 'MSC689361', 'consequatur', 'Accusantium soluta officia porro necessitatibus.', 1, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757499, 'MSC13675', 'voluptatem', 'Tempore suscipit minima officia libero repudiandae asperiores enim.', 0, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757500, 'MSC760261', 'qui', 'Et debitis minima ipsum enim in id illo est.', 0, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757501, 'MSC689542', 'sit', 'Et enim impedit porro quo iure.', 3, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757502, 'MSC449198', 'harum', 'Voluptas culpa dicta debitis cumque est architecto aut unde.', 6, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757503, 'MSC594491', 'commodi', 'Rerum eos quis et.', 3, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757504, 'MSC338996', 'ut', 'Autem aspernatur et facilis omnis.', 9, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757505, 'MSC206838', 'sed', 'Quam ipsum qui sit velit quis odit in asperiores.', 3, '2023-07-23 10:10:37', '2023-07-23 10:10:37'),
(911757506, 'MSC439309', 'beatae', 'Est vero quis nobis aut.', 7, '2023-07-23 10:10:37', '2023-07-23 10:10:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint UNSIGNED NOT NULL,
  `uid` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_teknisi` bigint UNSIGNED NOT NULL,
  `id_barang` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_masuks`
--

INSERT INTO `barang_masuks` (`id`, `uid`, `id_teknisi`, `id_barang`, `id_kategori`, `created_at`, `updated_at`) VALUES
(1, 'KBH-2407-00', 13, 2, 4, '2023-07-23 16:14:30', '2023-07-24 02:36:12'),
(2, 'KBH-2407-00', 12, 2, 1, '2023-07-23 16:14:30', '2023-07-24 02:06:48'),
(3, 'KBH-2407-00', 13, 2, 3, '2023-07-23 16:14:30', '2023-07-24 02:36:12'),
(4, 'KBH-2407-00', 12, 2, 3, '2023-07-23 16:14:31', '2023-07-23 22:12:09'),
(5, 'KBH-2407-00', 14, 29, 1, '2023-07-23 16:14:31', '2023-07-24 02:08:51'),
(6, 'KBH-0204-01', 17, 42375589, 2, '2023-07-23 18:52:10', '2023-07-24 02:36:49'),
(7, 'KBH-0204-01', 14, 911757482, 1, '2023-07-23 18:52:10', '2023-07-24 02:08:51'),
(8, 'KBH-0204-00', 12, 29, NULL, '2023-07-24 04:31:28', '2023-07-24 04:31:28'),
(9, 'KBH-2407-00', 13, 2133546, NULL, '2023-07-24 05:33:10', '2023-07-24 05:33:10'),
(10, 'KBH-0204-01', 13, 2, NULL, '2023-07-24 05:33:43', '2023-07-24 05:33:43'),
(11, 'KBH-0204-32', 12, 911757480, 1, '2023-07-24 05:35:12', '2023-07-24 06:00:32'),
(12, 'KBH-0204-20', 12, 99, NULL, '2023-07-24 05:36:00', '2023-07-24 05:36:00'),
(13, 'KBH-0204-20', 12, 99, NULL, '2023-07-24 05:36:42', '2023-07-24 05:36:42'),
(14, 'KBH-0204-32', 13, 911757499, 2, '2023-07-24 05:37:50', '2023-07-24 06:00:32'),
(15, 'KBH-0204-32', 14, 911757499, 3, '2023-07-24 05:37:50', '2023-07-24 06:00:32'),
(16, 'KBH-0204-32', 13, 911757499, 1, '2023-07-24 05:38:07', '2023-07-24 06:08:44'),
(17, 'KBH-0204-32', 14, 911757499, 1, '2023-07-24 05:38:07', '2023-07-24 06:04:46'),
(18, 'KBH-0204-32', 14, 2133546, 2, '2023-07-24 05:40:20', '2023-07-24 06:07:11'),
(19, 'KBH-0204-32', 15, 911757505, 2, '2023-07-24 05:40:20', '2023-07-24 06:07:39'),
(20, 'KBH-0204-32', 17, 911757505, 1, '2023-07-24 05:40:20', '2023-07-24 06:07:39'),
(21, 'KBH-0204-33', 13, 8, NULL, '2023-07-24 06:16:46', '2023-07-24 06:16:46'),
(22, 'KBH-0204-33', 13, 2133546, NULL, '2023-07-24 06:16:46', '2023-07-24 06:16:46');

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
(2, 'AWP', 'Proses servis sudah membelikan komponen namun sulit untuk di servis.', '2023-07-22 16:16:10', '2023-07-22 16:21:21'),
(3, 'OOC', 'Proses servis sedang berlangsung dan sedang menunggu komponen', '2023-07-22 16:17:32', '2023-07-22 16:17:32'),
(4, 'Unrepair', 'Barang tidak dapat diperbaiki', '2023-07-22 16:18:36', '2023-07-22 16:18:36');

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
(8, '2023_07_20_171837_create_barangs_table', 2),
(9, '2023_07_23_012401_create_barang_masuks_table', 3),
(10, '2023_07_23_013219_add_point_table_users', 4),
(11, '2023_07_23_013557_add_uid_barangs_table', 4);

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
  `point` int DEFAULT '0' COMMENT 'point teknisi',
  `status` tinyint(1) DEFAULT NULL COMMENT 'status point teknisi',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `email`, `email_verified_at`, `password`, `role`, `point`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@admin.com', '2023-07-20 10:46:18', '$2y$10$gGcV6pfpyanpI9HfmmgFNeOC6pdWC.bx3vHXv.nVU.VsqjE0UmxXO', 'admin', NULL, NULL, 'DkwL860pTeXaXwIX66WyF9YMcIJHkgDTKzNGfBdRATGrKQpwbG8FCf1c4MGB', '2023-07-20 10:46:18', '2023-07-20 10:46:18'),
(12, 'TECH001', 'Teknisi', 'teknisi@gmail.com', NULL, '$2y$10$LW6KBTaUPgsoAltjvI0R9OGSD.gbaosI6WzjTzkKzVOhWiymDtn1C', 'teknisi', 26, 0, NULL, '2023-07-22 18:12:43', '2023-07-24 07:00:39'),
(13, 'TECH57495', 'Marie McCullough', 'alycia81@example.com', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 12, 0, 'eXrWeyErOg', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(14, 'TECH30716', 'Miss Claudia Mitchell IV', 'bulah.lowe@example.net', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 16, 1, '1JB1L09M9U', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(15, 'TECH59063', 'Prof. Corine Champlin IV', 'chandler53@example.org', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 3, 1, 'AtHdGooERh', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(16, 'TECH21841', 'Loren Kuhn', 'zane75@example.net', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 0, 0, 'BvpAy6hw9K', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(17, 'TECH36945', 'Julio Swaniawski', 'misael.sauer@example.com', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 4, 1, 'aIomu5OVXh', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(18, 'TECH23822', 'Miss Myrtis Littel Jr.', 'chase.adams@example.com', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 0, 0, 'I45ktAArTa', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(19, 'TECH68288', 'Nayeli Smith', 'elittel@example.com', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 0, 0, 'f6Ryu6uDg4', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(20, 'TECH70578', 'Alejandra Mraz', 'bwelch@example.org', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 0, 0, 'LfZqTbwgIS', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(21, 'TECH40200', 'Madisyn Schneider', 'delfina.hand@example.net', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 0, 0, 'IRJirXHKP6', '2023-07-23 09:29:52', '2023-07-24 07:00:39'),
(22, 'TECH70746', 'Prof. Yazmin Gerhold IV', 'russel.colt@example.org', '2023-07-23 09:29:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'teknisi', 0, 0, 'k9moXZ5MX9', '2023-07-23 09:29:52', '2023-07-24 07:00:39');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=911757507;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
