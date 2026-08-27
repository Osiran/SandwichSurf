-- Migration: evolve the simple configurator DB into the ordering platform.
-- Idempotent-ish and additive; run once on an existing sandwichsurf database.
USE `sandwichsurf`;

-- 1) Ingredient prices.
ALTER TABLE `bread`      ADD COLUMN `price` decimal(6,2) NOT NULL DEFAULT 0;
ALTER TABLE `cheese`     ADD COLUMN `price` decimal(6,2) NOT NULL DEFAULT 0;
ALTER TABLE `meat`       ADD COLUMN `price` decimal(6,2) NOT NULL DEFAULT 0;
ALTER TABLE `sauce`      ADD COLUMN `price` decimal(6,2) NOT NULL DEFAULT 0;
ALTER TABLE `vegetables` ADD COLUMN `price` decimal(6,2) NOT NULL DEFAULT 0;

-- Reasonable default prices for the seeded ingredients.
UPDATE `bread`      SET price = CASE label WHEN 'Ciabatta' THEN 2.00 WHEN 'Glutenfrei' THEN 2.50 WHEN 'Vollkorn' THEN 2.00 WHEN 'Weissmehl' THEN 1.50 ELSE 2.00 END;
UPDATE `cheese`     SET price = CASE label WHEN 'Appenzeller' THEN 1.50 WHEN 'Cheddar' THEN 1.20 WHEN 'Emmentaler' THEN 1.20 WHEN 'Laktosefrei' THEN 1.80 ELSE 1.20 END;
UPDATE `meat`       SET price = CASE label WHEN 'Hühnchen' THEN 3.00 WHEN 'Roast-Beef' THEN 3.50 WHEN 'Schinken' THEN 2.50 WHEN 'Tofu' THEN 2.80 ELSE 3.00 END;
UPDATE `sauce`      SET price = CASE label WHEN 'Cocktail' THEN 0.50 ELSE 0.30 END;
UPDATE `vegetables` SET price = CASE label WHEN 'Everything' THEN 2.00 ELSE 0.40 END;

-- 2) Order grouping + status + tracking.
CREATE TABLE IF NOT EXISTS `order_groups`(
    pk_order_group int NOT NULL AUTO_INCREMENT,
    customer_name varchar(255) DEFAULT NULL,
    status varchar(20) NOT NULL DEFAULT 'received',
    total_price decimal(8,2) NOT NULL DEFAULT 0,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (pk_order_group)
);

ALTER TABLE `orders` ADD COLUMN `fk_order_group` int DEFAULT NULL;
ALTER TABLE `orders` ADD COLUMN `quantity` int NOT NULL DEFAULT 1;
ALTER TABLE `orders` ADD COLUMN `unit_price` decimal(8,2) NOT NULL DEFAULT 0;

-- Back-fill: wrap any pre-existing loose orders into one group each so they still
-- appear in the overview with a status.
INSERT INTO `order_groups` (customer_name, status, total_price)
    SELECT NULL, 'received', 0 FROM `orders` WHERE fk_order_group IS NULL;

-- 3) Widen staff.password for bcrypt hashes (was varchar(16)).
ALTER TABLE `staff` MODIFY `password` varchar(255);
