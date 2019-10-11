<?php
require_once("db.php");
require_once("includes/check_session.php");
include("includes/handle_balance.php");
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
		<!-- User data is shown in a table -->
	 	<table class="table">
			<thead>
				<th>Account ID</th>
				<th>Email</th>
				<th>Balance</th>
			</thead>
			<tbody>
				<?php
					// Use the GET variable "id" to get the correct user information
					$id = $_GET["id"];
					$sql = "SELECT id, username, email, balance FROM Users where id=$id;";

					$result = mysqli_query($db, $sql);
					echo mysqli_error($db);

					$row = mysqli_fetch_array($result);

					echo '<h1>Welcome back '.$row[1].'!</h1>';
					echo "<tr>";
					echo "<td>$row[0]</td>"; // user id
					echo "<td>$row[2]</td>"; // user email
					echo "<td>\$$row[3]</td>" // user's balance
				?>
			</tbody>
	 	</table>
	</div>

	<div class="d-flex justify-content-center">
		<form class="form-inline" action="" method="POST">
			<input class="form-control mr-sm-2" type="number" placeholder="Balance" aria-label="Balance" name="balance">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit" value="submit">Add Balance</button>
		</form>
	</div>
</body>
</html>
