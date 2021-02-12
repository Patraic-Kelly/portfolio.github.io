# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
# Script to create Portfolio database
# Name:Patraic Kelly
# Date:1/22/21
#
# Log: Create Database
#
#
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

DROP DATABASE IF EXISTS pkptfolio;

CREATE DATABASE pkptfolio;

USE pkptfolio;

CREATE TABLE IF NOT EXISTS mods
(
	modID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	modName	VARCHAR(255) NOT NULL,
	modEmail VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS users
(
	userID INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	userName VARCHAR(255) NOT NULL,
	userLast VARCHAR(255) NOT NULL,
	userEmail VARCHAR(255) NOT NULL UNIQUE,
	userMessage VARCHAR(500) NOT NULL,
	submitDate DATETIME NOT NULL,
	modID int NOT NULL,
	FOREIGN KEY (modID) REFERENCES mods(modID)
);

# Insert test database
INSERT INTO mods
	(modName, modEmail)
VALUES
	('BlackDragon18', 'BlackDragon18@blabla.com'),
	('AdamSandler', 'adamsandler21@yahoo.com'),
	('lolbags', 'lolbags@blabla.com'),
	('HarryKim', 'ensign4ever@yahoo.com'),
	('somebody', 'somebody@gmail.com'),
	('emp6','email6@email.com'),
	('emp7','email7@email.com'),
	('emp8','email8@email.com'),
	('emp9','email9@email.com'),
	('emp10','email10@email.com'),
	('emp11','email11@email.com'),
	('emp12','email12@email.com'),
	('emp13','email13@email.com'),
	('emp14','email14@email.com'),
	('emp15','email15@email.com'),
	('emp16','email16@email.com'),
	('emp17','email17@email.com'),
	('emp18','email18@email.com'),
	('emp19','email19@email.com'),
	('emp20','email20@email.com');
	
INSERT INTO users
	(userName, userLast, userEmail, userMessage, submitDate, modID)
VALUES
	('Aa','Ab','a@a.com','blablablabla',NOW(), 1),
	('Ba','Bb','b@b.com','blablablabla',NOW(), 1),
	('Ca','Cb','c@c.com','blablablabla',NOW(), 1),
	('Da','Db','d@d.com','blablablabla',NOW(), 1),
	('Ea','Eb','e@e.com','blablablabla',NOW(), 1),
	('Fa','Fb','f@f.com','blablablabla',NOW(), 1),
	('Ga','Gb','g@g.com','blablablabla',NOW(), 1),
	('Ha','Hb','h@h.com','blablablabla',NOW(), 1),
	('Ia','Ib','i@i.com','blablablabla',NOW(), 1),
	('Ja','Jb','j@j.com','blablablabla',NOW(), 1),
	('Ka','Kb','k@k.com','blablablabla',NOW(), 1),
	('La','Lb','l@l.com','blablablabla',NOW(), 1),
	('Ma','Mb','m@m.com','blablablabla',NOW(), 1),
	('Na','Nb','o@o.com','blablablabla',NOW(), 1),
	('Oa','Ob','p@p.com','blablablabla',NOW(), 1),
	('Pa','Pb','q@q.com','blablablabla',NOW(), 1),
	('Qa','Qb','r@r.com','blablablabla',NOW(), 1),
	('Ra','Rb','s@s.com','blablablabla',NOW(), 1),
	('Sa','Sb','t@t.com','blablablabla',NOW(), 1),
	('Ta','Tb','u@u.com','blablablabla',NOW(), 1);

# application user 
GRANT SELECT, INSERT, UPDATE, DELETE
ON pkptfolio.*
to pk_admin
IDENTIFIED BY 'Pa$$w0rd';