<?php
	session_start();
	if (!isset($_SESSION['id']))
	{
	  header("Location: /auth.php?page=login.php");
	  die();
	}
?>
