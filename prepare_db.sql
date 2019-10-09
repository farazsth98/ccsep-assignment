USE assignment;

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Items;

CREATE TABLE IF NOT EXISTS Users (
	id INT(6) UNSIGNED PRIMARY KEY,
	username VARCHAR(60) NOT NULL,
	password VARCHAR(60) NOT NULL,
	email VARCHAR(50) NOT NULL,
	locked VARCHAR(5) NOT NULL,
	balance FLOAT(6) UNSIGNED NOT NULL
);

CREATE TABLE IF NOT EXISTS Items (
	id INT(6) UNSIGNED PRIMARY KEY,
	user_id INT(6) UNSIGNED NOT NULL,
	name VARCHAR(60) NOT NULL,
	description VARCHAR(200) NOT NULL,
	price FLOAT(6) UNSIGNED NOT NULL
);

INSERT INTO Users VALUES (1, 'admin', 'a2ce9ec5c4696a657e469b177826df2f', 'admin@assignment.com', 'false', 0.0);
INSERT INTO Users VALUES (2, 'locked_user', '5f4dcc3b5aa765d61d8327deb882cf99', 'locked@user.com', 'true', 0.0);

INSERT INTO Items VALUES (1, 1, 'test item', 'Just testing things out here', 9999.0);
