<?php
  session_start();
  if(!$_SESSION["admin"]) {
    header('Location: error.php');
  }
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
          <h1>Account Details</h1>
        </div>
      </header>
      <?php
          ob_start();
          $navmenuGroup = "account";
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <h2>Admin Page</h2>
        <a href="admin.php">Back to Admin page</a>

        <?php
        echo '  <h3>Processing Transactions</h3>
                <table id="cart">
                <tr>
                  <th>View</th>
                  <th id="name">Notes</th>
                  <th id="quantity">ID</th>
                  <th id="price">Price</th>
                </tr>';
          $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

          if($stmt = $mysqli->prepare("SELECT id, totalprice, salenotes FROM ShopTransaction WHERE shipped != 1")) {
             $stmt->execute();
             $stmt->bind_result($id, $totalprice, $salesnotes);
          }
            while ($stmt->fetch()) {
              echo '<tr>';
              echo '<td><form action="sendShipping.php" method="post"><button type="submit" name="ship" value="'. $id . '">Ship</button></form></td>';
              echo '<td>'. $salesnotes .'</td>';
              echo '<td>'. $id .'</td>';
              echo '<td>'. $totalprice .'</td>';
              echo '</tr>';
            }
          echo '</table>';
          $stmt->close();
        ?>
        <br></br>
        <?php
          echo '  <h3>Completed Transactions</h3>
                  <table id="cart">
                  <tr>
                    <th>View</th>
                    <th id="name">Notes</th>
                    <th id="quantity">ID</th>
                    <th id="price">Price</th>
                  </tr>';
          $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

          if($stmt = $mysqli->prepare("SELECT id, totalprice, salenotes FROM ShopTransaction WHERE shipped = 1")) {
             $stmt->execute();
             $stmt->bind_result($id, $totalprice, $salesnotes);
          }
          echo '<p>$stmt->num_rows</p>';
          if($stmt->num_rows >= 1) {
            while ($stmt->fetch()) {
              echo '<tr>';
              echo '<td><form action="" method="post"><button type="submit" name="viewpurchase" value="'. $id . '">VIEW</button></form></td>';
              echo '<td>'. $salesnotes .'</td>';
              echo '<td>'. $id .'</td>';
              echo '<td>'. $totalprice .'</td>';
              echo '</tr>';
            }
          } else {
            echo '<tr>';
            echo '<td></td>';
            echo '<td>No Data Found</td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '</tr>';
          }
          echo '</table>';
          $stmt->close();
        ?>
      </div>
    </div>
    <script type="text/javascript" src="js/productchecker.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
