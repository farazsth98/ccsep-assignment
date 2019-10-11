<?php
require_once("db.php");
require_once("includes/check_session.php");

include("includes/handle_add_item.php");
?>

<!DOCTYPE html>
<html>
<head>

	<?php include_once("includes/includes.php"); ?>

</head>
<body>
	<?php include('includes/header.php'); ?>

	<!-- Simple form to let a user put up an item for sale -->
	<div class="container">
		<hr>
		<form class="form-signin" action="" method="POST">
			<div class="form-label-group">
				<input type="text" id="itemName" class="form-control" placeholder="Item name" name="itemName" required autofocus>
				<label for="itemName">Item name</label>
			</div>

			<div class="form-label-group">
				<input type="text" id="description" class="form-control" placeholder="Description" name="description" required>
				<label for="description">Item description</label>
			</div>

			<div class="form-label-group">
				<input type="number" id="price" class="form-control" placeholder="Price" name="price" required>
				<label for="price">Price</label>
			</div>

			<button class="btn btn-lg btn-primary btn-block text-uppercase" name="add" value="addItem" type="submit">Add Item</button>
		</form>
	</div>
</body>
</html>
