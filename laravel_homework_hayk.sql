-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2019 at 08:56 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_homework_hayk`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_am` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title_en`, `title_ru`, `title_am`, `image`, `additional`, `created_at`, `updated_at`) VALUES
(1, NULL, 'COOKING EQUIPMENT', 'Кухонное оборудование', 'Xohanocayin sarqavorumner', '1561501403.png', NULL, NULL, NULL),
(2, NULL, 'REFRIGERATION/ ICE MAKERS', 'Охлаждение/ Льдогенераторы', 'Sarecum/ Saruyci meqenaner', '1561501421.png', NULL, NULL, NULL),
(3, NULL, 'FOOD PROCESSING', 'Обработка Пищи', 'Snndi Veramshakum', '1561961139.png', NULL, NULL, NULL),
(4, NULL, 'NEUTRAL UNITS', 'Нейтральные единицы', 'Neytral miavorner', '1562016329.png', NULL, NULL, NULL),
(5, NULL, 'Services', 'Услуги', 'Carayutyunner', '1562014602.png', NULL, NULL, NULL),
(6, NULL, 'Storage and Shelving', 'Хранение и Стеллажи', 'Pahestavorum yev darakasharer', '1562021392.png', NULL, NULL, NULL),
(7, 1, 'Ovens', 'Духовки', 'Djerocner', NULL, NULL, NULL, NULL),
(8, 1, 'Stoves', 'Кухонные Плиты', 'Xohanocayin Vararanner', NULL, NULL, NULL, NULL),
(9, 1, 'Deep Fryers', 'Фритюрницы', 'Tapakichner', NULL, NULL, NULL, NULL),
(10, 1, 'Toaster, Grill and Kebab', 'Тостеры, Гриль и Шашлык', 'Toster, Grill yev Xorovac', NULL, NULL, NULL, NULL),
(11, 2, 'Reach in refrigerator/ Freezer', 'Морозильники', 'Sarcaranner', NULL, NULL, NULL, NULL),
(12, 2, 'Refrigerated prep tables', 'Охлаждаемые столы для приготовления пищи', 'Sarnaranayin naxapatrastakan sexanner', NULL, NULL, NULL, NULL),
(13, 2, 'Merchandising refrigeration', 'Товарное охлаждение', 'Arevtrayin sarnaran', NULL, NULL, NULL, NULL),
(14, 3, 'Meat Slicers', 'Мясорезки', 'Msaxacner', NULL, NULL, NULL, NULL),
(15, 3, 'Mixers', 'Миксеры', 'Xarnichner', NULL, NULL, NULL, NULL),
(16, 3, 'Blenders', 'Блендеры', 'Blndernerner', NULL, NULL, NULL, NULL),
(17, 15, 'Kitchenaid 7qt', 'Kitchenaid 7qt', 'Kitchenaid 7qt', '2019/07/8360bfc2a38642b70526865ed2a9819f3428eb95.jpg', NULL, NULL, NULL),
(20, 1, 'Mixers', 'Миксеры', 'mixerner', '1563734036-rGqtQa4b9q.jpeg', NULL, '2019-07-09 04:25:03', '2019-07-21 14:35:08'),
(22, 19, 'Mr', 'Mr', 'Mr', NULL, NULL, '2019-07-21 15:12:21', '2019-07-21 15:12:21'),
(23, 2, 'Mr', 'Mr', 'Mr', NULL, NULL, '2019-07-21 15:13:47', '2019-07-21 15:13:47'),
(26, 1, 'Sectsia', 'Sectsia', 'Sectsia', NULL, NULL, '2019-08-09 07:14:58', '2019-08-09 07:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `category_field`
--

CREATE TABLE `category_field` (
  `id` int(11) NOT NULL,
  `category_id` int(255) NOT NULL,
  `field_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_field`
--

INSERT INTO `category_field` (`id`, `category_id`, `field_id`) VALUES
(1, 20, 6),
(2, 20, 5),
(3, 20, 7),
(4, 22, 6),
(5, 25, 6),
(6, 25, 5),
(7, 26, 5),
(8, 26, 6),
(9, 26, 7),
(10, 7, 6),
(11, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(48, 6, 96, '2019-08-07 08:32:21', '2019-08-07 10:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(11) NOT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('text','number','select') NOT NULL DEFAULT 'text',
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `placeholder`, `name`, `title`, `type`, `value`) VALUES
(5, '@ntreq meqenayi maknish@', 'maknish_name', 'Maknish', 'text', NULL),
(6, NULL, 'chaps', 'Chaps', 'select', '[\"mec\",\"poqr\",\"mijin\"]'),
(7, NULL, 'ser', 'Ser', 'select', '[\"arakan\",\"igakan\"]'),
(8, '@ntreq meqenayi maknish@', 'maknish_name', 'Maknish', 'text', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `original_path` varchar(255) DEFAULT NULL,
  `resized_path` varchar(255) DEFAULT NULL,
  `border` varchar(3) DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` int(10) UNSIGNED NOT NULL,
  `receiver` int(10) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `body`, `created_at`, `updated_at`) VALUES
