<?php
/*
 * File: handle_admin.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page handles POST requests made to the
 *			admin.php page. The POST requests can be one of
 *			the following three: to lock an account, to
 *			unlock an account, or to delete an account.
*/

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
