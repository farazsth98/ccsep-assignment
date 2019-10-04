<?php
require_once("db.php");
require_once("includes/check_session.php")
?>

<!DOCTYPE html>
<html>
<head>

	<?php
	include_once("includes/includes.php");

	// Use a GET request to get the correct account information
	if (!isset($_GET["id"]))
	{
		$id = $_SESSION["id"];
		header("Location: /account.php?id=$id");
	}
	?>

</head>
<body>
   <?php
      include_once('includes/header.php');
   ?>

   <div class="container">
		 <table class="table">
				<!-- THIS IS THE TABLE HEADER (YES IT GETS BOLDED) -->
				<thead>
					 <th>Account ID</th>
					 <th>Email</th>
				</thead>
				<tbody>
					 <?php
							// Use the GET variable "id" to get the correct user information
							$id = $_GET["id"];
							$sql = "SELECT id, username, email FROM Users where id=$id;";

							$result = mysqli_query($db, $sql);
							echo mysqli_error($db);

							$row = mysqli_fetch_array($result);

							echo '<h1>Welcome back '.$row[1].'!</h1>';
							echo "<tr>";
							echo "<td>$row[0]</td>";
							echo "<td>$row[2]</td>";
					 ?>
				</tbody>
		 </table>
   </div>
</body>
</html>
