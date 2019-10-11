<?php
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
		 <!-- Mad props to Jon for providing a table for us to use ^_^ -->
		 <h1>Search for items:</h1>
		 <!-- Send the form as a GET request to this page -->
		 <form method="GET" action="">
				<div class="input-group mt-2 w-25">
					<input type="text" class="form-control" placeholder="Item name" name="name" >
					<div class="input-group-append">
						<!-- type=submit will trigger the form -->
						<button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
					</div>
				</div>
		 </form>

		<!-- Draw a horizontal line :) -->
		<hr>
		<h2>Items Found:</h2>
		<!-- Lets create a table -->
		<table class="table">
			<!-- THIS IS THE TABLE HEADER (YES IT GETS BOLDED) -->
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
						// Otherwise just grab them all
						$sql = "SELECT name, description, price FROM Items WHERE user_id=$current_id;";
					}
					$result = mysqli_query($db, $sql);

					// Iterate through all results and create a list item
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
