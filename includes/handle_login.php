<?php
	require_once("db.php");

  session_start();

	if(isset($_SESSION["logged_in"]))
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
			$username = $_POST["username"];
			$password = $_POST["password"];

			$stmt = "SELECT * FROM Users WHERE username='$username';";

			$rows = mysqli_query($db, $stmt);
			$num_rows = mysqli_num_rows($rows);

			if (!$rows)
			{
				$error = "Invalid username or password";
			}
			else
			{
				if ($num_rows == 1)
				{
					$row = mysqli_fetch_assoc($rows);

					if (md5($password) == $row['password'])
					{
						$_SESSION["id"] = $row["id"];
						$_SESSION["logged_in"] = "true";
						header("Location: /index.php");
					}
					else
					{
						$error = "Invalid username or password";
					}
				}
				else
				{
					$error = "Invalid username or password";
				}
			}
		}
	}
?>
