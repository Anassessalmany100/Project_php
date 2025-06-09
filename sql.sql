create database library;
use library;
create table users(
	id int AUTO_INCREMENT primary key,
    name varchar(40),
    username varchar(40),
    email varchar(40),
    password varchar(40) 
);