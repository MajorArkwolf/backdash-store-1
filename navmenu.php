<?php
echo '<nav class="navbar">
    <div class="dropdown active">
      <a href="/home.html" class="dropbtn">Home</a>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Shop
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="/basics/notation.html">Products</a>
        <a href="/basics/notation.html">Categories</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Account
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="#">Details</a>
      </div>
    </div>
    <div class="dropdown">
      <a href="foo.html">About Us</a>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="toggleNavbar()">☰</a>
  </nav>'
 ?>
