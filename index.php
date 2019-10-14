<?php
/*
 * File: index.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: The index page. Nothing much to say.
*/

require_once("db.php");
require_once("includes/check_session.php")
?>

<!DOCTYPE html>
<html>
<head>

	<?php include_once("includes/includes.php"); ?>

</head>
<body>
	<?php include('includes/header.php'); ?>

	<div class="container">
		<h1>
			Welcome to Radically Sophisticated Application (RSA)!
		</h1>
		<hr>

		<h3>In our store, you may buy and sell to your hearts content!</h3>
		<img src="/images/girl_coin.jpg" width="450" height="700"></img>
	</div>
</body>
</html>
