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
          <h1>View Transaction</h1>
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
          Transaction Information
        </h3>
        <table id="cart">
          <tr>
            <th id="name">Notes</th>
            <th id="price">ID</th>
            <th id="price">Total</th>
          </tr>
        <?php
          error_reporting(E_ALL);
          ini_set("display_errors", 1);
          $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

          if($stmt = $mysqli->prepare("SELECT id, totalprice, salenotes FROM ShopTransaction WHERE id = ?")) {
             $stmt->bind_param("i", $_POST['viewid']);
             $stmt->execute();
             $stmt->bind_result($tid, $ttotalprice, $tsalesnotes);
          }
              $stmt->fetch();
              echo '<tr>';
              echo '<td>'. $tsalesnotes .'</td>';
              echo '<td>'. $tid .'</td>';
              echo '<td>'. $ttotalprice .'</td>';
              echo '</tr>';

              echo '</table><br></br>';
              $stmt->close();
         ?>
        <table id="cart">
          <tr>
            <th id="name">Name</th>
            <th id="quantity">Quantity</th>
            <th id="price">Price</th>
            <th id="total">Total</th>
          </tr>
        </table>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
