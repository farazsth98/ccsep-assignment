<?php
	require_once("db.php");

	if (isset($_POST["submit"]) && isset($_POST["balance"]))
	{
		$balance = $_POST["balance"];
		$id = $_SESSION["id"];

		// Add the balance
		$stmt = "UPDATE Users SET balance=balance + $balance WHERE id=$id;";
		mysqli_query($db, $stmt);

		header("Location: /account.php");
	}
?>
