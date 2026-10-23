-- WRISTVERSE - Production XAMPP/MySQL schema (non-destructive)
CREATE DATABASE IF NOT EXISTS `wristverse` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `wristverse`;

CREATE TABLE IF NOT EXISTS `products` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `category` VARCHAR(100) NOT NULL DEFAULT 'Smart Watches',
  `price` DECIMAL(10,2) NOT NULL,
  `cost_price` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `stock` INT NOT NULL DEFAULT 0,
  `image` VARCHAR(500) DEFAULT NULL,
  `featured` TINYINT(1) NOT NULL DEFAULT 0,
  `active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_products_active` (`active`),
  INDEX `idx_products_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('customer','admin') NOT NULL DEFAULT 'customer',
  `phone` VARCHAR(50) NOT NULL DEFAULT '',
  `city` VARCHAR(100) NOT NULL DEFAULT '',
  `address` TEXT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_users_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `order_number` VARCHAR(60) NOT NULL UNIQUE,
  `user_id` INT UNSIGNED DEFAULT NULL,
  `customer_name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `email` VARCHAR(150) DEFAULT NULL,
  `address` TEXT NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `postal_code` VARCHAR(30) NOT NULL DEFAULT '',
  `notes` TEXT NULL,
  `payment_method` ENUM('cod','easypaisa','jazzcash') NOT NULL DEFAULT 'cod',
  `payment_proof` VARCHAR(500) NOT NULL DEFAULT '',
  `transaction_id` VARCHAR(150) NOT NULL DEFAULT '',
  `subtotal` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `discount` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `shipping` DECIMAL(10,2) NOT NULL DEFAULT 250.00,
  `total` DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  `status` ENUM('Pending','Confirmed','Processing','Dispatched','Delivered','Cancelled') NOT NULL DEFAULT 'Pending',
  `payment_status` VARCHAR(50) NOT NULL DEFAULT 'Unpaid',
  `tracking_number` VARCHAR(100) NOT NULL DEFAULT '',
  `tracking_url` VARCHAR(500) NOT NULL DEFAULT '',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  INDEX `idx_orders_user` (`user_id`),
  INDEX `idx_orders_email` (`email`),
  INDEX `idx_orders_phone` (`phone`),
  INDEX `idx_orders_status` (`status`),
  INDEX `idx_orders_tracking` (`tracking_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT UNSIGNED NOT NULL,
  `product_id` INT UNSIGNED DEFAULT NULL,
  `name` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `qty` INT UNSIGNED NOT NULL DEFAULT 1,
  `line` DECIMAL(10,2) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  INDEX `idx_order_items_order` (`order_id`),
  INDEX `idx_order_items_product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `label` VARCHAR(255) NOT NULL,
  `amount` DECIMAL(10,2) NOT NULL,
  `expense_date` DATE NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_expenses_date` (`expense_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_key` VARCHAR(100) PRIMARY KEY,
  `setting_value` LONGTEXT NOT NULL,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed products only when those IDs do not already exist.
INSERT IGNORE INTO `products` (`id`,`name`,`description`,`category`,`price`,`cost_price`,`stock`,`image`,`featured`,`active`) VALUES
(1,'WRISTVERSE Apex Pro Smart Watch','Premium AMOLED smartwatch with heart-rate, SpO2, sleep tracking and 14-day battery life.','Smart Watches',8499,5200,15,'uploads/products/watch1.png',1,1),
(2,'WRISTVERSE Pulse X Fitness Band','Lightweight fitness tracker with continuous heart-rate, step counter and IP68 water resistance.','Fitness Bands',3299,1900,25,'uploads/products/watch2.png',1,1),
(3,'WRISTVERSE Royale Gold Edition','Luxury smartwatch with rose-gold case, leather strap, ECG and always-on display.','Smart Watches',14999,9500,8,'uploads/products/watch3.png',1,1),
(4,'WRISTVERSE Titan Rugged Outdoor','Military-grade rugged smartwatch with GPS, altimeter and 30-day battery for adventurers.','Smart Watches',11999,7400,12,'uploads/products/watch4.png',0,1),
(5,'WRISTVERSE Cloud White Ceramic','Minimalist ceramic smartwatch with sapphire glass, wireless charging and NFC payments.','Smart Watches',16499,10800,6,'uploads/products/watch5.png',0,1),
(6,'WRISTVERSE Sport Band Pro','Replacement silicone sport band, breathable and sweat-resistant, fits 42-46mm watches.','Accessories',1299,600,40,'uploads/products/watch2.png',0,1),
(7,'WRISTVERSE Magnetic Leather Strap','Premium magnetic leather strap for smartwatches, handcrafted Italian leather.','Accessories',2499,1200,22,'uploads/products/watch3.png',0,1),
(8,'WRISTVERSE Wireless Charging Dock','Fast wireless charging dock for smartwatches, aluminum body with LED indicator.','Accessories',1899,900,30,'uploads/products/watch1.png',0,1);

-- Default admin password is Admin@12345. Change it after first login.
INSERT IGNORE INTO `users` (`id`,`name`,`email`,`password`,`role`) VALUES
(1,'WRISTVERSE Admin','admin@wristverse.pk','$2y$12$657tpJw.QF2ZYculNOl5ouXIkKtdbbk9ypn5499zuS/WtodL/UuDi','admin');

INSERT IGNORE INTO `settings` (`setting_key`,`setting_value`) VALUES
('store_config','{"store_name":"WRISTVERSE.PK","support_email":"supportwristversepk@gmail.com","store_phone":"03273822228","whatsapp_number":"92327382228","easypaisa_number":"03273822228","jazzcash_number":"03074364067","shipping_charge":250,"discount_percent":5}');
