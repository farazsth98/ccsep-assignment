<?php
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
		if (empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Invalid username or password.";
		}
		else
		{
			$username = urldecode($_POST["username"]);
			$password = urldecode($_POST["password"]);

			// Query the database
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
				// Compare passwords
				if (md5($password) == $db_password)
				{
					// Check if the account is locked
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
