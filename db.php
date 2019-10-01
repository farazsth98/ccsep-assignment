<?php
/*
 * File: db.php
 * File Created: Sunday, 8th September 2019 10:32:36 pm
 * Author: Jonathon Winter
 * -----
 * Last Modified: Sunday, 8th September 2019 10:43:55 pm
 * Modified By: Jonathon Winter
 * -----
 * Purpose:
*/

// Set constants for the database connection
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'student');
define('DB_PASSWORD', 'CCSEP2019');
define('DB_DATABASE', 'assignment');

// Connect to the database
$db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
