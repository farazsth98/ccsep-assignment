<?php 
/*
 * File: showTest.php
 * File Created: Sunday, 8th September 2019 10:43:28 pm
 * Author: Jonathon Winter
 * -----
 * Last Modified: Sunday, 8th September 2019 11:26:32 pm
 * Modified By: Jonathon Winter
 * -----
 * Purpose: 
 */

// require = if it cant find it then error
// once = dont include it multiple times (prevents loops)
require_once("db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Test Tables</title>

   <script src="./js/jquery.min.js"></script>
   <link rel="stylesheet" href="./css/bootstrap.min.css">
   <link rel="stylesheet" href="./css/fontawesome.css">
   
   <script>
      // You can try achieve this yourself 
      function deletePerson(id){
         console.log("You are going to delete user: " + id)
      }
   </script>


</head>
<body>
   <div class="container">
      <h1>Search Test:</h1>
      <!-- Send the form as a GET request to this page (look at the URL) -->
      <form method="GET" action="./showTest.php">
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
            <th>Age</th>
            <th>Delete</th>
         </thead>
         <tbody>
            <?php 

               // If the GET variable "name" is set then use it
               if(isset($_GET["name"])){
                  $name = $_GET["name"];
                  $sql = "SELECT ID, name, age FROM test where name LIKE '%$name%'";
               }else{
                  // Otherwise just grab them all
                  $sql = "SELECT ID, name, age FROM test";                  
               }

               $result = mysqli_query($db, $sql); 

               // Iterate through all results and create a list item
               while($row = mysqli_fetch_array($result)){

                  echo "<tr>";
                  // Access by name
                  echo "<td>".$row["ID"]."</td>";
                  // Access by index
                  echo "<td>$row[1]</td>";
                  echo "<td>$row[2]</td>";
                  
                  // Add a button that sends the ID of the user to the delete function
                  echo "<td>";
                     echo "<button class='btn btn-danger' onclick='deletePerson(".$row["ID"].")'><i class='fas fa-times'></button></i>";
                  echo "</td>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>

   </div>
</body>
</html>