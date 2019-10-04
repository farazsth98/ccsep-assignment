<?php
	require_once("db.php");

  session_start();

	$error = "";

	if (isset($_SESSION["id"]))
	{
		header("Location: /index.php");
	}

	if (isset($_POST["submit"]))
	{
		$username = urldecode($_POST["username"]);
		$email = urldecode($_POST["email"]);
		$password = md5($_POST["password"]);
		$confirmpassword = md5($_POST["confirmpassword"]);

		if (empty($username) || empty($email) || empty($password) || empty($confirmpassword))
		{
			$error = "Please fill out the form completely.";
		}
		else if ($password != $confirmpassword)
		{
			$error = "Passwords must match.";
		}
		else
		{
			// Ensure the username isn't a duplicate
			$stmt = mysqli_prepare($db, "SELECT * FROM Users WHERE username=?;");
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$num_rows = mysqli_stmt_num_rows($stmt);
			mysqli_stmt_close($stmt);

			if ($num_rows == 0)
			{
				// Ensure the email isn't a duplicate
				$stmt = mysqli_prepare($db, "SELECT * FROM Users WHERE email=?;");
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);

				$num_rows = mysqli_stmt_num_rows($stmt);
				mysqli_stmt_close($stmt);

				if ($num_rows == 0)
				{
					// Get the max id
					$stmt = mysqli_prepare($db,"SELECT MAX(id) FROM Users");
					mysqli_stmt_bind_param($stmt, "s", $username);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt, $db_id);
					mysqli_stmt_fetch($stmt);
					mysqli_stmt_close($stmt);

					// Add one to it to get a new ID
					$db_id += 1;

					// Insert this new user as a row in the Users table
					$stmt = mysqli_prepare($db, "INSERT INTO Users (id, username, password, email, locked) VALUES (?, ?, ?, ?, 'false')");
					mysqli_stmt_bind_param($stmt, "isss", $db_id, $username, $password, $email);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);

					header("Location: /login.php");
				}
				else
				{
					$error = "Email address already in use.";
				}
			}
			else
			{
				$error = "Username already taken.";
			}
		}
	}
?>
