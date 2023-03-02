-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `vegetables`
(`label`,`img`)
values
('Everything','public/img/icon.png'),
('Ananas','public/img/icon.png'),
('Banane','public/img/icon.png'),
('Champignon','public/img/icon.png'),
('Gurke','public/img/icon.png'),
('Jalapeños','public/img/icon.png'),
('Mais','public/img/icon.png'),
('Pepperoni','public/img/icon.png'),
('Salat','public/img/icon.png'),
('Tomate','public/img/icon.png'),
('Zwiebel','public/img/icon.png');

-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `staff`
(`password`,`userRole`)
values
('abc123','Admin'),
('abc123','Staff');
-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `sauce`
(`label`,`img`)
values
('Cocktail','public/img/icon.png'),
('Ketchup','public/img/icon.png'),
('Mayonnaise','public/img/icon.png'),
('Senf','public/img/icon.png');

-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `orders_vegetables`
(`fk_orders`,`fk_vegetables`)
values
('1','1');

-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `orders`
(`fk_bread`,`fk_cheese`,`fk_meat`,`fk_sauce`,`fk_orders_vegetables`)
values
('1','1','1','1','1');

-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `meat`
(`label`,`img`)
values
('Hühnchen','public/img/icon.png'),
('Roast-Beef','public/img/icon.png'),
('Schinken','public/img/icon.png'),
('Tofu','public/img/icon.png');

-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `cheese`
(`label`,`img`)
values
('Appenzeller','public/img/icon.png'),
('Cheddar','public/img/icon.png'),
('Emmentaler','public/img/icon.png'),
('Laktosefrei','public/img/icon.png');
-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Use Database
USE `sandwichsurf`;
INSERT INTO `bread`
(`label`,`img`)
values
('Ciabatta','public/img/icon.png'),
('Glutenfrei','public/img/icon.png'),
('Vollkorn','public/img/icon.png'),
('Weissmehl','public/img/icon.png');