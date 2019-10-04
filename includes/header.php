
<!-- This navigation bar has been adapted from the bootstrap documentation found here:
     https://getbootstrap.com/docs/4.0/components/navbar/ -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/index.php">House of Faith</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($current == "account.php") echo "active"; ?> ">
        <a class="nav-link" href="/account.php">Account</a>
      </li>
			<li class="nav-item <?php if($current == "user_items.php") echo "active"; ?> ">
        <a class="nav-link" href="/user_items.php">Your items</a>
      </li>
			<li class="nav-item <?php if($current == "store.php") echo "active"; ?> ">
        <a class="nav-link" href="/store.php">Store</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout.php">Logout</a>
      </li>
      <?php
        if ($_SESSION["id"] == 1) echo '
        <li class="nav-item">
          <a class="nav-link" href="/admin.php">Admin Panel</a>
        </li>
        '
      ?>
    </ul>
    <?php if($current == "store.php") echo '
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" item="item">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    '?>
  </div>
</nav>
