<?php
/*
 * File: header.php
 * File Created: Monday, 30th September 2019
 * Author: Syed Faraz Abrar
 * -----
 * Last Modified: Monday, 14th October 2019
 * Modified By: Syed Faraz Abrar
 * -----
 * Purpose: This page is included in every other page except
 *          db.php, login.php, register.php, and auth.php.
 *          It simply outputs the navbar for the website.
*/
?>


<!-- This navigation bar has been adapted from the bootstrap documentation found here:
     https://getbootstrap.com/docs/4.0/components/navbar/ -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/index.php">Radically Sophisticated Application</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/account.php">Account</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="/your_items.php">Your items</a>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="/store.php">Store</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/add_item.php">Add Item</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout.php">Logout</a>
      </li>
      <?php
        // Only add the admin panel button if the user logged in is the admin
        if ($_SESSION["id"] == 1) echo '
        <li class="nav-item">
          <a class="nav-link" href="/admin.php">Admin Panel</a>
        </li>
        '
      ?>
    </ul>
  </div>
</nav>
