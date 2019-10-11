<?php
	include_once("/db.php");

	if (isset($_POST["add"]))
	{
		// Get the max id
		$stmt = mysqli_prepare($db,"SELECT MAX(id) FROM Items");
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $item_id);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);

		// If there were no items to begin with, start at 1
		// Else add 1 to get the next item ID
		if (empty($item_id))
			$item_id = 1;
		else
			$item_id += 1;

		$user_id = $_SESSION["id"];
		$name = urldecode($_POST["itemName"]);
		$description = urldecode($_POST["description"]);
		$price = $_POST["price"];

		// Insert this new user as a row in the Users table
		$stmt = mysqli_prepare($db, "INSERT INTO Items VALUES (?, ?, ?, ?, ?);");
		mysqli_stmt_bind_param($stmt, "iissi", $item_id, $user_id, $name, $description, $price);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
?>