<?php
	session_start();

	// If a session doesn't exist, auto-redirect to the login page
	if (!isset($_SESSION['id']))
	{
	  header("Location: /auth.php?page=login.php");
	  die();
	}
?>
