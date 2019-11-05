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
    </div>
    <div class="dropdown">
      <button class="dropbtn">Account
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="details.php">Details</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="aboutus.php">About Us</a>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">☰</a>
  </nav>'
 ?>
