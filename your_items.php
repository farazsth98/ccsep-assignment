<?php
/*
 * File: your_items.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page provides the user of a list
 *			of all items that they've put up for sale.
 *			The user can also search for their items by
 *			name.
*/

require_once("db.php");
require_once("includes/check_session.php")
?>

<!DOCTYPE html>
<html>
<head>

	<?php
		include_once("includes/includes.php");
		$current = "user_items.php";
	?>

</head>
	<body>
   		<?php
    		include_once('includes/header.php');
   		?>

   	<div class="container">

   		<!-- Search prompt for the user to search for their items by name -->
		<h1>Search for items:</h1>
		<form method="GET" action="">
			<div class="input-group mt-2 w-25">
				<input type="text" class="form-control" placeholder="Item name" name="name" >
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
				</div>
			</div>
		</form>

		<hr>

		<!-- Output a nice looking table of items for the user -->
		<h2>Items Found:</h2>
		<table class="table">
			<thead>
				<th>Item name</th>
				<th>Description</th>
				<th>Price</th>
			</thead>
			<tbody>
				<?php
			 		$current_id = $_SESSION["id"];

					// If the GET variable "name" is set then use it
					if(isset($_GET["name"]))
					{
						$name = $_GET["name"];
						$sql = "SELECT name, description, price FROM Items where user_id=$current_id AND name LIKE '%$name%'";
					}
					else
					{
						// Otherwise just grab all the items
						$sql = "SELECT name, description, price FROM Items WHERE user_id=$current_id;";
					}
					$result = mysqli_query($db, $sql);
					echo mysqli_error($db);

					// Iterate through all results and create a list of items
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>$row[0]</td>";
						echo "<td>$row[1]</td>";
						echo "<td>$row[2]</td>";
					}
				?>
			</tbody>
		</table>
   	</div>
</body>
</html>
