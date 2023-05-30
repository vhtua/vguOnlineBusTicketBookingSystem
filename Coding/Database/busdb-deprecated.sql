DROP SCHEMA busdb;

CREATE DATABASE busdb;

USE busdb;

CREATE TABLE role (
  rid INT,
  rname VARCHAR(50),
  PRIMARY KEY(rid)
);

CREATE TABLE user (
  id INT AUTO_INCREMENT,
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  rid INT,
  PRIMARY KEY(id),
  FOREIGN KEY(rid) REFERENCES role(rid)
);

CREATE TABLE ticket (
  seat_id INT,
  route VARCHAR(50),
  time DATE,
  price FLOAT,
  PRIMARY KEY(seat_id)
);

CREATE TABLE auth (
  auth_id INT AUTO_INCREMENT,
  email VARCHAR(50),
  password VARCHAR(50),
  PRIMARY KEY(auth_id)
);

CREATE TABLE bus (
  bus_id INT AUTO_INCREMENT,
  seat_num INT,
  PRIMARY KEY(bus_id)
);
