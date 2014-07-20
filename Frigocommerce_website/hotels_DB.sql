CREATE DATABASE hotels_DB;
USE hotels_DB;
CREATE TABLE hotel(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR (100),
	address TEXT (300),
	phone VARCHAR (30),
	category TINYINT (10),
	picture VARCHAR (50)
);
INSERT INTO hotel (name, address, phone, category, picture) 
VALUES
('Exotic', 'the entrance of Markovo', '0888716350', '5', 'exotic.jpg'),
('Rusalka', 'Plovdiv, 182, Dunav blvd.', '0886716370', '4', 'rusalka.jpg'),
('Bulgaria', 'Plovdiv, 24, Centralen blvd.', '0888776366', '4', 'bulgaria.jpg'),
('ECO', 'Plovdiv, 32, Djumayata str.', '0866516344', '5', 'eco.jpg');
CREATE TABLE extra_hotel(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR (100)
);
INSERT INTO extra_hotel (name) 
VALUES
('spa'),
('pool'),
('fitness');
CREATE TABLE relation_extra_hotel(
	id INT PRIMARY KEY AUTO_INCREMENT,
	hotel_id INT (10),
	extra_hotel_id INT (10),
		FOREIGN KEY (hotel_id)
		REFERENCES hotel (id),
		FOREIGN KEY (extra_hotel_id)
		REFERENCES extra_hotel (id)
);
INSERT INTO relation_extra_hotel (hotel_id, extra_hotel_id) 
VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 1),
(1, 2),
(4, 2);
CREATE TABLE room(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR (100),
	capacity TEXT (300),
	picture VARCHAR (50),
	price decimal (15),
	hotel_id INT (10)
		FOREIGN KEY (hotel_id)
		REFERENCES hotel (id),
);
INSERT INTO room (name, capacity, picture, price, hotel_id) 
VALUES
('double delux', '2', 'delux1.jpg', '98.00', 1),
('single', '1', 'singl1e.jpg', '75.00', 1),
('double delux', '2', 'delux4.jpg', '108.00', 4),
('single', '1', 'delux.jpg', '98.00', 1),
('double delux', '2', 'single4.jpg', '85.00', 4),
('double', '2', 'double2.jpg', '78.00', 2),
('double', '2', 'double3.jpg', '88.00', 3),
('apartment', '4', 'apartment2.jpg', '99.00', 2),
('single', '1', 'single2.jpg', '55.00', 2),
('double delux', '2', 'delux3.jpg', '89.00', 3);
CREATE TABLE extra_room(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR (100)
);
INSERT INTO extra_room (name) 
VALUES
('jacuzi'),
('hot tube'),
('free movies');
CREATE TABLE relation_extra_room(
	id INT PRIMARY KEY AUTO_INCREMENT,
	room_id INT (10),
	extra_room_id INT (10),
		FOREIGN KEY (room_id)
		REFERENCES room (id),
		FOREIGN KEY (extra_room_id)
		REFERENCES extra_room (id)
);
INSERT INTO relation_extra_room (room_id, extra_room_id) 
VALUES
(1, 1),
(2, 3),
(3, 2),
(8, 1),
(5, 2),
(4, 2),
(9, 2),
(2, 2);
CREATE TABLE guest(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR (100),
	address TEXT (300),
	phone VARCHAR (50),
	email VARCHAR (100),
	passport VARCHAR (30),
	nationality VARCHAR (50)
);
INSERT INTO guest (name, address, phone, email, passport, nationality) 
VALUES
INSERT INTO guest (name, address, phone, email, passport, nationality) 
VALUES
('Tanya Petkova', 'Markovo, 2 Vazov Str.', '0882516750', 'tpetkova@abv.bg', '0099334477', 'bulgarian'),
('Yana Vasileva', 'Plovdiv, 22 Dunav Blvd.', '0888544733', 'browneyedgirl@gmail.com', '009933888', 'bulgarian'),
('Petar Petrov', 'Varna, 18 Parkova Str.', '08827799', 'ppetriv359@yahoo.com', '3399334477', 'bulgarian'),
('Scott Cohen', 'New York,134 Pemberton Str.', '4582516750', 'scohen@yale.edu', '06799334477', 'american'),
('Guergana Cohen', 'New York,134 Pemberton Str.', '552516750', 'gpp84@gmail.com', '06997799334477', 'american');
CREATE TABLE relation_reservation(
	id INT PRIMARY KEY AUTO_INCREMENT,
	guest_id INT (10),
	room_id INT (10),
	date_reserv DATETIME,
		FOREIGN KEY (guest_id)
		REFERENCES guest (id),
		FOREIGN KEY (room_id)
		REFERENCES room (id)
);
INSERT INTO relation_reservation (guest_id, room_id, date_reserv) 
VALUES
(1, 1, '2014-05-12 00:00:00'),
(1, 4, '2011-08-25 00:00:00'),
(1, 10, '2012-06-15 00:00:00'),
(1, 5, '2013-04-11 00:00:00'),
(1, 7, '2010-11-11 00:00:00'),
(1, 9, '2010-12-24 00:00:00'),
(2, 3, '2009-07-14 00:00:00'),
(2, 2, '2014-12-11 00:00:00'),
(3, 6, '2010-03-05 00:00:00'),
(3, 8, '2010-09-24 00:00:00'),
(4, 2, '2014-01-05 00:00:00'),
(4, 1, '2011-06-17 00:00:00'),
(2, 7, '2013-10-26 00:00:00'),
(2, 6, '2014-02-08 00:00:00'),
(3, 2, '2009-10-13 00:00:00'),
(5, 1, '2012-09-04 00:00:00'),
(5, 2, '2010-06-19 00:00:00'),
(4, 4, '2011-10-08 00:00:00'),
(2, 9, '2012-07-04 00:00:00'),
(2, 8, '2010-10-18 00:00:00');
	