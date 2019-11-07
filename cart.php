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
        <table id="cart">
          <thead>
          <tr>
            <th id="name">Name</th>
            <th id="quantity">Quantity</th>
            <th id="price">Price</th>
            <th id="total">Total</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
          <tr>
            <th id="grand-total-title" colspan="3">Grand Total</th>
            <th id="grand-total">$0.00</th>
          </tr>
          </tfoot>
        </table>

        <?php
          if (!isset($_SESSION['loggedin'])) {
            echo '<h3 class="warning">Please log in to checkout</h3>';
          } else {
            echo '<div class="product-update checkout">
              <h3 id="update-details">Checkout</h3>
              <form class="input-form" action="javascript:buy();">
                <label for="notes">Delivery notes</label>
                <input id="notes" type="text" name="notes">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" name="card-number">
                <button type="submit">Purchase</button>
              </form>
            </div>';
          }
        ?>
      </div>
    </div>
    <script src="navbar.js"></script>
    <script src="cart.js"></script>
  </body>
</html>
