<?php
/*
 * File: check_session.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page is included on almost every
 *			other page. It checks to see whether
 *			the user has a session already established.
 *			If they don't, they are redirected to the
 *			login page.
*/

	session_start();

	// If a session doesn't exist, auto-redirect to the login page
	if (!isset($_SESSION['id']))
	{
	  header("Location: /auth.php?page=login.php");
	  die();
	}
?>
