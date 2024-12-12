-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table k-inventory-management-database.categories: ~0 rows (approximately)
INSERT IGNORE INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Virgie Schneider', 'Amet ut iure molestias sunt. Et soluta et quaerat. Ab totam consequuntur ullam omnis. Sapiente et error non quod itaque quas.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(2, 'Louie Beer', 'Et est ut alias. Dolores dolor temporibus facilis maiores. Occaecati dolorem qui error soluta. Libero sit adipisci sit.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(3, 'Alysson Lowe', 'Cum officiis animi rem dolor sequi veritatis debitis et. Saepe quia ratione molestiae ad. Ratione sed labore quod quia vel.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(4, 'Genesis Gislason', 'Illo repellat dolore optio aut. Quo porro eos ea vero repudiandae.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(5, 'Dexter Beer', 'Atque voluptatem omnis deserunt et voluptatem iure. Non qui voluptas perspiciatis consectetur sapiente. Dolor totam porro ut dolores nostrum at.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(6, 'Sadye Prohaska', 'Aut quibusdam molestias quod accusantium quo ipsa in placeat. Sapiente delectus a velit et quam error. Ad laborum qui harum dolorum rerum dolor id. Quis architecto iure amet reiciendis nulla enim.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(7, 'Dr. Ian Carter V', 'Ut sunt quia voluptatem debitis est. Eos nulla autem temporibus porro nisi. Qui voluptatem quas sed a rerum a illo.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(8, 'Amani Bartoletti', 'Ut itaque itaque voluptatem placeat quo. Dicta saepe dicta eum. Maiores pariatur vel nihil. Explicabo et quis omnis deleniti quis ad.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(9, 'Miss Malika McDermott', 'Enim eos eius qui aut. Necessitatibus architecto ut et fugit enim ipsum est. Necessitatibus sit sapiente ad earum perferendis perspiciatis.', '2024-12-11 20:22:09', '2024-12-11 20:22:09'),
	(10, 'Ursula Bechtelar', 'Molestias non autem veniam sunt sed. Aut est porro non. Enim consequatur maiores repellat.', '2024-12-11 20:22:09', '2024-12-11 20:22:09');

-- Dumping data for table k-inventory-management-database.customers: ~0 rows (approximately)
INSERT IGNORE INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
	(1, 'Mertie Windler', 'xnicolas@example.com', '732.533.6736', '1071 Metz Underpass\nHowefort, UT 05225-1607', '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(2, 'Woodrow Hauck', 'thaddeus53@example.com', '(972) 388-8371', '973 Leuschke Trail\nPort Enochville, OH 71705-5986', '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(3, 'Douglas Grimes', 'nader.liam@example.org', '681-598-3606', '415 Welch Parkways\nSouth Flofort, MN 32541', '2024-12-11 20:22:11', '2024-12-11 20:22:11');

-- Dumping data for table k-inventory-management-database.failed_jobs: ~0 rows (approximately)

-- Dumping data for table k-inventory-management-database.migrations: ~0 rows (approximately)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_10_16_011331_add_custom_fields_to_users_table', 1),
	(6, '2024_10_16_012048_add_avatar_url_to_users_table', 1),
	(7, '2024_10_16_023300_create_sessions_table', 1),
	(9, '2024_10_17_095327_add_two_factor_authentication_columns', 1),
	(10, '2024_11_17_010138_create_suppliers_table', 1),
	(11, '2024_11_18_094030_create_categories_table', 1),
	(12, '2024_11_19_141146_create_products_table', 1),
	(13, '2024_11_20_060040_create_customers_table', 1),
	(14, '2024_11_21_055417_orders', 1),
	(15, '2024_11_27_011119_create_order_items_table', 1),
	(16, '2024_10_17_082229_create_permission_tables', 2);

-- Dumping data for table k-inventory-management-database.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table k-inventory-management-database.model_has_roles: ~2 rows (approximately)
INSERT IGNORE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2);

-- Dumping data for table k-inventory-management-database.orders: ~1 rows (approximately)
INSERT IGNORE INTO `orders` (`id`, `customer_id`, `order_number`, `address`, `total`, `status`, `message_for_seller`, `created_at`, `updated_at`) VALUES
	(1, 3, 'ORD-R3XX8V', 'Located at #44 doon St.', 945.99, 'Pending', 'pabalot salamat', '2024-12-11 20:27:26', '2024-12-11 20:50:42');

-- Dumping data for table k-inventory-management-database.order_items: ~1 rows (approximately)
INSERT IGNORE INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `total`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 10, 23, 945.99, 'Pending', '2024-12-11 20:27:26', '2024-12-11 20:50:42');

-- Dumping data for table k-inventory-management-database.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table k-inventory-management-database.permissions: ~92 rows (approximately)
INSERT IGNORE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(2, 'view_any_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(3, 'create_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(4, 'update_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(5, 'restore_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(6, 'restore_any_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(7, 'replicate_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(8, 'reorder_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(9, 'delete_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(10, 'delete_any_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(11, 'force_delete_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(12, 'force_delete_any_category', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(13, 'view_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(14, 'view_any_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(15, 'create_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(16, 'update_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(17, 'restore_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(18, 'restore_any_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(19, 'replicate_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(20, 'reorder_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(21, 'delete_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(22, 'delete_any_customer', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(23, 'force_delete_customer', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(24, 'force_delete_any_customer', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(25, 'view_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(26, 'view_any_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(27, 'create_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(28, 'update_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(29, 'restore_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(30, 'restore_any_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(31, 'replicate_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(32, 'reorder_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(33, 'delete_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(34, 'delete_any_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(35, 'force_delete_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(36, 'force_delete_any_order', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(37, 'view_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(38, 'view_any_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(39, 'create_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(40, 'update_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(41, 'restore_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(42, 'restore_any_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(43, 'replicate_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(44, 'reorder_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(45, 'delete_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(46, 'delete_any_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(47, 'force_delete_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(48, 'force_delete_any_order::item', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(49, 'view_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(50, 'view_any_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(51, 'create_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(52, 'update_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(53, 'restore_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(54, 'restore_any_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(55, 'replicate_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(56, 'reorder_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(57, 'delete_products', 'web', '2024-12-11 20:23:38', '2024-12-11 20:23:38'),
	(58, 'delete_any_products', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(59, 'force_delete_products', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(60, 'force_delete_any_products', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(61, 'view_shield::role', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(62, 'view_any_shield::role', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(63, 'create_shield::role', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(64, 'update_shield::role', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(65, 'delete_shield::role', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(66, 'delete_any_shield::role', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(67, 'view_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(68, 'view_any_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(69, 'create_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(70, 'update_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(71, 'restore_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(72, 'restore_any_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(73, 'replicate_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(74, 'reorder_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(75, 'delete_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(76, 'delete_any_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(77, 'force_delete_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(78, 'force_delete_any_supplier', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(79, 'view_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(80, 'view_any_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(81, 'create_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(82, 'update_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(83, 'restore_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(84, 'restore_any_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(85, 'replicate_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(86, 'reorder_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(87, 'delete_user', 'web', '2024-12-11 20:23:39', '2024-12-11 20:23:39'),
	(88, 'delete_any_user', 'web', '2024-12-11 20:23:40', '2024-12-11 20:23:40'),
	(89, 'force_delete_user', 'web', '2024-12-11 20:23:40', '2024-12-11 20:23:40'),
	(90, 'force_delete_any_user', 'web', '2024-12-11 20:23:40', '2024-12-11 20:23:40'),
	(91, 'page_EditProfilePage', 'web', '2024-12-11 20:23:40', '2024-12-11 20:23:40'),
	(92, 'widget_UserDashboard', 'web', '2024-12-11 20:23:40', '2024-12-11 20:23:40');

-- Dumping data for table k-inventory-management-database.personal_access_tokens: ~0 rows (approximately)

-- Dumping data for table k-inventory-management-database.products: ~0 rows (approximately)
INSERT IGNORE INTO `products` (`id`, `name`, `category_id`, `supplier_id`, `description`, `price`, `stock_quantity`, `created_at`, `updated_at`) VALUES
	(1, 'Raheem Rohan DDS', 2, 2, 'Qui ut qui eum maxime adipisci veritatis iste. Iste qui sed sed laudantium qui perspiciatis debitis. Quia non quas nobis rerum quis cum eveniet.', 61.67, 29, '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(2, 'Mrs. Ava Lueilwitz MD', 2, 2, 'Qui voluptas corporis molestias esse. Non ut dolorum ut dolorem ex facilis. Porro dolores explicabo sed quia est id est rerum.', 468.05, 10, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(3, 'Kelli Hudson', 9, 6, 'Eveniet molestiae perspiciatis est sint. Cumque dolore illo ad voluptatem quisquam labore quasi ut. Repellendus eum necessitatibus porro.', 846.31, 46, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(4, 'Mr. Hermann Feeney', 1, 2, 'Et laboriosam ipsum sunt quaerat qui non eos. Ipsam sit dolor est voluptatem vitae modi. Odio tenetur ullam quis et temporibus repudiandae iste. Excepturi ratione inventore aut quasi neque.', 725.61, 47, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(5, 'Alexandrine Schinner', 3, 2, 'Ut doloremque est temporibus consequatur. Aliquam eveniet ipsam aspernatur eum autem. Corrupti et eligendi voluptatem itaque.', 327.46, 86, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(6, 'Ethelyn Lakin V', 3, 7, 'Saepe iste corporis occaecati accusantium qui. Quia ut laudantium mollitia voluptas sed voluptatem recusandae. Iusto ratione doloribus ipsam sequi id modi.', 302.16, 24, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(7, 'Cristal Bernier', 4, 2, 'Minima eveniet rerum qui. Nesciunt laborum saepe facilis maxime. Officiis nobis dolorem autem. Iste aut magnam id repellendus.', 511.18, 74, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(8, 'Prof. Rodrigo Howe', 9, 9, 'Impedit magni et facere nihil et. Consectetur id distinctio corrupti sequi sapiente neque.', 266.27, 82, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(9, 'Ms. Retha Lang', 7, 6, 'Qui fuga dolor voluptas ut. Consequatur vitae fuga ipsa numquam. Tempora non corporis earum unde omnis quia totam.', 545.98, 52, '2024-12-11 20:22:11', '2024-12-11 20:22:11'),
	(10, 'Randal Klocko', 2, 3, 'Ab delectus aliquam distinctio natus in expedita. Voluptas recusandae qui repellat itaque magnam perferendis ut. Consequuntur excepturi maiores vel.', 41.13, 1, '2024-12-11 20:22:11', '2024-12-11 20:50:42');

-- Dumping data for table k-inventory-management-database.roles: ~3 rows (approximately)
INSERT IGNORE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'web', '2024-12-11 20:23:37', '2024-12-11 20:23:37'),
	(2, 'Staff', 'web', '2024-12-11 20:23:40', '2024-12-11 20:26:12'),
	(4, 'panel_user', 'web', '2024-12-11 22:42:36', '2024-12-11 22:42:36');

-- Dumping data for table k-inventory-management-database.role_has_permissions: ~112 rows (approximately)
INSERT IGNORE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
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
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(54, 1),
	(55, 1),
	(56, 1),
	(57, 1),
	(58, 1),
	(59, 1),
	(60, 1),
	(61, 1),
	(62, 1),
	(63, 1),
	(64, 1),
	(65, 1),
	(66, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(74, 1),
	(75, 1),
	(76, 1),
	(77, 1),
	(78, 1),
	(79, 1),
	(80, 1),
	(81, 1),
	(82, 1),
	(83, 1),
	(84, 1),
	(85, 1),
	(86, 1),
	(87, 1),
	(88, 1),
	(89, 1),
	(90, 1),
	(91, 1),
	(92, 1),
	(1, 2),
	(2, 2),
	(13, 2),
	(14, 2),
	(25, 2),
	(26, 2),
	(27, 2),
	(28, 2),
	(33, 2),
	(34, 2),
	(37, 2),
	(38, 2),
	(39, 2),
	(40, 2),
	(45, 2),
	(46, 2),
	(49, 2),
	(50, 2),
	(51, 2),
	(52, 2),
	(57, 2),
	(67, 2),
	(68, 2),
	(91, 2);

-- Dumping data for table k-inventory-management-database.sessions: ~0 rows (approximately)
INSERT IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('IeHxnyK4ND7fQQ5LANtg7eKPeXGkOWIg9oD2wp4g', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZDlBTXMxMmZmN1pGTjdsSDlPck1VZlFFTVI4QTZZdnBxanE1M21HNSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vbXktcHJvZmlsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiR0bUpJZGlxVjUxczAudHBKdnVuQ04uNGFHUk5nRVJqMkhvM3A4OTBQa05nUWpvd0xNbXJQLiI7fQ==', 1733984159),
	('L2CGH6N0D14KOAGko3RWLOeY5xCJO0WyB99INKuo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoicE1KWTdaYjNsVXVnWW51a0tiWU9Nd3ZmRjl4UVQ2VzRkUE50c3BBeSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vc2hpZWxkL3JvbGVzLzIvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiQwbFkyZm85ZjdETnZTOW5qdzBBT1J1OGFuRkpCLjRLVjRoTG1JTzdIMTl3NC9VRERvNkhZLiI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1733985788);

-- Dumping data for table k-inventory-management-database.suppliers: ~0 rows (approximately)
INSERT IGNORE INTO `suppliers` (`id`, `name`, `contact_person`, `contact_address`, `contact_phone`, `contact_email`, `created_at`, `updated_at`) VALUES
	(1, 'Little, Gottlieb and Bartell', 'Lawrence Bauch', '3936 Rey Trace Suite 778\nNorth Makenzie, MO 72312', '+1-831-378-8456', 'bette39@daugherty.org', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(2, 'O\'Conner, Stroman and Kessler', 'Jettie Ledner', '542 Joey Ways\nSouth Christy, ID 10412-8745', '+1-570-226-9719', 'damien.hane@daniel.org', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(3, 'Blanda, Rath and Raynor', 'Mr. Robert Koss IV', '24079 Pink Shores Apt. 940\nWalkerview, RI 43402', '+1-385-409-7330', 'estrella.bogisich@gmail.com', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(4, 'Fahey Group', 'Dr. Carrie Williamson', '5531 Louvenia Heights\nSouth Mozell, DC 14231-0802', '+1.806.702.0607', 'erling.zemlak@heidenreich.info', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(5, 'Crist-Parisian', 'Colten Cummings III', '933 Huels Cliffs Apt. 306\nDarrylton, AR 78197', '(909) 718-2544', 'eldred.wiza@yahoo.com', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(6, 'Braun PLC', 'Gaylord Stokes', '8061 Jacobson Crest\nStrackemouth, GA 95310-0634', '1-805-616-7976', 'durgan.assunta@boyer.net', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(7, 'Keeling, Funk and Leuschke', 'Miss Malinda Stark', '33762 Rau Crossing\nWest Bridgette, VA 48097', '+1-989-501-2731', 'kurt.pfeffer@heller.com', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(8, 'Will-Langosh', 'Mafalda White', '6415 Mann Junctions\nBernhardland, NJ 28478', '831-767-3998', 'wilhelmine79@gmail.com', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(9, 'Lakin PLC', 'Aracely Huel', '695 Hayley Passage\nPort Weldonfurt, HI 18445-4552', '(484) 998-7617', 'harvey.denesik@mills.net', '2024-12-11 20:22:10', '2024-12-11 20:22:10'),
	(10, 'Anderson-Mayert', 'Makenzie Hilpert', '84257 Weber Terrace Apt. 117\nBraedenfort, NM 04894-7208', '+1.603.954.0653', 'schmitt.domenica@gmail.com', '2024-12-11 20:22:10', '2024-12-11 20:22:10');

-- Dumping data for table k-inventory-management-database.users: ~0 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `custom_fields`, `avatar_url`) VALUES
	(1, 'Super Admin', 'superadmin@gmail.com', '2024-12-11 20:22:08', '$2y$12$0lY2fo9f7DNvS9njw0AORu8anFJB.4KV4hLmIO7H19w4/UDDo6HY.', 'eyJpdiI6IlFqZWM2N2xtNnBzMmN6dUJZdlE4dkE9PSIsInZhbHVlIjoiVTJDMTRFcG8rRmM4dGtwSWVmSGJRLytNL0xGRHJUSUlXWWJzWE51MUFQdz0iLCJtYWMiOiIxODVjODFiMjBlNTdhNTM5OGM3MDM2ZDJmNzYzM2ZkNzI4MGY0N2ZiNTFiZmY4N2RlZDgxMTc3NzE5MGRmZTY2IiwidGFnIjoiIn0=', 'eyJpdiI6IjkvamdwTit5N0hEYmhNY3NKWlk2cmc9PSIsInZhbHVlIjoicloyYWxLN1dxSkJianExS3NrZjNkU2R1OUc1M3lSWnRTRFptRHZIV29ISi95STludUlURlBDMWsxaU16SjhKNzcrYklZc2hkNGpzekJldW02LzlIbTJTaUV3R0VKTThtdE1odGZoWk1DeVA3bzIzZ2dRK20yS2FDVkMrYkw3czJndWxlOFYzb1pFcEw0c0puRGh4a3owdHgzeXdva3pQaGZQNFhPbWhmRXN1dHp2Tk90NUpKd05vaEQ4cURlOGhwbmozL0JadGo0VmtYVnRlZXRzbTMwakFZR0tncXpuMm1lNXBIZnMzYW04OEhDVzhua3AzVUtXRitKczA3WXJ4OTJuclFFUGZzY2FkYnllQ3NRS3lwUFE9PSIsIm1hYyI6IjQ3NDg2YTdkYmM4ZjE4ZDdlNDBkNmM5MTE4OThkMjE1ODJjNmIyZmY2ZDAzZWIxOWM5MzliMjMzMzAxYWI4NTYiLCJ0YWciOiIifQ==', NULL, '8klXctONAz', '2024-12-11 20:22:09', '2024-12-11 22:41:12', NULL, ''),
	(2, 'Staff Test', 'Staff@gmail.com', '2024-12-11 20:22:09', '$2y$12$tmJIdiqV51s0.tpJvunCN.4aGRNgERj2Ho3p890PkNgQjowLMmrP.', NULL, NULL, NULL, 'VexKSG9qxf', '2024-12-11 20:22:09', '2024-12-11 20:22:09', NULL, '');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
