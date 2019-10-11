<?php
	require_once("db.php");

	// When admin chooses to delete an item
	if (isset($_POST["delete"]))
	{
		$item = $_POST["id"];

		$stmt = mysqli_prepare($db, "DELETE FROM Items WHERE id=?;");
		mysqli_stmt_bind_param($stmt, "i", $item);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	// When someone chooses to buy an item
	if (isset($_POST["buy"]))
	{
		$item = $_POST["id"];
		$owner_id = $_POST["user_id"];
		$price = $_POST["price"];
		$buyer_id = $_SESSION["id"];

		// Ensure the buyer isn't the same as the owner
		if ($owner_id == $buyer_id)
			$error = "You cannot buy your own items.";
		else
		{
			// First get the current user's balance
			$stmt = "SELECT balance FROM Users WHERE id=$user_id;";
			$stmt = mysqli_prepare($db,"SELECT balance FROM Users WHERE id=?;");
			mysqli_stmt_bind_param($stmt, "i", $buyer_id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $current_balance);
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);

			// Ensure the buyer has enough money
			if ($current_balance < $price)
				$error = "You do not have enough funds.";
			else
			{
				// Subtract the money from the buyer's account
				$stmt = mysqli_prepare($db, "UPDATE Users SET balance = balance - ? WHERE id=?;");
				mysqli_stmt_bind_param($stmt, "ii", $price, $buyer_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);

				// Add the money to the seller's account
				$stmt = mysqli_prepare($db, "UPDATE Users SET balance = balance + ? WHERE id=?;");
				mysqli_stmt_bind_param($stmt, "ii", $price, $owner_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);

				// Delete the item to emulate "buying"
				$stmt = mysqli_prepare($db, "DELETE FROM Items WHERE id=?;");
				mysqli_stmt_bind_param($stmt, "i", $item);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_close($stmt);
			}
		}
	}
?>