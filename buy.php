<?php
  header("refresh:3;url=cart.php");
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
        <h2>
        <?php
            error_reporting(E_ALL);
            ini_set("display_errors", 1);

            ob_start();
            include('navmenu.php');
            ob_end_clean();

            $order = json_decode(html_entity_decode(stripslashes($_GET["order"])), true);

            if($_SESSION['loggedin']) {
              $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");
              $sum = 0.0;

              $query = "select P.price * ? as totalCost from Products P where P.id = ?";
              foreach ($order as $i) {
                if($stmt = $mysqli->prepare($query)) {
                   $stmt->bind_param("ii", $i["quantity"], $i["id"]);
                   $stmt->execute();
                   $stmt->bind_result($totalCost);
                   $stmt->fetch();
                   $stmt->close();

                   $sum += $totalCost;
                }
              }

              $query = "insert into ShopTransaction(id, accountID, totalprice, salenotes)
                        values(default, ?, ?, ?)";
              if($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param("ids", $_SESSION["id"], $sum,
                  $_GET["name"] . " " . $_GET["card"]);
                $stmt->execute();
                $transactionID = $mysqli->insert_id;
                echo $mysqli->error;
                $stmt->close();
              } else {
                echo $mysqli->error;
              }

              $query = "insert into ItemTransaction(transactionID, productID, quantity)
                        values(?, ?, ?)";
              foreach ($order as $i) {
                if($stmt = $mysqli->prepare($query)) {
                  $stmt->bind_param("iii", $transactionID, $i["id"], $i["quantity"]);
                  $stmt->execute();
                  $stmt->close();
                }
              }

              echo "Purchase successful!";
            } else {
              echo "Not authorized";
            }
        ?>
        </h2>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
