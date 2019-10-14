<?php
/*
 * File: admin.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: The admin panel, only accessible to
 * 			the administrative user. They can then
 *			lock or unlock user accounts, as well as
 *			delete them completely.
*/

require_once("db.php");
require_once("includes/check_session.php");
include("includes/handle_admin.php");

session_start();
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
			{
				header("Location: /index.php");
				die();
			}

			session_start();
	    include_once('includes/header.php');
		?>

		<div class="container">
		 	<!-- Mad props to Jon for providing a table for us to use ^_^ -->
		 	<!-- Search prompt for letting the admin search for a user by name -->
		 	<h1>Search for users:</h1>
		 	<form method="GET" action="./admin.php">
				<div class="input-group mt-2 w-25">
					<input type="text" class="form-control" placeholder="Name to search by" name="name" >
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
					</div>
				</div>
		 	</form>

		 	<hr>

		 	<!-- Draw a table of users for the admin to view, and also
				 have some fancy buttons to let the admin lock, unlock,
		 		 and delete user accounts -->
		 	<h2>Results Found:</h2>
		 	<table class="table">
				<thead>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Locked?</th>
					<th>Lock</th>
					<th>Unlock</th>
					<th>Delete Account</th>
				</thead>
				<tbody>
					<?php
						// If the GET variable "name" is set then use it to query for a specific user
						if(isset($_GET["name"]))
						{
							 $name = $_GET["name"];
							 $sql = "SELECT id, username, email, locked FROM Users where username='$name'";
						}
						else
						{
							 // Otherwise just query for all users
							 $sql = "SELECT id, username, email, locked FROM Users";
						}

						$result = mysqli_query($db, $sql);

						// Iterate through all results and output a list of users
						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>$row[0]</td>";
							echo "<td>$row[1]</td>";
							echo "<td>$row[2]</td>";
							echo "<td>$row[3]</td>";
							// Add two buttons that act as lock and unlock buttons for each account
							echo "<td>";
							 	echo'<form action="" method="post">';
									echo '<input type="hidden" name="id" value="'.$row[0].'"/>';
									echo '<button name="lock" type="submit" value="lock" class="btn btn-danger"><i class="fas fa-times"></button></i>';
								echo '</form>';
							echo "</td>";
							echo "<td>";
								echo'<form action="" method="post">';
									echo '<input type="hidden" name="id" value="'.$row[0].'"/>';
							 		echo '<button name="unlock" type="submit" value="unlock" class="btn btn-success"><i class="fas fa-check"></button></i>';
						 		echo'</form>';
							echo "</td>";

							// Add a button that lets the admin delete user accounts
							echo "<td>";
						 		echo'<form action="" method="post">';
									echo '<input type="hidden" name="id" value="'.$row[0].'"/>';
							 		echo '<button name="delete" type="submit" value="delete" class="btn btn-danger"><i class="fas fa-times"></button></i>';
						 		echo'</form>';
							echo "</td>";
							echo "</tr>";
						}
					?>
				</tbody>
		 	</table>
		</div>
	</body>
</html>