(1, 54, 49, 'Officia in ut voluptas corrupti ipsum mollitia doloribus.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(2, 16, 33, 'Quisquam et possimus neque ullam vel magnam.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(3, 17, 49, 'Laudantium eligendi illo nobis ab in aut sed esse.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(4, 23, 25, 'Nulla qui nihil sed eaque.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(5, 25, 55, 'Animi dolores earum provident recusandae est dolores in.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(6, 53, 43, 'Molestiae ut illum sunt necessitatibus deleniti.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(7, 39, 48, 'Id quibusdam qui debitis nam possimus harum et voluptas.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(8, 7, 14, 'Consequatur optio excepturi dignissimos.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(9, 25, 53, 'Beatae molestias magnam optio sed numquam.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(10, 53, 20, 'Sit magnam et fuga natus at ab.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(11, 51, 4, 'Neque dolor doloremque corrupti facere doloribus commodi.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(12, 2, 50, 'Minus libero sequi iusto non cum.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(13, 44, 5, 'Temporibus aut neque ad aut exercitationem consequatur natus.', '2019-07-30 13:22:21', '2019-07-30 13:22:21'),
(14, 53, 39, 'Nisi ut expedita sunt explicabo neque.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(15, 24, 32, 'Illo sit optio similique consequatur.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(16, 32, 16, 'Repellat itaque tempore alias explicabo omnis deleniti.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(17, 45, 23, 'Odio possimus quidem itaque atque alias.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(18, 36, 29, 'Provident facilis qui ea nulla qui porro.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(19, 33, 30, 'Laboriosam et et consequatur laudantium et saepe.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(20, 9, 55, 'Alias id sed dicta impedit itaque.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(21, 45, 8, 'Molestiae quia expedita nisi quia est officiis eius blanditiis.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(22, 53, 51, 'Esse molestiae consequatur nobis qui amet et est.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(23, 3, 41, 'Qui a magnam minus.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(24, 53, 21, 'Asperiores debitis fugiat quo sed voluptatibus quidem dolorum.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(25, 46, 37, 'Maxime aliquid numquam sunt facilis.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(26, 26, 30, 'Nemo neque quaerat voluptates error dignissimos ad.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(27, 18, 48, 'Eum repellat occaecati nisi quaerat asperiores ea qui aut.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(28, 8, 52, 'Aut magnam rerum quos sed eos soluta exercitationem.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(29, 46, 42, 'Autem a et saepe quia ea mollitia unde.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(30, 27, 45, 'Accusamus sapiente id enim.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(31, 16, 23, 'Qui sed et sint ad aut sit.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(32, 25, 25, 'Amet eligendi sequi distinctio eveniet.', '2019-07-30 13:22:22', '2019-07-30 13:22:22'),
(33, 35, 33, 'Perspiciatis non harum tenetur voluptates eveniet quaerat.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(34, 9, 50, 'Voluptatum corporis tenetur exercitationem laboriosam id exercitationem.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(35, 4, 24, 'Magni qui id libero temporibus similique.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(36, 24, 41, 'Minima et temporibus provident incidunt ut.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(37, 30, 42, 'Optio sequi cupiditate a accusamus omnis necessitatibus odit aut.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(38, 27, 38, 'Labore iure optio magnam dolores sed.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(39, 30, 50, 'Et doloribus dolores vitae adipisci.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(40, 19, 32, 'Sit id veritatis velit et et voluptas.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(41, 51, 37, 'Quidem omnis odio et quaerat.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(42, 11, 5, 'Ea ipsa consequuntur enim qui veniam natus sapiente.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(43, 5, 18, 'Occaecati quis eum aut omnis dolorem reprehenderit dolorum.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(44, 30, 8, 'Optio incidunt voluptas laborum neque fugit rerum atque.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(45, 52, 27, 'Quam in nihil minima sint dolores deserunt dolor.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(46, 9, 5, 'Sunt voluptas est nesciunt dolorem nam aliquid maiores.', '2019-07-30 13:22:23', '2019-07-30 13:22:23'),
(47, 38, 6, 'Quas nemo quo repudiandae quam hic voluptas architecto.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(48, 40, 39, 'Vel deserunt dolores nihil occaecati omnis.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(49, 28, 4, 'Suscipit eum consequatur illo nemo voluptas et.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(50, 38, 11, 'Ipsa exercitationem fuga doloremque expedita ut.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(51, 24, 25, 'Fugit optio ut corrupti impedit.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(52, 7, 34, 'Voluptas sed odio explicabo animi.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(53, 23, 18, 'Voluptas repudiandae totam aut dolorem ut sequi ea.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(54, 1, 20, 'Aspernatur dolorem ratione ducimus sit porro.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(55, 35, 9, 'Qui autem debitis vitae autem molestias totam.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(56, 32, 4, 'Porro dolores qui sed veniam nesciunt deserunt.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(57, 29, 45, 'Odit voluptatum aut deleniti commodi laborum magni sint harum.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(58, 30, 30, 'Voluptas aliquam cumque qui nemo et ut.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(59, 17, 26, 'Nisi ex ea occaecati tempore id perspiciatis.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(60, 53, 5, 'Minus facilis unde adipisci ipsum quos explicabo.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(61, 29, 4, 'Veritatis repellat fuga vel porro voluptas.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(62, 1, 35, 'Autem voluptatum iure voluptatibus quod ut quam velit.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(63, 5, 46, 'Necessitatibus placeat magni vel unde iste.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(64, 45, 34, 'In nihil aut distinctio et.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(65, 7, 55, 'Nisi sint sunt ratione eveniet et quae quia.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(66, 6, 16, 'Reprehenderit ut dicta tempore sequi corporis.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(67, 23, 36, 'Esse velit inventore voluptas nostrum delectus.', '2019-07-30 13:22:24', '2019-07-30 13:22:24'),
(68, 45, 24, 'Magni occaecati dolorem maxime maiores consequatur doloribus qui ab.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(69, 47, 1, 'Sunt neque quia dolor omnis.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(70, 45, 33, 'Facere occaecati quaerat est dignissimos maiores minus quo.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(71, 2, 4, 'Est nihil autem necessitatibus sit illum quam voluptas.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(72, 22, 12, 'Mollitia rem illo quia nesciunt.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(73, 35, 32, 'Veritatis eos mollitia voluptatem mollitia dolorum.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(74, 51, 19, 'Earum recusandae nostrum odio a.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(75, 29, 28, 'Rerum adipisci nulla qui voluptas ex.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(76, 54, 22, 'Quasi reiciendis dolorem molestiae laboriosam.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(77, 29, 9, 'Consequatur perspiciatis consectetur voluptatum molestiae sed et eum.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(78, 39, 49, 'Cupiditate a hic laudantium consectetur.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(79, 26, 21, 'Debitis omnis ut voluptatum consequuntur sit quas sed vel.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(80, 41, 47, 'Maxime ipsam quia magni.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(81, 22, 5, 'Facilis voluptates qui id vitae sit.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(82, 49, 12, 'Debitis expedita dolorem velit odio.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(83, 26, 54, 'Veniam facere eos eum nulla inventore harum.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(84, 33, 6, 'Aut eligendi aut enim enim ipsam maxime.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(85, 22, 18, 'Ullam deserunt cum et dolores provident.', '2019-07-30 13:22:25', '2019-07-30 13:22:25'),
(86, 11, 44, 'Fugit illum necessitatibus soluta qui nobis.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(87, 49, 10, 'Debitis necessitatibus quasi alias.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(88, 46, 2, 'Ipsam aut dolorum nesciunt ut dolores.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(89, 21, 44, 'Velit aut sequi sed nemo aut optio.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(90, 6, 3, 'Ducimus sit corrupti sint nobis consequatur.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(91, 49, 36, 'Sed mollitia id quo officiis omnis quis doloribus aliquam.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(92, 50, 27, 'Nulla dolorem repellendus libero possimus eligendi.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(93, 35, 37, 'Laborum quaerat ut voluptas et possimus repellat.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(94, 48, 17, 'Nemo deserunt aut quod soluta quos quia.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(95, 19, 48, 'Maxime dolorem quod autem ducimus.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(96, 3, 4, 'Tempora nobis nulla rerum eum.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(97, 13, 17, 'Sint ex fugiat qui commodi ea explicabo omnis laboriosam.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(98, 9, 19, 'Quidem rerum nesciunt laborum eum.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(99, 3, 8, 'Sed hic sit repellendus voluptatem vero error soluta.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(100, 14, 52, 'Qui nisi id aperiam aut.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(101, 33, 37, 'Autem blanditiis perspiciatis qui.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(102, 41, 14, 'Laboriosam dicta nisi dolore laboriosam temporibus.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(103, 54, 46, 'Ea quis sint est quaerat accusamus quo voluptatibus.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(104, 8, 46, 'Cupiditate nobis ipsam veritatis minima est mollitia dolorem minima.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(105, 17, 48, 'Tempore voluptatibus quae ipsa maiores.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(106, 48, 13, 'Beatae est est praesentium eos est.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(107, 21, 54, 'Facilis expedita mollitia possimus dignissimos.', '2019-07-30 13:22:26', '2019-07-30 13:22:26'),
(108, 55, 19, 'Magnam magni ut quo incidunt architecto sed.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(109, 5, 54, 'Voluptatem nostrum laborum possimus neque sed aut aliquam.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(110, 31, 51, 'Est ut tempora repellendus quas ad provident.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(111, 34, 8, 'Molestiae debitis dignissimos explicabo vitae et.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(112, 3, 28, 'Blanditiis suscipit dolores reprehenderit quisquam.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(113, 3, 12, 'Voluptatem aspernatur recusandae sed.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(114, 35, 40, 'Unde natus qui iusto quia omnis ut asperiores.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(115, 38, 21, 'Ipsum dolore non voluptatum voluptas sint sint.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(116, 1, 10, 'Earum neque consectetur impedit dolor.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(117, 25, 48, 'Quis non rerum tenetur at sapiente non vitae aut.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(118, 12, 46, 'Nisi quia beatae cupiditate quos cupiditate quis.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(119, 3, 37, 'Eos provident ut nihil velit.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(120, 32, 49, 'Esse impedit at earum voluptate dolorem.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(121, 19, 12, 'Quam ut repudiandae nobis nihil.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(122, 53, 42, 'Nam omnis dolore possimus perspiciatis quia laboriosam.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(123, 46, 45, 'Laboriosam et qui praesentium quam.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(124, 28, 25, 'Sint aut saepe ad rerum doloremque laborum dolor.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(125, 1, 11, 'Unde dolores voluptate consequatur et dolore debitis.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(126, 20, 1, 'Eligendi inventore est et quis nesciunt.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(127, 43, 3, 'Nihil optio rerum nihil ex maxime sit officia.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(128, 52, 43, 'Et iste dicta voluptate sequi.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(129, 40, 35, 'Earum deserunt dolorem quod minus veniam nisi quis.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(130, 14, 13, 'Vel temporibus aspernatur voluptatem consequatur.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(131, 25, 42, 'Ea quia ut quaerat quo.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(132, 2, 32, 'Non mollitia ullam placeat aut quia.', '2019-07-30 13:22:27', '2019-07-30 13:22:27'),
(133, 4, 12, 'In sit adipisci vel aut officiis tenetur sunt.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(134, 10, 42, 'Et explicabo omnis at est consequatur sint.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(135, 3, 27, 'Saepe magnam perspiciatis accusantium ratione quasi.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(136, 31, 11, 'Praesentium est saepe illo eius eaque dolorum.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(137, 44, 24, 'Est facilis cum magnam illo.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(138, 26, 24, 'Nisi aut et sed corporis ducimus.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(139, 13, 43, 'Iusto voluptate est deserunt laboriosam.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(140, 5, 16, 'Repellat ipsam asperiores voluptates sint.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(141, 12, 18, 'Id consequatur qui quos et.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(142, 42, 46, 'Eos iusto illo fuga omnis in repudiandae soluta consequatur.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(143, 42, 28, 'Aut quos tenetur sint dolorem aut officia.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(144, 21, 7, 'Mollitia autem ut ad.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(145, 47, 28, 'Officia accusamus sit voluptas dolorem in eligendi.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(146, 6, 46, 'Impedit sint quas dignissimos harum eaque veniam accusamus.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(147, 40, 16, 'Maiores beatae nesciunt non esse sequi aut.', '2019-07-30 13:22:28', '2019-07-30 13:22:28'),
(148, 48, 47, 'Numquam deleniti tempore perspiciatis qui culpa ut quae.', '2019-07-30 13:22:29', '2019-07-30 13:22:29'),
(149, 30, 6, 'Quo quo dicta aperiam velit reiciendis itaque.', '2019-07-30 13:22:29', '2019-07-30 13:22:29'),
(150, 16, 45, 'Unde et praesentium velit in.', '2019-07-30 13:22:29', '2019-07-30 13:22:29');

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
(3, '2019_07_07_050101_create_categories_table', 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` double NOT NULL,
  `currency` enum('USD','AMD') NOT NULL DEFAULT 'AMD',
  `tel` varchar(20) NOT NULL,
  `address_address` varchar(255) NOT NULL,
  `status` enum('active','inactive','top') NOT NULL DEFAULT 'active',
  `published` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `title`, `description`, `price`, `currency`, `tel`, `address_address`, `status`, `published`, `created_at`, `updated_at`) VALUES
(1, 15, 0, 'Kitchenaid 7qt', 'mikser', 0, 'AMD', '', '', 'active', 1, '2019-07-07 14:18:44', '2019-07-07 14:18:44'),
(2, 15, 0, '20qt Stand mixer', 'eli mikser', 0, 'AMD', '', '', 'active', 1, '2019-07-07 14:19:38', '2019-07-07 14:19:38'),
(3, 14, 0, 'Meat Slicer 10', 'chgitem inch', 0, 'AMD', '', '', 'active', 1, '2019-07-07 14:23:30', '2019-07-07 14:23:30'),
(11, 20, 0, 'xradukt', 'pradukt-mradukt', 222, 'AMD', '', '', 'active', 1, '2019-07-15 04:40:34', '2019-07-15 04:40:34'),
(51, 20, 0, 'Mr', 'Mr', 23424, 'AMD', '', '', 'active', 1, '2019-07-16 14:57:53', '2019-07-16 14:57:53'),
(55, 22, 0, 'Mr', 'Mrsadsadshtap', 333, 'AMD', '', '', 'inactive', 1, '2019-07-24 03:26:56', '2019-07-24 03:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_field`
--

CREATE TABLE `product_field` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_field`
--

INSERT INTO `product_field` (`id`, `product_id`, `field_id`, `title`, `value`) VALUES
(31, 101, 6, 'Chaps', 'poqr'),
(32, 101, 7, 'Ser', 'igakan'),
(33, 102, 6, 'Chaps', 'mec'),
(34, 102, 7, 'Ser', 'arakan'),
(37, 109, 6, 'Chaps', 'poqr'),
(38, 109, 7, 'Ser', 'arakan'),
(39, 110, 6, 'Chaps', 'mec'),
(41, 110, 7, 'Ser', 'arakan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('customer','admin','super-admin') COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('company','man') COLLATE utf8mb4_unicode_ci DEFAULT 'man',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `email_verified_at`, `password`, `image`, `role`, `tel`, `remember_token`, `city`, `country`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Hayks', 'Karapetyans', 'haykokalipsis@mnail.com', '2019-07-18 23:35:45', '$2y$10$hJmFyVozGrxrTR/4AjIOp.DVPGUkBa3LwWCIsKykpje22F.hE3msG', '1563879503-U6wxFtXyvB.jpeg', 'admin', '227890', 'swgWSI23Vt7HNebcfPz3h1825S1Ma7FCbLa5YZ2sC6vqLxzIkV0XZaLHhIK0', 'Yerevan', 'Yerevan', 'company', '2019-07-07 01:03:30', '2019-07-23 06:58:36'),
(2, 'Hayk', 'Karapetyan', 'haykokalipsis@nail.com', NULL, '$2y$10$NtNZTF8122zVIM6Gmo/IVuE/FK5uXI6HmYN/B8vIn.XW65R.dmC5K', NULL, 'customer', '', NULL, 'Yerevan', 'Армения', 'man', '2019-07-07 15:00:45', '2019-07-07 15:00:45'),
(3, 'Hayk', 'Karapetyan', 'haykokalipsis@gmdsasail.com', NULL, '$2y$10$Li6EzWHXwD3b5/KxW.bVJehZGvyGre8T9rWf7myge0EVruWl4sg2K', NULL, 'customer', NULL, NULL, NULL, NULL, 'man', '2019-07-23 13:26:27', '2019-07-23 13:26:27'),
(4, 'Hayk', 'Karapetyan', 'haykokalipsis@gmaildsfsd.com', NULL, '$2y$10$1mrhPghCrOQI/AWjnw4mquUwnxXJCPi0HHv/cSLSGBEzTSFCQh2zK', NULL, 'customer', NULL, 'KMBHzYVEz0dnJYLRf7QxIGIUkcWTncTIxzi5enEUI1UWkNSVOtKayrUBk12n', NULL, NULL, 'company', '2019-07-24 00:00:24', '2019-07-24 00:00:24'),
(5, 'Hayk', 'Karapetyan', 'haykokalipsis@gmail.com', NULL, '$2y$10$5j5RGUqIHaaJt/R97rt3VeAAHpT/1YnlBUg25EnxBlaU.D4mgEENW', NULL, 'admin', '37495032199', 'Sw2kJCs4PLr7evPlOiEtBJBu1zmXCKgf7FAQAsA2FPyGwgfzDM0SjzB4qIDg', NULL, NULL, 'man', '2019-07-24 00:12:29', '2019-07-24 00:12:29'),
(6, 'Hayden Bartell', 'Mr. Wendell Lynch', 'kozey.aric@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'ZJf5hc7icT', NULL, NULL, 'man', '2019-07-30 12:52:29', '2019-07-30 12:52:29'),
(7, 'Nona O\'Connell Sr.', 'Orion Blick', 'gavin92@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'UWPR6XIZVh', NULL, NULL, 'man', '2019-07-30 12:52:29', '2019-07-30 12:52:29'),
(8, 'Erica Hane', 'Karina Murray', 'effertz.judy@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'la4FZrYh9y', NULL, NULL, 'man', '2019-07-30 12:52:29', '2019-07-30 12:52:29'),
(9, 'Edgar Schuppe', 'Mr. Dallas Crona', 'cortney.rowe@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'efAVKCMJvl', NULL, NULL, 'man', '2019-07-30 12:52:29', '2019-07-30 12:52:29'),
(10, 'Erica Jakubowski', 'Antonetta McGlynn', 'jerod86@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'QdILoIcNJ7', NULL, NULL, 'man', '2019-07-30 12:52:29', '2019-07-30 12:52:29'),
(11, 'Rodolfo Lehner', 'Gerry Von', 'smurphy@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'vOihEYRZ70', NULL, NULL, 'man', '2019-07-30 12:52:30', '2019-07-30 12:52:30'),
(12, 'Brionna Lind III', 'Prof. Myles Kertzmann Jr.', 'botsford.theron@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'iPiiImtz8M', NULL, NULL, 'man', '2019-07-30 12:52:30', '2019-07-30 12:52:30'),
(13, 'Nia Hirthe', 'Meagan Larson', 'ogreenholt@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'PYTI5xn7fa', NULL, NULL, 'man', '2019-07-30 12:52:30', '2019-07-30 12:52:30'),
(14, 'Miss Precious Hansen', 'Clotilde Huel', 'conroy.madie@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, '5F1BsoqI4s', NULL, NULL, 'man', '2019-07-30 12:52:30', '2019-07-30 12:52:30'),
(15, 'Mr. Arnulfo Brown', 'Gianni Baumbach', 'onitzsche@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, '1O51EXrrUZ', NULL, NULL, 'man', '2019-07-30 12:52:30', '2019-07-30 12:52:30'),
(16, 'Dr. Hayden Wisozk', 'Dr. Roel Gerhold', 'prohaska.ervin@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'CgwGn0ZmLp', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(17, 'Prof. Jamison Kutch', 'Wellington Schmeler', 'zoey.kuvalis@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'WJJjpxEe2k', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(18, 'Dr. Celine Dietrich I', 'Dr. Kennedi Johnson', 'sziemann@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'CAu5yEFd4N', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(19, 'Abdiel Dooley', 'Chris Stroman', 'fgrant@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, '6Nli23YNZp', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(20, 'Kieran Reilly', 'Josianne Barrows', 'towne.timothy@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'OAcnRRg1oW', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(21, 'Prof. Alden Mueller Sr.', 'Mr. Arno Bernier III', 'keegan89@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, '7tXpHy4nPq', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(22, 'Garrett Gaylord I', 'Dr. Gino Flatley', 'savanah64@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'FjBsD8YZzs', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(23, 'Prof. Johnson Abernathy II', 'Trevion Lehner', 'archibald.swaniawski@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'gTMjd903Gg', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(24, 'Ms. Anissa Hahn', 'Roslyn Barrows', 'jane.hudson@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'Br0Agjhpru', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(25, 'Earl Kertzmann', 'Caitlyn Huels', 'alexandrine.turner@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'opgvju2WZh', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(26, 'Trever Veum', 'Charles Bahringer', 'beatrice.langosh@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'OwiFrbkeUG', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(27, 'Orlando Larkin', 'Dr. Bryon Hagenes DDS', 'ycorwin@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'SUusIM9yBk', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(28, 'Annabell Littel MD', 'Monty Corwin', 'kiehn.alexandrea@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'CAYOWdu4eV', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(29, 'Marcel Will', 'Declan Orn II', 'jairo.legros@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'uYtnfThF5a', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(30, 'Juana Walter III', 'Jailyn Spencer', 'ona.ferry@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'Lbx9pShSX7', NULL, NULL, 'man', '2019-07-30 12:52:31', '2019-07-30 12:52:31'),
(31, 'Dr. Brando Hane', 'Dr. Austyn Bergstrom III', 'zoe62@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'Z0P9KuPudr', NULL, NULL, 'man', '2019-07-30 12:52:32', '2019-07-30 12:52:32'),
(32, 'Elmore Lockman', 'Magdalen Olson III', 'adonis50@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'PGxFdObafC', NULL, NULL, 'man', '2019-07-30 12:52:32', '2019-07-30 12:52:32'),
(33, 'Junius Cremin', 'Leann Hackett', 'fgrant@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'FHrZFGW04U', NULL, NULL, 'man', '2019-07-30 12:52:32', '2019-07-30 12:52:32'),
(34, 'Jakayla Fisher', 'Rosemary Mohr', 'blanda.olga@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, '73nPTCqgCV', NULL, NULL, 'man', '2019-07-30 12:52:32', '2019-07-30 12:52:32'),
(35, 'Mr. Ahmed Mitchell', 'Myrna Runolfsson', 'emoen@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'kRQuSscDwh', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(36, 'Arlene Kautzer I', 'Dr. Kaleb Jacobi', 'micah.weimann@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'ETqVCEYHGF', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(37, 'Haskell Carroll', 'Elfrieda Fay', 'cedrick67@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'QF3jHBvzGQ', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(38, 'Tillman Hayes', 'Shemar Dickinson', 'kulas.matilde@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'u1fe6h5Y5V', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(39, 'Lois Roob', 'Edmond Sipes II', 'talon.pacocha@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, '0PImXAoemg', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(40, 'Miss Christiana Krajcik', 'Angela Terry', 'harmon72@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'Vh8OWNCDeZ', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(41, 'Mya Sanford', 'Candido McGlynn', 'courtney.mueller@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'ItszCU3MYU', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(42, 'Albina Strosin PhD', 'Kiana Feeney', 'noemie57@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'nPk87bw0kg', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(43, 'Jake Durgan', 'Amaya Runolfsdottir', 'gerhold.loyal@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'KiTFfMLeGX', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(44, 'Mr. Thurman Hammes II', 'Rachelle Marquardt', 'hodkiewicz.louie@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, '4E0Lkhrxsu', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(45, 'Raul Marks', 'Xander Bednar', 'willis.bosco@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'n7W9Lt98WP', NULL, NULL, 'man', '2019-07-30 12:52:33', '2019-07-30 12:52:33'),
(46, 'Paul Lakin', 'Sunny Fahey IV', 'augustus.becker@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'OvpHPnCqpc', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(47, 'Verda Schowalter', 'Leonie Fritsch', 'emmie.romaguera@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'fWb2vfj2wY', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(48, 'Delphia Kunde', 'Elsa Welch', 'bryana.shields@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'rk0PTudFaT', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(49, 'Mr. Sigrid Lehner', 'Sven Kassulke', 'ona35@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'Yyjk9YJJsO', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(50, 'Tamia Kertzmann', 'Pearl Hand', 'bruce15@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'CYBBa6rnnE', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(51, 'Jermaine Breitenberg', 'Nina Rodriguez', 'walter.frida@example.net', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'N7nuN9m3Uo', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(52, 'Prof. Estefania Treutel IV', 'Jensen Ward', 'zmarquardt@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'wSQkhPr57u', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(53, 'Miss Maria Bernhard', 'Annalise Schulist', 'abigayle.emard@example.com', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'pVB7UMDUer', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(54, 'Devin Weimann III', 'Frankie Rolfson Jr.', 'roosevelt16@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'o3dHjLHBOw', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34'),
(55, 'Kianna Fahey', 'Gabe Cummings', 'ycole@example.org', NULL, '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'http://lorempixel.com/150/150', 'customer', NULL, 'sSGAGZLqzj', NULL, NULL, 'man', '2019-07-30 12:52:34', '2019-07-30 12:52:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_field`
--
ALTER TABLE `category_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_field`
--
ALTER TABLE `product_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category_field`
--
ALTER TABLE `category_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1235;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `product_field`
--
ALTER TABLE `product_field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
