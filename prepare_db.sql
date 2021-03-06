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

INSERT INTO Users VALUES (1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin@assignment.com', 'false', 0.0);
INSERT INTO Users VALUES (2, 'locked_user', '5f4dcc3b5aa765d61d8327deb882cf99', 'locked@user.com', 'true', 0.0);
INSERT INTO Users VALUES(3, 'normal_user', '5f4dcc3b5aa765d61d8327deb882cf99', 'normal@user.com', 'false', 0.0);
INSERT INTO Users VALUES(4, 'delete_test_user', '5f4dcc3b5aa765d61d8327deb882cf99', 'delete@test.com', 'false', 0.0);

INSERT INTO Items VALUES (1, 3, 'Orange', 'Very sweet', 9999.0);
INSERT INTO Items VALUES(2, 3, 'My Grandma\'s knitting tools', 'testing some stuff', 10000.0);
