<?php
/*
 * File: handle_add_item.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page handles the POST request that is
 *			made to the add_item.php file whenever a user
 *			chooses to put a new item up for sale.
*/

	include_once("/db.php");

	if (isset($_POST["add"]))
	{
		// Get the highest item ID currently in the database
		$stmt = mysqli_prepare($db,"SELECT MAX(id) FROM Items");
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $item_id);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);

		// If there were no items to begin with, start at 1
		// Else add 1 to get the next highest item ID
		if (empty($item_id))
			$item_id = 1;
		else
			$item_id += 1;

		$user_id = $_SESSION["id"]; // id of the user that is putting the item up for sale
		$name = urldecode($_POST["itemName"]); // Name of the item
		$description = urldecode($_POST["description"]); // Description for the item
		$price = $_POST["price"]; // Price of the item

		// Insert this new item as a row in the Items table
		$stmt = mysqli_prepare($db, "INSERT INTO Items VALUES (?, ?, ?, ?, ?);");
		mysqli_stmt_bind_param($stmt, "iissi", $item_id, $user_id, $name, $description, $price);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
?>