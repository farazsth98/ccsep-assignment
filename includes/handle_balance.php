<?php
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
