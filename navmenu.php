<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    $a = '<a href="details.php">Details</a>';
    $a .= '<a href="sendLogout.php">Log Out</a>';
  } else {
    $a = '<a href="login.php">Login</a>';
    $a .= '<a href="register.php">Register</a>';
  }
#$a = '<a href="login.php">Login</a>';
echo '<nav class="navbar">';
  echo '<div class="dropdown';
    if ($navmenuGroup == 'home') { echo ' active'; }
  echo '">';
echo   '<a href="index.php" class="dropbtn">Home</a>
      </div>

    <div class="dropdown">
      <button class="dropbtn">Shop
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="products.php">Products</a>
        <a href="categories.php">Categories</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Account
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">' . $a . '
      </div>
    </div>
    <div class="dropdown">
      <a href="aboutus.php">About Us</a>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">☰</a>
  </nav>'
 ?>
