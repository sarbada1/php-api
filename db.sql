-- Active: 1704374280313@@127.0.0.1@3306@bca3semproject
CREATE DATABASE bca3semproject;


use bca3semproject;
create table students(
id int PRIMARY KEY AUTO_INCREMENT,
name varchar(100),
email varchar(100) UNIQUE,
address varchar(100)
);

INSERT into students(name,email,address) values('John Doe','john.doe@gmail.com','123 Street Name, City');
INSERT into students(name,email,address) values('Sita','sita@gmail.com','bkt');
INSERT into students(name,email,address) values('Ram','ram@gmail.com','ktm');
INSERT into students(name,email,address) values('Shyam','shyam@gmail.com','pokhara');
INSERT into students(name,email,address) values('Sophia','sophia@gmail.com','us');

