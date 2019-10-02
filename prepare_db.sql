USE assignment;

DROP TABLE IF EXISTS Users;

CREATE TABLE IF NOT EXISTS Users (
	id INT(6) UNSIGNED PRIMARY KEY,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(60) NOT NULL,
	email VARCHAR(50) NOT NULL,
	locked VARCHAR(5) NOT NULL
);

INSERT INTO Users VALUES (1, 'admin', 'a2ce9ec5c4696a657e469b177826df2f', 'admin@assignment.com', 'false');
INSERT INTO Users VALUES (2, 'locked_user', '5f4dcc3b5aa765d61d8327deb882cf99', 'locked@user.com', 'true');
