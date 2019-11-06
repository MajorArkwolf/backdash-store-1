<?php
  session_start();
    $a = "";
  if(isset($_SESSION['admin'])){
    $a .= '<a href="admin.php">Admin</a>';
  }
  if (isset($_SESSION['loggedin'])) {
    $a .= '<a href="details.php">Details</a>';
    $a .= '<a href="sendLogout.php">Log Out</a>';
  } else {
    $a .= '<a href="login.php">Login</a>';
    $a .= '<a href="register.php">Register</a>';
  }

echo '<nav class="navbar">';
  echo '<div class="dropdown';
    if ($navmenuGroup == 'home') { echo ' active'; }
  echo '">';
echo   '<a href="index.php" class="dropbtn">Home</a>
      </div>';


  echo '<div class="dropdown';
    if ($navmenuGroup == 'shop') { echo ' active'; }
  echo '">';

echo  '<button class="dropbtn">Shop
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="products.php">Products</a>
        <a href="categories.php">Categories</a>
      </div>
    </div>';

  echo '<div class="dropdown';
    if ($navmenuGroup == 'account') { echo ' active'; }
  echo '">';

echo '<button class="dropbtn">Account
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">' . $a . '
      </div>
    </div>';

  echo '<div class="dropdown';
    if ($navmenuGroup == 'cart') { echo ' active'; }
  echo '">';
echo   '<a href="cart.php" class="dropbtn">Cart</a>
      </div>';

  echo '<div class="dropdown';
    if ($navmenuGroup == 'about') { echo ' active'; }
  echo '">';
  echo   '<a href="aboutus.php" class="dropbtn">About Us</a>
        </div>
        <div class="search-container">
    <form action="search.php">
      <input type="text" placeholder="Search..." name="text" required>
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

  <a href="javascript:void(0);" class="icon fa fa-bars" onclick="toggleNavbar()"></a>
    </nav>';
 ?>
