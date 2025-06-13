create database library;
use library;
create table users(
	id int AUTO_INCREMENT primary key,
    name varchar(40),
    username varchar(40),
    email varchar(40),
    password varchar(40) 
);



CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);