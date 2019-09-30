USE assignment;

CREATE TABLE IF NOT EXISTS Users (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(60) NOT NULL,
	email VARCHAR(50) NOT NULL
);

INSERT INTO Users VALUES (0, 'admin', 'a2ce9ec5c4696a657e469b177826df2f', 'admin@assignment.com');
