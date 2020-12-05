DROP DATABASE IF EXISTS inquirer;

CREATE DATABASE inquirer DEFAULT CHARACTER
SET
  utf8 COLLATE utf8_general_ci;

GRANT ALL ON inquirer. * TO soraisu@localhost IDENTIFIED BY 'sprwAeixb26vds';

use inquirer;

CREATE TABLE customer (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR (30) NOT NULL,
  email CHAR (50) NOT NULL,
  pass VARCHAR (30) NOT NULL
);

CREATE TABLE rental (
  id INT AUTO_INCREMENT,
  customer_id INT NOT NULL,
  reserve_date DATE NOT NULL,
  receipt_date DATE NOT NULL,
  receipt_library_id INT NOT NULL,
  book_id INT NOT NULL,
  PRIMARY KEY (id, customer_id)
);

CREATE TABLE book (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR (30) NOT NULL,
  author VARCHAR (50) NOT NULL,
  publisher VARCHAR (50) NOT NULL,
  isbn CHAR (25) NOT NULL,
  img VARCHAR (50) NOT NULL,
  library_id INT NOT NULL,
  area_id INT NOT NULL,
  category_id INT NOT NULL
);

CREATE TABLE category (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR (20) NOT NULL
);

CREATE TABLE area (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR (15) NOT NULL
);

CREATE TABLE library (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR (20) NOT NULL
);

ALTER TABLE
  rental
ADD
  CONSTRAINT book_id foreign key(book_id) references book(id);

ALTER TABLE
  rental
ADD
  CONSTRAINT customer_id foreign key(customer_id) references customer(id);

ALTER TABLE
  book
ADD
  CONSTRAINT library_id foreign key(library_id) references library(id);

ALTER TABLE
  book
ADD
  CONSTRAINT area_id foreign key(area_id) references area(id);

ALTER TABLE
  book
ADD
  CONSTRAINT category_id foreign key(category_id) references category(id);