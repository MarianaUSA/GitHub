CREATE DATABASE frigo_DB;
CREATE TABLE customers(
	id INT PRIMARY KEY AUTO_INCREMENT,
	firstname VARCHAR (50),
	surname VARCHAR (50)
);
INSERT INTO customer (firstname, surname) 
VALUES
('Stefan', 'Dimitrov'),
('Nikolaj', 'Gavazov'),
('Vesela', 'Blagoeva'),
('Marin', 'Dimitrov'),
('Petko', 'Petkov'),
('Gergana', 'Lecheva'),
('Georgi', 'Vasilev'),
('Ana', 'Shopova'),
('Stoyan', 'Ivanov'),
('Valentin', 'Nikolov');

CREATE TABLE email(
	id INT PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR (100),
	customer_id INT,
		FOREIGN KEY (customer_id),
		REFERENCES customer (id)
);
INSERT INTO email (id, email, customer_id)
VALUES
(1, 'StefDim134@abv.bg', 1),
(2, 'GlassN@aol.com', 2),
(3, 'BlagaVes@hotmail.com', 3),
(4, 'martinDD@gmail.com', 4),
(5, 'ppetkov359@yahoo.com', 5),
(6, 'gpp86@gmail.com', 6),
(7, 'goro83@abv.bg', 7),
(8, 'anshop@usf.edu', 8),
(9, 'Stoyan.Ivanov@hotmail.com', 9),
(10, 'valich@abv.bg', 10);