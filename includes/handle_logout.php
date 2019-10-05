<?php
	session_start();
	unset($_SESSION['id']);
	session_destroy();

	header("Location: /auth.php?page=login.php");
?>
