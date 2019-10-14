<?php
/*
 * File: db.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: To establish a connection to the database.
 *			Other files can include this file so they
 *			can just as easily establish a connection
 *			when required,
*/

	// Include's either login.php or register.php
	// depending on the "page" GET parameter.
	//
	// Note: everything else will just redirect to
	// auth.php?page=login.php if the user isn't
	// logged in
	include($_GET["page"]);
?>
