-- Seed data for the SandwichSurf ordering platform.
USE `sandwichsurf`;

INSERT INTO `bread` (`label`,`img`,`price`) VALUES
('Ciabatta','public/img/icon.png',2.00),
('Glutenfrei','public/img/icon.png',2.50),
('Vollkorn','public/img/icon.png',2.00),
('Weissmehl','public/img/icon.png',1.50);

INSERT INTO `cheese` (`label`,`img`,`price`) VALUES
('Appenzeller','public/img/icon.png',1.50),
('Cheddar','public/img/icon.png',1.20),
('Emmentaler','public/img/icon.png',1.20),
('Laktosefrei','public/img/icon.png',1.80);

INSERT INTO `meat` (`label`,`img`,`price`) VALUES
('Hühnchen','public/img/icon.png',3.00),
('Roast-Beef','public/img/icon.png',3.50),
('Schinken','public/img/icon.png',2.50),
('Tofu','public/img/icon.png',2.80);

INSERT INTO `sauce` (`label`,`img`,`price`) VALUES
('Cocktail','public/img/icon.png',0.50),
('Ketchup','public/img/icon.png',0.30),
('Mayonnaise','public/img/icon.png',0.30),
('Senf','public/img/icon.png',0.30);

INSERT INTO `vegetables` (`label`,`img`,`price`) VALUES
('Everything','public/img/icon.png',2.00),
('Ananas','public/img/icon.png',0.40),
('Banane','public/img/icon.png',0.40),
('Champignon','public/img/icon.png',0.40),
('Gurke','public/img/icon.png',0.40),
('Jalapeños','public/img/icon.png',0.40),
('Mais','public/img/icon.png',0.40),
('Pepperoni','public/img/icon.png',0.40),
('Salat','public/img/icon.png',0.40),
('Tomate','public/img/icon.png',0.40),
('Zwiebel','public/img/icon.png',0.40);

-- Staff passwords are bcrypt hashes of 'abc123' (id 1 = Admin, id 2 = Staff).
-- Legacy plaintext passwords are still accepted and auto-upgraded on next login.
INSERT INTO `staff` (`password`,`userRole`) VALUES
('$2y$10$VlmNGzSdBlL0KwxmXz4KneAcDmk/pIVI0KTa8r60yFnHWcRBDE05q','Admin'),
('$2y$10$VlmNGzSdBlL0KwxmXz4KneAcDmk/pIVI0KTa8r60yFnHWcRBDE05q','Staff');

-- One sample order so the overview isn't empty: a Ciabatta / Emmentaler /
-- Hühnchen / Ketchup sandwich (2.00+1.20+3.00+0.30 = 6.50) with Salat (+0.40).
INSERT INTO `order_groups` (`customer_name`,`status`,`total_price`) VALUES
('Max Muster','received',6.90);
INSERT INTO `orders` (`fk_order_group`,`fk_bread`,`fk_cheese`,`fk_meat`,`fk_sauce`,`quantity`,`unit_price`) VALUES
(1,1,3,1,2,1,6.90);
INSERT INTO `orders_vegetables` (`fk_orders`,`fk_vegetables`) VALUES
(1,9);
