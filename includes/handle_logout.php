<?php
/*
 * File: handle_logout.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This essentially handles logging out.
 *			This page is included by logout.php.
*/

	session_start();
	unset($_SESSION['id']);
	session_destroy();

	header("Location: /auth.php?page=login.php");
?>
