DROP SCHEMA busdb;

CREATE DATABASE busdb;

USE busdb;

CREATE TABLE bus (
  bus_id INT AUTO_INCREMENT,
  seat_num INT,
  PRIMARY KEY(bus_id)
);

CREATE TABLE ticket (
  ticket_id INT AUTO_INCREMENT,
  route VARCHAR(100),
  time DATE,
  price FLOAT,
  PRIMARY KEY(ticket_id)
);

CREATE TABLE student (
  student_id VARCHAR(20),
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  email VARCHAR(100),
  PRIMARY KEY(student_id)
);

CREATE TABLE admin (
  admin_id VARCHAR(20),
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  email VARCHAR(100),
  PRIMARY KEY(admin_id)
);

CREATE TABLE driver (
  driver_id VARCHAR(20),
  first_name VARCHAR(50),
  last_name VARCHAR(50),
  email VARCHAR(100),
  PRIMARY KEY(driver_id)
);
