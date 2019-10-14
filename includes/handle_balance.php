<?php
/*
 * File: handle_balance.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page handles POST requests made to
 *			account.php, specifically when the user
 *			chooses to add more money to their account.
*/

	require_once("db.php");

	// Check if a POST request was made to increase the balance
	if (isset($_POST["submit"]) && isset($_POST["balance"]))
	{
		$balance = $_POST["balance"];
		$id = $_SESSION["id"];

		// Add the balance
		$stmt = mysqli_prepare($db, "UPDATE Users SET balance = balance + ? WHERE id=?;");
		mysqli_stmt_bind_param($stmt, "ii", $balance, $id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("Location: /account.php");
	}
?>
