<?php
  include("includes/handle_register.php");

  if ($_SERVER["REQUEST_URI"] != "/auth.php?page=register.php")
    header("Location: /auth.php?page=register.php");
?>

<!DOCTYPE html>
<html>
	<head>
  	<?php include_once("includes/includes.php"); ?>
		<title>House of Faith - Register</title>
  </head>

  <body>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<div class="card card-signin flex-row my-5">
						<div class="card-img-left d-none d-md-flex">
							 <!-- Background image for card set in CSS! -->
						</div>
						<div class="card-body">
							<h5 class="card-title text-center">Register</h5>
							<form class="form-signin" action="" method="POST">
								<div class="form-label-group">
									<input type="text" id="inputUserame" class="form-control" placeholder="Username" name="username" required autofocus>
									<label for="inputUserame">Username</label>
								</div>

								<div class="form-label-group">
									<input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
									<label for="inputEmail">Email address</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
									<label for="inputPassword">Password</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="confirmpassword" required>
									<label for="inputConfirmPassword">Confirm password</label>
								</div>

								<div class="form-label-group text-danger text-center">
									<?php echo $error; ?>
								</div>

								<button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" value="register" type="submit">Register</button>
								<hr>
								<p class="d-block text-center">Already have an account? <a href="/auth.php?page=login.php">Sign In</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
