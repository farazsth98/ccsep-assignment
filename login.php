<?php
/*
 * File: login.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page gets included by auth.php.
 *          It let's the user login to the store.
*/

    include("includes/handle_login.php");

    // Auto redirect if a GET request on auth.php isn't used to access the login page
    if ($_SERVER["REQUEST_URI"] != "/auth.php?page=login.php")
        header("Location: /auth.php?page=login.php");
?>

<!-- Just a nice looking login page.
     Adapted from the following link: https://startbootstrap.com/snippets/login/ -->
<!DOCTYPE html>
<html>
    <head>
        <?php include_once("includes/includes.php"); ?>
    </head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" action="" method="POST">
                            <div class="form-label-group">
                                <input type="username" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
                                <label for="inputUsername">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" placeholder="Password" name="password"required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="form-label-group text-danger text-center">
                                <?php echo $error; ?>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="login">Sign in</button>
                        </form>
                        <hr>
                        Don't have an account? <a href="/auth.php?page=register.php">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
