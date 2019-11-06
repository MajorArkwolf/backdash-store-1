<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backdash</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="content">
      <header>
        <div>
          <h1>About Us</h1>
        </div>
      </header>
      <?php
          ob_start();
          $navmenuGroup = "about";
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <h2>Who are we?</h2>
        <p>We are a company based in Australia who believes in the passion of fighting games. We strive to bring the best qaulity parts and equipment from across the globe into Australia and sell them at a reasonable price to help grow and nuture the fighting community.</p>
        <br></br>
        <h2>Our Approach to you!</h2>
        <ul>
          <li>We buy in bulk to save.</li>
          <li>We sell those savings onto you.</li>
          <li>Active sales and shipping team who gaurntee next day shipping if the product is in stock.</li>
          <li>All products are bought from high quality suppliers.</li>
          <li>If its just "not right", ship it back and we will replace it.</li>
        </ul>
        <br></br>
        <h2>Contact Us</h2>
        <p>Need to contact us?</p>
        <ul>
          <li><b>Email:</b> admin@doubletap.com.au</li>
          <li><b>Phone:</b> 1300 655 506</li>
          <li><b>Address:</b> 48 Ranch Road, Roy Hill, 6888, WA, Australia</li>
        </ul>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
