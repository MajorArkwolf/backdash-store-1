<?php
echo '<nav class="navbar">
    <div class="dropdown active">
      <a href="index.php" class="dropbtn">Home</a>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Shop
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="products.php">Products</a>
        <a href="categories.php">Categories</a>
      </div>
    </div>';

    if ( isset( $_SESSION['user_id'] ) ) {
      echo'<button class="dropbtn">Account
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a href="details.php">Details</a>
              <a href="logout.php">Log Out</a>
            </div>
          </div>';
    } else {
        echo'<button class="dropbtn">Account
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="login.php">Log In</a>
                <a href="register.php">Register</a>
              </div>
            </div>';
    }

    echo'<div class="dropdown">

    <div class="dropdown">
      <a href="aboutus.php">About Us</a>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">☰</a>
  </nav>';
 ?>
