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
							<form class="form-signin" method="POST">
								<div class="form-label-group">
									<input type="text" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
									<label for="inputUserame">Username</label>
								</div>

								<div class="form-label-group">
									<input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
									<label for="inputEmail">Email address</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
									<label for="inputPassword">Password</label>
								</div>

								<div class="form-label-group">
									<input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
									<label for="inputConfirmPassword">Confirm password</label>
								</div>

								<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
								<hr>
								<p class="d-block text-center">Already have an account? <a href="/login.php">Sign In</a></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
