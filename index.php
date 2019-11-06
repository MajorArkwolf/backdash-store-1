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
          <h1>Backdash</h1>
        </div>
      </header>
      <?php
          ob_start();
          $navmenuGroup = "home";
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <h2>Welcome to the Backdash store.</h2>
        <p>Backdash is an online company based out of Australia built to serve the needs of consumers/players
          who want high-quality products without long wait times in Australia. Backdash caters to games that
          require specific hardware for games to be played optimally and this means that products that are cheap
          or break easily will not be stocked. Our customers want to know that the product they have bought from us
          will keep working from when they are practicing in the living room to competing on the grand stage.
          Backdash will ensure that no customer is ever disappointed.</p>
        <p>Backdash is founded by members who share a passion in the esports scene and allocates 5-10%
          of the price depending on the product to be held aside, which is used to sponsor tournaments/players
          and provide equipment to sick children who need an escape outlet from there everyday traumas. </p>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
