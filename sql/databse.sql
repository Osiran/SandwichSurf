-- Host: 127.0.0.1
-- Server: MySQL / MariaDB
-- Fresh schema for the SandwichSurf ordering platform.

-- Create Database Sandwichsurf
CREATE DATABASE IF NOT EXISTS `sandwichsurf`;

-- Select Databse
USE `sandwichsurf`;

-- Ingredient tables carry a price so a sandwich total can be computed.
CREATE TABLE `bread`(
    pk_bread int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    price decimal(6,2) NOT NULL DEFAULT 0,
    PRIMARY KEY (pk_bread)
);

CREATE TABLE `cheese`(
    pk_cheese int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    price decimal(6,2) NOT NULL DEFAULT 0,
    PRIMARY KEY (pk_cheese)
);

CREATE TABLE `meat`(
    pk_meat int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    price decimal(6,2) NOT NULL DEFAULT 0,
    PRIMARY KEY (pk_meat)
);

CREATE TABLE `sauce`(
    pk_sauce int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    price decimal(6,2) NOT NULL DEFAULT 0,
    PRIMARY KEY (pk_sauce)
);

CREATE TABLE `vegetables`(
    pk_vegetables int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    price decimal(6,2) NOT NULL DEFAULT 0,
    PRIMARY KEY (pk_vegetables)
);

-- An order (one customer submission) groups one or more sandwiches, carries the
-- order number the customer tracks, a status, and the total price snapshot.
CREATE TABLE `order_groups`(
    pk_order_group int NOT NULL AUTO_INCREMENT,
    customer_name varchar(255) DEFAULT NULL,
    status varchar(20) NOT NULL DEFAULT 'received',
    total_price decimal(8,2) NOT NULL DEFAULT 0,
    created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (pk_order_group)
);

-- Each sandwich in an order. unit_price is the per-sandwich price snapshot taken
-- at order time so the displayed price never drifts if ingredient prices change.
CREATE TABLE `orders`(
    pk_orders int NOT NULL AUTO_INCREMENT,
    fk_order_group int DEFAULT NULL,
    fk_bread int,
    fk_cheese int,
    fk_meat int,
    fk_sauce int,
    quantity int NOT NULL DEFAULT 1,
    unit_price decimal(8,2) NOT NULL DEFAULT 0,
    PRIMARY KEY (pk_orders)
);

CREATE TABLE `orders_vegetables`(
    pk_orders_vegetables int NOT NULL AUTO_INCREMENT,
    fk_orders int,
    fk_vegetables int,
    PRIMARY KEY (pk_orders_vegetables)
);

-- password holds a bcrypt hash (60 chars); widened from the old varchar(16).
CREATE TABLE `staff`(
    pk_staffId int NOT NULL AUTO_INCREMENT,
    password varchar(255),
    userRole varchar(10),
    PRIMARY KEY (pk_staffId)
);
