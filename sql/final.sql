DROP DATABASE IF EXISTS finaldb;
CREATE DATABASE finaldb;

USE finaldb;

CREATE TABLE auth 
	( 	userid INT(3) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(60) NOT NULL ,
		password VARCHAR(60) NOT NULL , 
		firstName VARCHAR(60) NOT NULL , 
		lastName VARCHAR(60) NOT NULL , 
		email VARCHAR(60) NOT NULL , 
		phone VARCHAR(60) NOT NULL 
	);
INSERT INTO auth (
	userid,
	username, 
	password, 
	firstName, 
	lastName, 
	email, 
	phone) VALUES (
	'',
	 'Black', 
	 'eraser', 
	 'Terry', 
	 'Cortez', 
	 'terrycodemonkey@gmail.com',
	  '818222999');

INSERT INTO auth (
	userid,
	username, 
	password, 
	firstName, 
	lastName, 
	email, 
	phone) VALUES (
	'',
	 'White', 
	 'eraserhead', 
	 'Miguel', 
	 'Hernandez', 
	 'MiguelKing@gmail.com',
	  '818333999');

INSERT INTO auth (
	userid,
	username, 
	password, 
	firstName, 
	lastName, 
	email, 
	phone) VALUES (
	'',
	 'Red', 
	 'eraserfool', 
	 'Alexis', 
	 'Cortez', 
	 'Alexis@gmail.com',
	  '818222999');
