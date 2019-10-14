<?php
/*
 * File: handle_login.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page handles POST requests made to the
 *			login.php page. Specifically, it will create
 *	1		a session for a user provided they provide
 *			valid details for a successful login.
*/

	require_once("db.php");

  	session_start();

  	// If a session is already established, redirect to the index page
	if(isset($_SESSION["id"]))
	{
		header("Location: /index.php");
	}

	$error = "";

	if (isset($_POST["submit"]))
	{
		// Sanity checks
		if (empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Invalid username or password.";
		}
		else
		{
			$username = urldecode($_POST["username"]);
			$password = urldecode($_POST["password"]);

			// Query the database for this user
			$stmt = mysqli_prepare($db,"SELECT id, username, password, locked FROM Users WHERE username=?");
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $db_id, $db_username, $db_password, $db_locked);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_store_result($stmt);

			// Make sure the username and password returned by the db aren't empty
			if (empty($db_username) || empty($db_password))
			{
				$error = "Invalid username or password.";
			}
			else
			{
				// Hash the password and compare it to the stored hash in the database
				if (md5($password) == $db_password)
				{
					// Make sure the account isn't locked
				  	if ($db_locked == "false")
					{
						$_SESSION["id"] = $db_id;
						header("Location: /index.php");
					}
					else
					{
						$error = "Account is locked. Please contact an administrator.";
					}
				}
				else
				{
					$error = "Invalid username or password.";
				}
			}
		}
	}
?>
