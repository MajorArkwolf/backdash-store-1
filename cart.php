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
          $navmenuGroup = "cart";
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <h3 class="cart-title">
          Shopping Cart
        </h3>
        <table class="cart">
        <tr>
          <th id="name">Name</th>
          <th id="quantity">Quantity</th>
          <th id="price">Price</th>
          <th id="total">Total</th>
        </tr>
        <tr>
          <td>Button</td>
          <td>5</td>
          <td>$2</td>
          <td>$10</td>
        </tr>
        </table>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>