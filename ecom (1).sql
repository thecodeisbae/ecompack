-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 18 mars 2022 à 10:35
-- Version du serveur : 8.0.26
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', '$2y$10$Y18eCRo3piDpCiuFj3jgZO8l3HSdZVWVli.MlFiKdu69I7H0ixqYm');

-- --------------------------------------------------------

--
-- Structure de la table `affiliations`
--

CREATE TABLE `affiliations` (
  `aff_id` bigint UNSIGNED NOT NULL,
  `aff_per_id` bigint UNSIGNED NOT NULL,
  `aff_parrain_id` bigint UNSIGNED NOT NULL,
  `aff_gain` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `affiliations`
--

INSERT INTO `affiliations` (`aff_id`, `aff_per_id`, `aff_parrain_id`, `aff_gain`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 450.00, '2022-03-07 13:19:30', '2022-03-07 13:19:30'),
(5, 8, 7, 0.00, '2022-03-10 14:22:36', '2022-03-10 14:22:36');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `article_id` bigint UNSIGNED NOT NULL,
  `article_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`article_id`, `article_nom`, `article_prix`, `article_file`, `created_at`, `updated_at`) VALUES
(3, 'Pomme', '150', '1n0lAFStGd118WwVUQnDX2hxGW6gIH78hfmMymtX.jpg', '2022-03-08 09:48:33', '2022-03-14 10:54:53'),
(5, 'Pomme fruit', '125', 'sYRrJIFLnXAbE6QhE6ehOJUaOwdc7e8PE9qyGWHd.jpg', '2022-03-09 07:28:40', '2022-03-09 07:28:40'),
(6, 'Fraise', '200', 'ieuUM7XhFzS4MCgubGPze8qXdwqhLG1yCqT2FcwT.jpg', '2022-03-09 07:28:58', '2022-03-09 07:28:58'),
(7, 'Avocat', '150', 'NS6UfyYAovVSI59zP90aTtNKyObCOI1K7Bfq4gFz.jpg', '2022-03-09 07:29:13', '2022-03-09 07:29:13'),
(8, 'Kiwi', '175', 'A29D3MskEDGKN0n4OVjBO8bC5WRAqIChQCgkEbpZ.jpg', '2022-03-09 07:30:01', '2022-03-09 07:30:01'),
(9, 'Riz', '17000', 'JCNLAbSXsnqXN8z6yEI9dnpwEuH88HzMDbUfKxZQ.jpg', '2022-03-09 10:12:33', '2022-03-09 10:12:33'),
(10, 'Huile', '14000', 'Fd63Ga7Ub259NZydXx01W2FRwR43fZOO6CGQp38G.png', '2022-03-09 10:12:50', '2022-03-09 10:12:50'),
(11, 'Blé', '7000', 'g8iJa6pShXdNCw5bMUGlW70XLGVXMoS2XjPSl1Cy.jpg', '2022-03-09 10:13:07', '2022-03-09 10:13:07'),
(12, 'Pates', '250', '4RfRAKotdjgRVaSUEPrBtTxFqaodszpT1zxwVFs6.jpg', '2022-03-09 10:13:25', '2022-03-09 10:13:25'),
(13, 'Ananas', '100', '81IbsxZLpAr3kVXNKGBBtoCSM1vSpOcV41PN8E6M.jpg', '2022-03-15 15:36:57', '2022-03-15 15:36:57');

-- --------------------------------------------------------

--
-- Structure de la table `connexions`
--

CREATE TABLE `connexions` (
  `conn_id` bigint UNSIGNED NOT NULL,
  `conn_per_id` bigint UNSIGNED NOT NULL,
  `conn_password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `connexions`
--

INSERT INTO `connexions` (`conn_id`, `conn_per_id`, `conn_password`, `created_at`, `updated_at`) VALUES
(1, 1, '$2y$10$nYRZ.qhm7B2ST/dQi/Xbk.qsG5brZbBQr12655ZtctA0JKa0h3Cte', '2022-03-07 13:08:22', '2022-03-07 13:08:22'),
(3, 3, '$2y$10$Y18eCRo3piDpCiuFj3jgZO8l3HSdZVWVli.MlFiKdu69I7H0ixqYm', '2022-03-07 13:19:30', '2022-03-07 13:19:30'),
(5, 7, '$2y$10$QbgRms.ea5uBGRYNFTwRremwOdJsYZRET8WnGC1mUynF.5hTt4pN6', '2022-03-10 14:20:35', '2022-03-10 14:20:35'),
(6, 8, '$2y$10$x8.IbO9eulCWtRvzCtZk8ObXY8KpQk6JzTIAKxYlNUqUAUA4mlbE6', '2022-03-10 14:22:36', '2022-03-10 14:22:36');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_07_105243_personnes', 1),
(6, '2022_03_07_105302_verifications', 1),
(7, '2022_03_07_105315_packs', 1),
(8, '2022_03_07_105324_packs_infos', 1),
(9, '2022_03_07_105335_articles', 1),
(10, '2022_03_07_105408_personnes_trackings', 1),
(11, '2022_03_07_105532_souscriptions', 1),
(12, '2022_03_07_105608_affiliations', 1),
(13, '2022_03_07_105618_packs_persos', 1),
(14, '2022_03_07_105628_retraits', 1),
(15, '2022_03_07_111544_connexions', 1),
(16, '2022_03_07_112221_paiements', 1);

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

CREATE TABLE `packs` (
  `pack_id` bigint UNSIGNED NOT NULL,
  `pack_prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_echeance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pack_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`pack_id`, `pack_prix`, `pack_echeance`, `pack_total`, `pack_nom`, `created_at`, `updated_at`) VALUES
(6, '4000', '4', '16000', 'Pack de pates', '2022-03-08 10:41:41', '2022-03-08 10:41:41'),
(7, '50', '8', '400', 'Pack de fruits', '2022-03-09 07:31:35', '2022-03-09 07:31:35'),
(8, '2500', '6', '15000', 'Pack nature', '2022-03-09 10:14:43', '2022-03-14 09:48:57'),
(13, '50', '4', '200', 'Pack de pommes', '2022-03-15 15:41:39', '2022-03-15 15:41:39');

-- --------------------------------------------------------

--
-- Structure de la table `packspersos_infos`
--

CREATE TABLE `packspersos_infos` (
  `packpersoinfo_id` bigint UNSIGNED NOT NULL,
  `packpersoinfo_pack_id` bigint UNSIGNED NOT NULL,
  `packpersoinfo_article_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packspersos_infos`
--

INSERT INTO `packspersos_infos` (`packpersoinfo_id`, `packpersoinfo_pack_id`, `packpersoinfo_article_id`, `created_at`, `updated_at`) VALUES
(1, 3, 10, '2022-03-17 10:43:21', '2022-03-17 10:43:21'),
(2, 3, 7, '2022-03-17 10:43:21', '2022-03-17 10:43:21'),
(3, 4, 5, '2022-03-17 10:55:15', '2022-03-17 10:55:15'),
(4, 4, 8, '2022-03-17 10:55:15', '2022-03-17 10:55:15');

-- --------------------------------------------------------

--
-- Structure de la table `packs_infos`
--

CREATE TABLE `packs_infos` (
  `packinfo_id` bigint UNSIGNED NOT NULL,
  `packinfo_pack_id` bigint UNSIGNED NOT NULL,
  `packinfo_article_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packs_infos`
--

INSERT INTO `packs_infos` (`packinfo_id`, `packinfo_pack_id`, `packinfo_article_id`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2022-03-08 10:41:41', '2022-03-08 10:41:41'),
(2, 6, 2, '2022-03-08 10:41:41', '2022-03-08 10:41:41'),
(3, 6, 4, '2022-03-08 10:41:41', '2022-03-08 10:41:41'),
(4, 7, 5, '2022-03-09 07:31:35', '2022-03-09 07:31:35'),
(5, 7, 7, '2022-03-09 07:31:35', '2022-03-09 07:31:35'),
(6, 7, 8, '2022-03-09 07:31:35', '2022-03-09 07:31:35'),
(15, 8, 7, '2022-03-14 09:49:21', '2022-03-14 09:49:21'),
(16, 8, 10, '2022-03-14 09:49:21', '2022-03-14 09:49:21'),
(17, 8, 12, '2022-03-14 09:49:21', '2022-03-14 09:49:21'),
(20, 13, 5, '2022-03-15 15:42:02', '2022-03-15 15:42:02'),
(21, 13, 13, '2022-03-15 15:42:02', '2022-03-15 15:42:02');

-- --------------------------------------------------------

--
-- Structure de la table `packs_persos`
--

CREATE TABLE `packs_persos` (
  `packperso_id` bigint UNSIGNED NOT NULL,
  `packperso_prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packperso_echeance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packperso_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packperso_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packs_persos`
--

INSERT INTO `packs_persos` (`packperso_id`, `packperso_prix`, `packperso_echeance`, `packperso_total`, `packperso_nom`, `created_at`, `updated_at`) VALUES
(3, '3538', '4', '14150', 'Pack oléagineux', '2022-03-17 10:43:21', '2022-03-17 10:43:21'),
(4, '75', '4', '300', 'Pack fruit perso', '2022-03-17 10:55:15', '2022-03-17 10:55:15');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `pay_id` bigint UNSIGNED NOT NULL,
  `pay_sous_id` bigint UNSIGNED NOT NULL,
  `pay_montant` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`pay_id`, `pay_sous_id`, `pay_montant`, `created_at`, `updated_at`) VALUES
(2, 2, 4000.00, '2022-03-11 14:37:12', NULL),
(3, 2, 4000.00, '2022-03-01 14:37:15', NULL),
(4, 2, 4000.00, '2022-03-15 10:38:24', '2022-03-15 10:38:24'),
(5, 3, 2500.00, '2022-03-15 10:39:44', '2022-03-15 10:39:44'),
(10, 2, 4000.00, '2022-03-15 11:30:01', '2022-03-15 11:30:01'),
(11, 3, 2500.00, '2022-03-15 12:39:27', '2022-03-15 12:39:27'),
(12, 5, 4000.00, '2022-03-15 12:51:11', '2022-03-15 12:51:11'),
(13, 6, 50.00, '2022-03-15 15:46:27', '2022-03-15 15:46:27'),
(14, 13, 3538.00, '2022-03-17 12:31:55', '2022-03-17 12:31:55'),
(15, 13, 3538.00, '2022-03-17 12:34:11', '2022-03-17 12:34:11'),
(16, 13, 3538.00, '2022-03-17 12:34:27', '2022-03-17 12:34:27'),
(17, 13, 3538.00, '2022-03-17 12:34:35', '2022-03-17 12:34:35');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `per_id` bigint UNSIGNED NOT NULL,
  `per_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_prenoms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_parrain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`per_id`, `per_nom`, `per_prenoms`, `per_contact`, `per_sexe`, `per_age`, `per_email`, `per_parrain`, `created_at`, `updated_at`) VALUES
(1, 'Marilyn', 'Prince', '22999406634', 'Homme', '21', 'thecodeisbae@gmail.com', '', '2022-03-07 13:08:22', '2022-03-07 13:08:22'),
(3, 'Doe', 'John', '22999406634', 'Homme', '25', 'johndoe@gmail.com', '1', '2022-03-07 13:19:30', '2022-03-07 13:19:30'),
(7, 'Wick', 'John', '22999406634', 'Homme', '35', 'johnwick@killer.com', '2', '2022-03-10 14:20:35', '2022-03-10 14:20:35'),
(8, 'Prince', 'Marilyn', '22999406634', 'Homme', '17', 'koukeprince@gmail.com', '7', '2022-03-10 14:22:36', '2022-03-10 14:22:36');

-- --------------------------------------------------------

--
-- Structure de la table `personnes_trackings`
--

CREATE TABLE `personnes_trackings` (
  `pt_id` bigint UNSIGNED NOT NULL,
  `pt_per_id` bigint UNSIGNED NOT NULL,
  `pt_localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personnes_trackings`
--

INSERT INTO `personnes_trackings` (`pt_id`, `pt_per_id`, `pt_localisation`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cotonou ( Benin ) ', '2022-03-10 14:49:05', '2022-03-10 14:49:05'),
(2, 1, 'Cotonou ( Benin ) ', '2022-03-10 14:51:57', '2022-03-10 14:51:57'),
(3, 1, 'Cotonou ( Benin ) ', '2022-03-14 08:09:06', '2022-03-14 08:09:06'),
(4, 1, 'Cotonou ( Benin ) ', '2022-03-15 09:45:19', '2022-03-15 09:45:19'),
(5, 3, 'Cotonou ( Benin ) ', '2022-03-15 12:49:08', '2022-03-15 12:49:08'),
(6, 1, 'Cotonou ( Benin ) ', '2022-03-15 12:51:42', '2022-03-15 12:51:42'),
(7, 1, 'Cotonou ( Benin ) ', '2022-03-15 13:05:08', '2022-03-15 13:05:08'),
(8, 1, 'Amsterdam ( Netherlands ) ', '2022-03-15 13:19:22', '2022-03-15 13:19:22'),
(9, 7, 'Amsterdam ( Netherlands ) ', '2022-03-15 13:39:57', '2022-03-15 13:39:57'),
(10, 1, 'Cotonou ( Benin ) ', '2022-03-16 15:51:35', '2022-03-16 15:51:35'),
(11, 1, 'Cotonou ( Benin ) ', '2022-03-17 08:30:05', '2022-03-17 08:30:05');

-- --------------------------------------------------------

--
-- Structure de la table `retraits`
--

CREATE TABLE `retraits` (
  `retrait_id` bigint UNSIGNED NOT NULL,
  `retrait_per_id` bigint UNSIGNED NOT NULL,
  `retrait_montant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `retrait_flag` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `retraits`
--

INSERT INTO `retraits` (`retrait_id`, `retrait_per_id`, `retrait_montant`, `retrait_flag`, `created_at`, `updated_at`) VALUES
(1, 1, '125', 1, '2022-03-09 14:22:20', '2022-03-09 15:10:31'),
(2, 1, '125', 2, '2022-03-09 16:16:39', '2022-03-09 16:16:39'),
(3, 1, '10', 1, '2022-03-14 08:56:54', '2022-03-14 10:07:30'),
(4, 1, '150', 2, '2022-03-17 12:33:45', '2022-03-17 12:33:45');

-- --------------------------------------------------------

--
-- Structure de la table `souscriptions`
--

CREATE TABLE `souscriptions` (
  `sous_id` bigint UNSIGNED NOT NULL,
  `sous_per_id` bigint UNSIGNED NOT NULL,
  `sous_pack_id` bigint UNSIGNED NOT NULL,
  `sous_custom_pack` tinyint(1) NOT NULL DEFAULT '0',
  `sous_flag` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `souscriptions`
--

INSERT INTO `souscriptions` (`sous_id`, `sous_per_id`, `sous_pack_id`, `sous_custom_pack`, `sous_flag`, `created_at`, `updated_at`) VALUES
(2, 1, 6, 0, 1, '2022-03-09 08:29:05', '2022-03-09 08:29:05'),
(3, 1, 8, 0, 0, '2022-03-14 08:58:07', '2022-03-14 08:58:07'),
(4, 1, 7, 0, 0, '2022-03-14 15:54:37', '2022-03-14 15:54:37'),
(5, 3, 6, 0, 0, '2022-03-15 12:49:38', '2022-03-15 12:49:38'),
(6, 7, 13, 0, 0, '2022-03-15 15:45:45', '2022-03-15 15:45:45'),
(7, 7, 8, 0, 0, '2022-03-15 15:47:11', '2022-03-15 15:47:11'),
(13, 1, 3, 1, 1, '2022-03-17 12:24:19', '2022-03-17 12:24:19'),
(14, 1, 4, 1, 0, '2022-03-17 12:34:54', '2022-03-17 12:34:54'),
(15, 1, 13, 0, 0, '2022-03-17 12:35:10', '2022-03-17 12:35:10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `affiliations`
--
ALTER TABLE `affiliations`
  ADD PRIMARY KEY (`aff_id`),
  ADD KEY `affiliations_aff_parrain_id_foreign` (`aff_parrain_id`),
  ADD KEY `affiliations_aff_per_id_foreign` (`aff_per_id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Index pour la table `connexions`
--
ALTER TABLE `connexions`
  ADD PRIMARY KEY (`conn_id`),
  ADD KEY `connexions_conn_per_id_foreign` (`conn_per_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`pack_id`);

--
-- Index pour la table `packspersos_infos`
--
ALTER TABLE `packspersos_infos`
  ADD PRIMARY KEY (`packpersoinfo_id`),
  ADD KEY `packspersos_infos_packinfo_pack_id_foreign` (`packpersoinfo_pack_id`);

--
-- Index pour la table `packs_infos`
--
ALTER TABLE `packs_infos`
  ADD PRIMARY KEY (`packinfo_id`),
  ADD KEY `packs_infos_packinfo_pack_id_foreign` (`packinfo_pack_id`);

--
-- Index pour la table `packs_persos`
--
ALTER TABLE `packs_persos`
  ADD PRIMARY KEY (`packperso_id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `paiements_pay_sous_id_foreign` (`pay_sous_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`per_id`);

--
-- Index pour la table `personnes_trackings`
--
ALTER TABLE `personnes_trackings`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `personnes_trackings_pt_per_id_foreign` (`pt_per_id`);

--
-- Index pour la table `retraits`
--
ALTER TABLE `retraits`
  ADD PRIMARY KEY (`retrait_id`),
  ADD KEY `retraits_retrait_per_id_foreign` (`retrait_per_id`);

--
-- Index pour la table `souscriptions`
--
ALTER TABLE `souscriptions`
  ADD PRIMARY KEY (`sous_id`),
  ADD KEY `souscriptions_sous_pack_id_foreign` (`sous_pack_id`),
  ADD KEY `souscriptions_sous_per_id_foreign` (`sous_per_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `affiliations`
--
ALTER TABLE `affiliations`
  MODIFY `aff_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `connexions`
--
ALTER TABLE `connexions`
  MODIFY `conn_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `packs`
--
ALTER TABLE `packs`
  MODIFY `pack_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `packspersos_infos`
--
ALTER TABLE `packspersos_infos`
  MODIFY `packpersoinfo_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `packs_infos`
--
ALTER TABLE `packs_infos`
  MODIFY `packinfo_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `packs_persos`
--
ALTER TABLE `packs_persos`
  MODIFY `packperso_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `pay_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `per_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personnes_trackings`
--
ALTER TABLE `personnes_trackings`
  MODIFY `pt_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `retraits`
--
ALTER TABLE `retraits`
  MODIFY `retrait_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `souscriptions`
--
ALTER TABLE `souscriptions`
  MODIFY `sous_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affiliations`
--
ALTER TABLE `affiliations`
  ADD CONSTRAINT `affiliations_aff_parrain_id_foreign` FOREIGN KEY (`aff_parrain_id`) REFERENCES `personnes` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `affiliations_aff_per_id_foreign` FOREIGN KEY (`aff_per_id`) REFERENCES `personnes` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `connexions`
--
ALTER TABLE `connexions`
  ADD CONSTRAINT `connexions_conn_per_id_foreign` FOREIGN KEY (`conn_per_id`) REFERENCES `personnes` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `packspersos_infos`
--
ALTER TABLE `packspersos_infos`
  ADD CONSTRAINT `packspersos_infos_packinfo_pack_id_foreign` FOREIGN KEY (`packpersoinfo_pack_id`) REFERENCES `packs_persos` (`packperso_id`);

--
-- Contraintes pour la table `packs_infos`
--
ALTER TABLE `packs_infos`
  ADD CONSTRAINT `packs_infos_packinfo_pack_id_foreign` FOREIGN KEY (`packinfo_pack_id`) REFERENCES `packs` (`pack_id`);

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_pay_sous_id_foreign` FOREIGN KEY (`pay_sous_id`) REFERENCES `souscriptions` (`sous_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `personnes_trackings`
--
ALTER TABLE `personnes_trackings`
  ADD CONSTRAINT `personnes_trackings_pt_per_id_foreign` FOREIGN KEY (`pt_per_id`) REFERENCES `personnes` (`per_id`);

--
-- Contraintes pour la table `retraits`
--
ALTER TABLE `retraits`
  ADD CONSTRAINT `retraits_retrait_per_id_foreign` FOREIGN KEY (`retrait_per_id`) REFERENCES `personnes` (`per_id`);

--
-- Contraintes pour la table `souscriptions`
--
ALTER TABLE `souscriptions`
  ADD CONSTRAINT `souscriptions_sous_per_id_foreign` FOREIGN KEY (`sous_per_id`) REFERENCES `personnes` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
