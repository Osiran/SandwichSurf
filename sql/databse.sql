-- Host: 127.0.0.1
-- Username: Root
-- Server: MariaDB
-- Password: ""

-- Create Database Sandwichsurf
CREATE DATABASE IF NOT EXISTS `sandwichsurf`;

-- Select Databse
USE `sandwichsurf`;

-- Create table Bread
CREATE TABLE `bread`(
    pk_bread int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    PRIMARY KEY (pk_bread)
);

-- Create table Cheese
CREATE TABLE `cheese`(
    pk_cheese int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    PRIMARY KEY (pk_cheese)
);

-- Create table meat
CREATE TABLE `meat`(
    pk_meat int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    PRIMARY KEY (pk_meat)
);

-- Create table sauce
CREATE TABLE `sauce`(
    pk_sauce int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    PRIMARY KEY (pk_sauce)
);

-- Create table vegetables
CREATE TABLE `vegetables`(
    pk_vegetables int NOT NULL AUTO_INCREMENT,
    label varchar(255),
    img varchar(255),
    PRIMARY KEY (pk_vegetables)
);

-- Create table Orders
CREATE TABLE `orders`(
    pk_orders int NOT NULL AUTO_INCREMENT,
    fk_bread int,
    fk_cheese int,
    fk_meat int,
    fk_sauce int,
    fk_orders_vegetables int,
    timestamp int,
    PRIMARY KEY (pk_orders)
);

-- Create table Orders_Vegetables
CREATE TABLE `orders_vegetables`(
    pk_orders_vegetables int NOT NULL AUTO_INCREMENT,
    fk_orders int,
    fk_vegetables int,
    PRIMARY KEY (pk_orders_vegetables)
);

-- Create table Staff
CREATE TABLE `staff`(
    pk_staffId int NOT NULL AUTO_INCREMENT,
    password varchar(16),
    PRIMARY KEY (pk_staffId)
);