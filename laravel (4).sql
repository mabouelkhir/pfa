-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 02 mai 2022 à 21:01
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(2, NULL, 1, 'Category 2', 'category-2', '2022-04-20 00:16:23', '2022-04-20 00:16:23');

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

CREATE TABLE `chapitres` (
  `id` int(10) UNSIGNED NOT NULL,
  `projet_id` int(10) UNSIGNED NOT NULL,
  `nom_chapitre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `projet_id`, `nom_chapitre`, `created_at`, `updated_at`) VALUES
(8, 11, 'projettestavecmrerratahi', '2022-04-22 14:04:45', '2022-04-22 14:04:45'),
(45, 5, 'chapitre2', '2022-04-27 07:35:34', '2022-04-27 07:35:34'),
(46, 5, 'chapitre4444', '2022-04-27 07:36:30', '2022-04-27 07:36:30'),
(52, 5, 'okoko', NULL, NULL),
(53, 5, 'okoko', NULL, NULL),
(54, 5, 'chapitre2', NULL, NULL),
(56, 5, 'chapitre2', NULL, NULL),
(57, 8, 'chapitre3', NULL, NULL),
(58, 8, 'chapitre1', NULL, NULL),
(59, 8, 'chapitre2', NULL, NULL),
(60, 8, 'chapitre1', NULL, NULL),
(61, 5, 'chapitre3', '2022-04-30 00:27:27', '2022-04-30 00:27:27'),
(62, 5, 'chapitre3', '2022-04-30 00:29:08', '2022-04-30 00:29:08'),
(63, 5, 'hhhhhhhh', '2022-04-30 00:31:06', '2022-04-30 00:31:06'),
(64, 6, 'chapitre1', '2022-05-02 11:31:09', '2022-05-02 11:31:09');

-- --------------------------------------------------------

--
-- Structure de la table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'voyager::seeders.data_rows.roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 2),
(58, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 3),
(59, 7, 'nom', 'text', 'Nom', 0, 1, 1, 1, 1, 1, '{}', 4),
(60, 7, 'description', 'text', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
(61, 7, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 6),
(62, 7, 'projet_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(63, 1, 'user_hasmany_projet_relationship', 'relationship', 'projets', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Projet\",\"table\":\"projets\",\"type\":\"hasMany\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"nom\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 13),
(64, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 6),
(65, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(66, 9, 'projet_id', 'text', 'Projet Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(67, 9, 'performance_id', 'text', 'Performance Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(68, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 4),
(69, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(70, 9, 'statut', 'text', 'Statut', 1, 1, 1, 1, 1, 1, '{}', 6);

-- --------------------------------------------------------

--
-- Structure de la table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-04-20 00:16:22', '2022-04-20 00:19:20'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(7, 'projets', 'projets', 'Projet', 'Projets', NULL, 'App\\Projet', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-04-20 00:17:34', '2022-04-20 00:18:12'),
(9, 'performance_projet', 'performance-projet', 'Performance Projet', 'Performance Projets', NULL, 'App\\Models\\PerformanceProjet', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-04-30 09:42:26', '2022-04-30 09:42:26');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(10) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`) VALUES
(1, 'ouahdane'),
(2, 'chaymae');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-04-20 00:16:22', '2022-04-20 00:16:22');

-- --------------------------------------------------------

