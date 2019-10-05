<?php
require_once("db.php");
require_once("includes/check_session.php")
?>

<!DOCTYPE html>
<html>
<head>

	<?php include_once("includes/includes.php"); ?>

</head>
<body>
	<?php
		session_start();
    include_once('includes/header.php');

		// Check for page parameter. admin.php is exclusive
		if (isset($_GET["page"]) && $_GET["page"] != "admin.php")
		{
			if ($_GET["page"] != "admin.php")
				include($_GET["page"]);
		}
		else
		{
			echo '
			<div class="container">
				<h1>
					Welcome to Radically Sophisticated Application (RSA)!
				</h1>
				<hr>

				<h3>In our store, you may buy and sell to your hearts content!</h3>
				<img src="/images/girl_coin.jpg" width="450" height="700"></img>
			</div>
			';
		}
	?>
</body>
</html>
