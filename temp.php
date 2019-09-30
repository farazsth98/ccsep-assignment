<?php
/*
 * File: index.php
 * File Created: Sunday, 8th September 2019 10:36:42 pm
 * Author: Jonathon Winter
 * -----
 * Last Modified: Sunday, 8th September 2019 10:43:47 pm
 * Modified By: Jonathon Winter
 * -----
 * Purpose:
*/

// Include the php database configuration
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <link rel="stylesheet" href="./css/bootstrap.min.css">

   <title>House of Faith</title>
</head>
<body>


   <div class="container">

      <h1>Hello World </h1>
      <hr>
      <h2>You are at: <?php echo $_SERVER['SERVER_NAME'] ?></h2>

      The tables in the database are:
      <ul>
         <?php
            // Get a list of tables
            $sql = "SHOW TABLES FROM assignment";
            $result = mysqli_query($db, $sql);

            // Iterate through all results and create a list item
            while($row = mysqli_fetch_row($result)){
               echo "<li>$row[0]</li>";
            }
         ?>
      </ul>

      Click <a href="./showTest.php">here</a> to view data in the test table.
   </div>

       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>

</body>
</html>