--
-- Structure de la table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2022-04-20 00:16:22', '2022-04-20 00:16:22', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2022-04-20 00:16:22', '2022-04-20 00:16:22', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2022-04-20 00:16:23', '2022-04-20 00:16:23', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2022-04-20 00:16:23', '2022-04-20 00:16:23', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2022-04-20 00:16:23', '2022-04-20 00:16:23', 'voyager.pages.index', NULL),
(14, 1, 'Projets', '', '_self', NULL, NULL, NULL, 15, '2022-04-20 00:17:34', '2022-04-20 00:17:34', 'voyager.projets.index', NULL),
(15, 1, 'Performance Projets', '', '_self', NULL, NULL, NULL, 16, '2022-04-30 09:42:26', '2022-04-30 09:42:26', 'voyager.performance-projet.index', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2016_01_01_000000_add_voyager_user_fields', 1),
(32, '2016_01_01_000000_create_data_types_table', 1),
(33, '2016_01_01_000000_create_pages_table', 1),
(34, '2016_01_01_000000_create_posts_table', 1),
(35, '2016_02_15_204651_create_categories_table', 1),
(36, '2016_05_19_173453_create_menu_table', 1),
(37, '2016_10_21_190000_create_roles_table', 1),
(38, '2016_10_21_190000_create_settings_table', 1),
(39, '2016_11_30_135954_create_permission_table', 1),
(40, '2016_11_30_141208_create_permission_role_table', 1),
(41, '2016_12_26_201236_data_types__add__server_side', 1),
(42, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(43, '2017_01_14_005015_create_translations_table', 1),
(44, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(45, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(46, '2017_04_11_000000_alter_post_nullable_fields_table', 1),
(47, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(48, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(49, '2017_08_05_000000_add_group_to_settings_table', 1),
(50, '2017_11_26_013050_add_user_role_relationship', 1),
(51, '2017_11_26_015000_create_user_roles_table', 1),
(52, '2018_03_11_000000_add_user_settings', 1),
(53, '2018_03_14_000000_add_details_to_data_types_table', 1),
(54, '2018_03_16_000000_make_settings_value_nullable', 1),
(55, '2019_08_19_000000_create_failed_jobs_table', 1),
(56, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(57, '2022_04_20_002335_create_chapitres_table', 2),
(58, '2022_04_20_002522_add_column_projet_id', 3),
(59, '2022_04_24_221920__create_sections_table', 4),
(60, '2022_04_24_222142__add_column_chapitre_id', 5),
(61, '2022_04_26_183252_create_point_evaluers_table', 6),
(62, '2022_04_27_031342__add_column_section_id', 7),
(63, '2022_04_27_054321__create_point_a_evaluer_table', 8),
(64, '2022_04_27_054546__add_column_section_id', 9),
(67, '2022_04_27_065934_create_points_table', 10),
(68, '2022_04_27_070545__add_column_section_id', 11),
(69, '2022_04_29_224128_create_performances_table', 12),
(70, '2022_04_29_230233_create_performance_projet_table', 13),
(71, '2022_04_29_232040_create_performance_projet_table', 14),
(72, '2022_04_30_050057_add_column_statut', 15),
(73, '2022_04_30_060440_add_column_statut', 16),
(74, '2022_04_30_065823_add_column_statut', 17),
(75, '2022_04_30_093445_add_column_statut', 18),
(76, '2022_05_01_022439_create_performance_points_table', 19);

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-04-20 00:16:23', '2022-04-20 00:16:23');

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
-- Structure de la table `performances`
--

CREATE TABLE `performances` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom_performance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `performances`
--

INSERT INTO `performances` (`id`, `nom_performance`, `created_at`, `updated_at`) VALUES
(1, 'Analyse', NULL, NULL),
(2, 'Compréhension', NULL, NULL),
(3, 'Evaluation', NULL, NULL),
(4, 'Connaissance', NULL, NULL),
(5, 'Application', NULL, NULL),
(6, 'Synthèse', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `performance_point`
--

CREATE TABLE `performance_point` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `point_id` int(10) UNSIGNED NOT NULL,
  `performance_id` int(10) UNSIGNED NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `performance_point`
--

INSERT INTO `performance_point` (`id`, `point_id`, `performance_id`, `statut`, `created_at`, `updated_at`) VALUES
(87, 8, 6, 'oui', NULL, NULL),
(88, 9, 1, 'non', NULL, NULL),
(89, 9, 2, 'non', NULL, NULL),
(90, 9, 3, 'non', NULL, NULL),
(91, 9, 4, 'non', NULL, NULL),
(92, 9, 5, 'non', NULL, NULL),
(93, 9, 6, 'non', NULL, NULL),
(100, 8, 1, 'oui', NULL, NULL),
(101, 8, 2, 'oui', NULL, NULL),
(102, 8, 3, 'oui', NULL, NULL),
(103, 8, 4, 'oui', NULL, NULL),
(104, 8, 5, 'oui', NULL, NULL),
(105, 16, 1, 'non', NULL, NULL),
(106, 16, 2, 'non', NULL, NULL),
(107, 16, 3, 'oui', NULL, NULL),
(108, 16, 4, 'non', NULL, NULL),
(109, 16, 5, 'non', NULL, NULL),
(110, 16, 6, 'oui', NULL, NULL),
(111, 17, 2, 'non', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `performance_projet`
--

CREATE TABLE `performance_projet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projet_id` int(10) UNSIGNED NOT NULL,
  `performance_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `performance_projet`
--

INSERT INTO `performance_projet` (`id`, `projet_id`, `performance_id`, `created_at`, `updated_at`, `statut`) VALUES
(65, 5, 1, NULL, NULL, 'oui'),
(66, 5, 2, NULL, NULL, 'oui'),
(67, 5, 3, NULL, NULL, 'oui'),
(68, 6, 1, NULL, NULL, 'oui'),
(69, 6, 3, NULL, NULL, 'non'),
(70, 6, 2, NULL, NULL, 'oui'),
(71, 7, 1, NULL, NULL, 'oui'),
(72, 7, 2, NULL, NULL, 'oui'),
(73, 7, 3, NULL, NULL, 'non'),
(74, 5, 4, NULL, NULL, 'oui'),
(75, 5, 5, NULL, NULL, 'oui'),
(76, 5, 6, NULL, NULL, 'oui'),
(77, 8, 1, NULL, NULL, 'oui'),
(78, 8, 2, NULL, NULL, 'oui'),
(79, 8, 3, NULL, NULL, 'oui'),
(80, 8, 4, NULL, NULL, 'oui'),
(81, 8, 5, NULL, NULL, 'oui'),
(82, 8, 6, NULL, NULL, 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(2, 'browse_bread', NULL, '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(3, 'browse_database', NULL, '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(4, 'browse_media', NULL, '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(5, 'browse_compass', NULL, '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(6, 'browse_menus', 'menus', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(7, 'read_menus', 'menus', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(8, 'edit_menus', 'menus', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(9, 'add_menus', 'menus', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(10, 'delete_menus', 'menus', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(11, 'browse_roles', 'roles', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(12, 'read_roles', 'roles', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(13, 'edit_roles', 'roles', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(14, 'add_roles', 'roles', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(15, 'delete_roles', 'roles', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(16, 'browse_users', 'users', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(17, 'read_users', 'users', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(18, 'edit_users', 'users', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(19, 'add_users', 'users', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(20, 'delete_users', 'users', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(21, 'browse_settings', 'settings', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(22, 'read_settings', 'settings', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(23, 'edit_settings', 'settings', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(24, 'add_settings', 'settings', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(25, 'delete_settings', 'settings', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(26, 'browse_categories', 'categories', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(27, 'read_categories', 'categories', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(28, 'edit_categories', 'categories', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(29, 'add_categories', 'categories', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(30, 'delete_categories', 'categories', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(31, 'browse_posts', 'posts', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(32, 'read_posts', 'posts', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(33, 'edit_posts', 'posts', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(34, 'add_posts', 'posts', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(35, 'delete_posts', 'posts', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(36, 'browse_pages', 'pages', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(37, 'read_pages', 'pages', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(38, 'edit_pages', 'pages', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(39, 'add_pages', 'pages', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(40, 'delete_pages', 'pages', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(41, 'browse_projets', 'projets', '2022-04-20 00:17:34', '2022-04-20 00:17:34'),
(42, 'read_projets', 'projets', '2022-04-20 00:17:34', '2022-04-20 00:17:34'),
(43, 'edit_projets', 'projets', '2022-04-20 00:17:34', '2022-04-20 00:17:34'),
(44, 'add_projets', 'projets', '2022-04-20 00:17:34', '2022-04-20 00:17:34'),
(45, 'delete_projets', 'projets', '2022-04-20 00:17:34', '2022-04-20 00:17:34'),
(46, 'browse_performance_projet', 'performance_projet', '2022-04-30 09:42:26', '2022-04-30 09:42:26'),
(47, 'read_performance_projet', 'performance_projet', '2022-04-30 09:42:26', '2022-04-30 09:42:26'),
(48, 'edit_performance_projet', 'performance_projet', '2022-04-30 09:42:26', '2022-04-30 09:42:26'),
(49, 'add_performance_projet', 'performance_projet', '2022-04-30 09:42:26', '2022-04-30 09:42:26'),
(50, 'delete_performance_projet', 'performance_projet', '2022-04-30 09:42:26', '2022-04-30 09:42:26');

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `points`
--

CREATE TABLE `points` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `nom_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `points`
--

INSERT INTO `points` (`id`, `section_id`, `nom_point`, `created_at`, `updated_at`) VALUES
(8, 38, 'point à évaluer', NULL, NULL),
(9, 38, 'point à évaluer1', NULL, NULL),
(12, 51, 'p1', NULL, NULL),
(15, 39, '5555', '2022-05-02 09:10:10', '2022-05-02 09:10:10'),
(16, 38, '5555', '2022-05-02 11:23:54', '2022-05-02 11:23:54'),
(17, 56, '5555', '2022-05-02 11:31:29', '2022-05-02 11:31:29');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-04-20 00:16:23', '2022-04-20 00:16:23');

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE `projets` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `created_at`, `updated_at`, `nom`, `description`, `user_id`) VALUES
(5, '2022-04-21 22:39:55', '2022-04-21 22:39:55', 'Projet1', 'description du projet1', 2),
(6, '2022-04-21 22:40:18', '2022-04-21 22:40:18', 'Projet2', 'description du projet2', 2),
(7, '2022-04-21 22:40:41', '2022-04-21 22:40:41', 'Projet3', 'description du projet3', 2),
(8, '2022-04-21 22:42:42', '2022-04-21 22:42:42', 'Projet4', 'description du projet4', 3),
(9, '2022-04-21 22:43:15', '2022-04-21 22:43:15', 'Projet5', 'description du projet5', 3),
(10, '2022-04-21 22:43:35', '2022-04-21 22:43:35', 'Projet6', 'description du projet6', 3),
(11, '2022-04-22 14:03:36', '2022-04-22 14:03:36', 'projet7', 'decription chapitre7', 3);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-04-20 00:16:22', '2022-04-20 00:16:22'),
(2, 'user', 'Normal User', '2022-04-20 00:16:22', '2022-04-20 00:16:22');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `chapitre_id` int(10) UNSIGNED NOT NULL,
  `nom_section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`id`, `chapitre_id`, `nom_section`, `created_at`, `updated_at`) VALUES
(38, 45, 'section1', '2022-04-27 07:38:51', '2022-04-27 07:38:51'),
(39, 46, 'section3', '2022-04-27 21:32:15', '2022-04-27 21:32:15'),
(40, 45, 'section2', NULL, NULL),
(50, 58, 'section2', NULL, NULL),
(51, 58, 'section1', NULL, NULL),
(52, 58, 'section1', NULL, NULL),
(53, 58, 'section3', NULL, NULL),
(55, 45, 'section3', '2022-04-30 00:33:34', '2022-04-30 00:33:34'),
(56, 64, 'p1', '2022-05-02 11:31:16', '2022-05-02 11:31:16'),
(58, 57, 'p1', '2022-05-02 17:42:21', '2022-05-02 17:42:21');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-04-20 00:16:23', '2022-04-20 00:16:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$rDvbL9yMgukZwAeaWwYuseAIBTVCtQtGRltgjhdg6noRkgjwRXYlu', 'TXbL74O5nr5SXYXgtD2ROevaPYmZLlpib9CuPnH6BssfveR9lYkrAeexQ7aM', NULL, '2022-04-20 00:16:23', '2022-04-20 00:16:23'),
(2, 2, 'professeur1', 'professeur1@professeur1.com', 'users\\April2022\\BAWKABroIA2hvdKHrb5C.png', NULL, '$2y$10$z8sohYm6TM658R5Tm8LlYuPQLA4WRzDqOscyFbJ9jNlG409fI4Vuu', NULL, '{\"locale\":\"en\"}', '2022-04-20 00:20:21', '2022-04-20 00:20:21'),
(3, 2, 'professeur2', 'professeur2@professeur2.com', 'users\\April2022\\hGku8mgKYS46NGewdOa8.png', NULL, '$2y$10$fgLjYCsRvnpLzkWOVH1TwO0mI7qjqdyq8nzEVvD.DQPsGpOAWBxfS', NULL, '{\"locale\":\"en\"}', '2022-04-20 00:21:27', '2022-04-20 00:21:27');

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Index pour la table `chapitres`
--
ALTER TABLE `chapitres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapitres_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Index pour la table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Index pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `performances`
--
ALTER TABLE `performances`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `performance_point`
--
ALTER TABLE `performance_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_point_performance_id_foreign` (`performance_id`),
  ADD KEY `performance_point_point_id_foreign` (`point_id`);

--
-- Index pour la table `performance_projet`
--
ALTER TABLE `performance_projet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_projet_performance_id_foreign` (`performance_id`),
  ADD KEY `performance_projet_projet_id_foreign` (`projet_id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Index pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `points_section_id_foreign` (`section_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Index pour la table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_chapitre_id_foreign` (`chapitre_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Index pour la table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Index pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `chapitres`
--
ALTER TABLE `chapitres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `performances`
--
ALTER TABLE `performances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `performance_point`
--
ALTER TABLE `performance_point`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT pour la table `performance_projet`
--
ALTER TABLE `performance_projet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `chapitres`
--
ALTER TABLE `chapitres`
  ADD CONSTRAINT `chapitres_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `performance_point`
--
ALTER TABLE `performance_point`
  ADD CONSTRAINT `performance_point_performance_id_foreign` FOREIGN KEY (`performance_id`) REFERENCES `performances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `performance_point_point_id_foreign` FOREIGN KEY (`point_id`) REFERENCES `points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `performance_projet`
--
ALTER TABLE `performance_projet`
  ADD CONSTRAINT `performance_projet_performance_id_foreign` FOREIGN KEY (`performance_id`) REFERENCES `performances` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `performance_projet_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_chapitre_id_foreign` FOREIGN KEY (`chapitre_id`) REFERENCES `chapitres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Contraintes pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
