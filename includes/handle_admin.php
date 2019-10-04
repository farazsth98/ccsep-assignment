<?php
	// If a post request was made to lock the account
	if (isset($_POST["lock"]))
	{
		$id = $_POST["id"];

		// Update that user's status to unlocked
		$stmt = "UPDATE Users SET locked='true' WHERE id=$id;";
		mysqli_query($db, $stmt);

		header("Location: /admin.php");
	}
	// If a post request was made to unlock the account
	else if (isset($_POST["unlock"]))
	{
		$id = $_POST["id"];

		// Update that user's status to unlocked
		$stmt = "UPDATE Users SET locked='false' WHERE id=$id;";
		mysqli_query($db, $stmt);

		header("Location: /admin.php");
	}

	// If a post request was made to delete the account
	else if (isset($_POST["delete"]))
	{
		$id = $_POST["id"];

		// Delete the account
		$stmt = "DELETE FROM Users WHERE id=$id;";
		mysqli_query($db, $stmt);

		header("Location: /admin.php");
	}
?>
