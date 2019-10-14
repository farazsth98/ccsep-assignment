<?php
/*
 * File: store.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: The store page. It provides a list
 *			of items for the user to view. The
 *			user can also search by item name and
 *			by seller name.
*/

require_once("db.php");
require_once("includes/check_session.php");

include("includes/handle_store.php");
?>

<!DOCTYPE html>
<html>
	<head>

		<?php
			include_once("includes/includes.php");
		?>

	</head>
	<body>
	   	<?php
	      include_once('includes/header.php');
	   	?>

	   <div class="container">
			<!-- Search for items by name -->
			<h1>Search for items by name:</h1>
			<form method="GET" action="">
				<div class="input-group mt-2 w-25">
					<input type="text" class="form-control" placeholder="Item name" name="itemName" >
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
					</div>
				</div>
			</form>

			<!-- Search for items by seller -->
			<h1>Search for items by seller:</h1>
			<form method="GET" action="">
				<div class="input-group mt-2 w-25">
					<input type="text" class="form-control" placeholder="Seller name" name="sellerName" >
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
					</div>
				</div>
			</form>

			<hr>

			<?php
				// For when a user tries to purchase an item without having enough money,
				// or for when they try to purchase one of their own items.
				echo "<b>$error</b>";

				if (isset($_GET["itemName"]))
					echo '<h2> Searching for item ' . $_GET["itemName"] . ':</h2>';
				else if (isset($_GET["sellerName"]))
					echo '<h2> Searching for seller ' . $_GET["sellerName"] . ':</h2>';
				else
					echo '<h2>Items:</h2>';
			?>
			<!-- Table of items -->
			<table class="table">
				<thead>
					<th>Seller</th>
					<th>Item name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Purchase</th>
					<?php
						if ($_SESSION["id"] == 1)
							echo "<th>Admin</th>";
					?>
				</thead>
				<tbody>
					<?php
						// Check if a GET request was made to search for an item or a seller,
						// and query the database accordingly
						if(isset($_GET["itemName"]))
						{
							$name = $_GET["itemName"];
							$sql = "SELECT user_id, name, description, price, id FROM Items WHERE name LIKE '%$name%'";
						}
						else if (isset($_GET["sellerName"]))
						{
							$name = $_GET["sellerName"];
							$sql = "SELECT user_id, name, description, price, id FROM Items WHERE user_id = 
								(SELECT id FROM Users WHERE username LIKE '%$name%')";
						}
						else
							$sql = "SELECT user_id, name, description, price, id FROM Items";

						$result = mysqli_query($db, $sql);
						echo mysqli_error($db);

						// Print out each item from the query above
						while($row = mysqli_fetch_array($result))
						{
							// Get the owner of each item using the user_id
							$sql = "SELECT username FROM Users WHERE id=$row[0]";
							$owner = mysqli_fetch_array(mysqli_query($db, $sql))[0];

							echo "<tr>";
							echo "<td>$owner</td>";
							echo "<td>$row[1]</td>";
							echo "<td>$row[2]</td>";
							echo "<td>$row[3]</td>";
							echo "<td>";
								echo'<form action="" method="post">';
									echo '<input type="hidden" name="id" value="'.$row[4].'"/>';
									echo '<input type="hidden" name="user_id" value="'.$row[0].'"/>';
									echo '<input type="hidden" name="price" value="'.$row[3].'"/>';
							 		echo '<button name="buy" type="submit" value="buy" class="btn btn-success"><i class="fas">Buy Item</button></i>';
						 		echo'</form>';
							echo "</td>";

							if ($_SESSION["id"] == 1)
							{
								echo "<td>";
									echo'<form action="" method="post">';
										echo '<input type="hidden" name="id" value="'.$row[4].'"/>';
								 		echo '<button name="delete" type="submit" value="delete" class="btn btn-danger"><i class="fas">Remove Item</button></i>';
							 		echo'</form>';
								echo "</td>";
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>
