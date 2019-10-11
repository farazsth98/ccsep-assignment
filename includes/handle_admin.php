<?php
	// If a post request was made to lock the account
	if (isset($_POST["lock"]))
	{
		$id = $_POST["id"];

		// Assignment spec says you can only lock regular users
		if ($id != 1)
		{
			// Update that user's status to unlocked
			$stmt = "UPDATE Users SET locked='true' WHERE id=$id;";
			mysqli_query($db, $stmt);

			header("Location: /admin.php");
		}
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

		// Do not allow admins to delete the admin account
		if ($id != 1)
		{
			// Delete the account
			$stmt = "DELETE FROM Users WHERE id=$id;";
			mysqli_query($db, $stmt);
	
			header("Location: /admin.php");
		}
	}
?>
