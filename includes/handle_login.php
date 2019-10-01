<?php
	require_once("db.php");

  session_start();

	if(isset($_SESSION["id"]))
	{
		header("Location: /index.php");
	}

	$error = "";

	if (isset($_POST["submit"]))
	{
		if (empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Invalid username or password";
		}
		else
		{
			$username = urldecode($_POST["username"]);
			$password = urldecode($_POST["password"]);

			// PreparedStatements used so no SQL injection here
			$stmt = mysqli_prepare($db,"SELECT id, username, password FROM Users WHERE username=?");
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);

			// Fetch the results
			mysqli_stmt_bind_result($stmt, $db_id, $db_username, $db_password);
			mysqli_stmt_fetch($stmt);

			// Get the number of rows returned
			mysqli_stmt_store_result($stmt);
			$num_rows = mysqli_stmt_num_rows($stmt);

			// Make sure the username and password returned by the db aren't empty
			if (empty($db_username) || empty($db_password))
			{
				$error = "Invalid username or password";
			}
			else
			{
				// Compare passwords and create session if successful
				if (md5($password) == $db_password)
				{
					$_SESSION["id"] = $db_id;
					header("Location: /index.php");
				}
				else
				{
					$error = "Invalid username or password";
				}
			}
		}
	}
?>
