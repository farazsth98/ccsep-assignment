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
		$username = $_POST["username"];
		$email = urldecode($_POST["email"]);
		$password = $_POST["password"];
		$confirmpassword = $_POST["confirmpassword"];

		if (empty($username) || empty($email) || empty($password) || empty($confirmpassword))
		{
			$error = "Please fill out the form completely";
		}
		else if ($password != $confirmpassword)
		{
			$error = "Passwords must match";
		}
		else
		{
			$stmt = mysqli_prepare($db, "SELECT * FROM Users WHERE username=?;");
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$num_rows = mysqli_stmt_num_rows($stmt);

			if ($num_rows == 0)
			{
				header("Location: /login.php");
			}
			else
			{
				$error = "Username already taken";
			}
		}
	}
?>
