<?php
require_once("db.php");
require_once("includes/check_session.php")
?>

<!DOCTYPE html>
<html>
<head>

	<?php include_once("includes/includes.php"); ?>

</head>
<body>
	<?php
		// If the current user is not an admin, abort
		if ($_SESSION["id"] != 1)
			header("Location: /index.php");

		session_start();
    include_once('includes/header.php');
	?>

	<div class="container">
		 <h1>Search Test:</h1>
		 <!-- Send the form as a GET request to this page (look at the URL) -->
		 <form method="GET" action="./admin.php">
				<div class="input-group mt-2 w-25">
					 <input type="text" class="form-control" placeholder="Name to search by" name="name" >
					 <div class="input-group-append">
							<!-- type=submit will trigger the form -->
							<button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
					 </div>
				</div>
		 </form>

		 <!-- Draw a horizontal line :) -->
		 <hr>
		 <h2>Results Found:</h2>
		 <!-- Lets create a table -->
		 <table class="table">
				<!-- THIS IS THE TABLE HEADER (YES IT GETS BOLDED) -->
				<thead>
					 <th>ID</th>
					 <th>Name</th>
					 <th>Email</th>
					 <th>Locked?</th>
					 <th>Lock</th>
					 <th>Unlock</th>
				</thead>
				<tbody>
					 <?php

							// If the GET variable "name" is set then use it
							if(isset($_GET["name"])){
								 $name = $_GET["name"];
								 $sql = "SELECT id, username, email, locked FROM Users where username LIKE '%$name%'";
							}else{
								 // Otherwise just grab them all
								 $sql = "SELECT id, username, email, locked FROM Users";
							}

							$result = mysqli_query($db, $sql);
							echo mysqli_error($db);

							// Iterate through all results and create a list item
							while($row = mysqli_fetch_array($result)){

								 echo "<tr>";
								 // Access by name
								 echo "<td>".$row['id']."</td>";
								 // Access by index
								 echo "<td>$row[1]</td>";
								 echo "<td>$row[2]</td>";
								 echo "<td>$row[3]</td>";
								 // Add a button that sends the ID of the user to the delete function
								 echo "<td>";
										echo "<button class='btn btn-danger' onclick='lockPerson(".$row["id"].")'><i class='fas fa-times'></button></i>";
								 echo "</td>";
								 echo "<td>";
								 		echo "<button class='btn btn-success' onclick='unlockPerson(".$row["id"].")'><i class='fas fa-check'></button></i>";
								 echo "</td>";
								 echo "</tr>";
							}
					 ?>
				</tbody>
		 </table>

	</div>
</body>
</html>
