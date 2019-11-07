<?php
  header("refresh:3;url=product.php?id={$_GET['id']}");
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

              foreach ($order as $i) {
                if($stmt = $mysqli->prepare("select P.price * ? as totalCost from Products P where P.id = ?")) {
                   $stmt->bind_param("ii", $i["id"], $i["quantity"]);
                   $stmt->execute();
                   $stmt->bind_result($totalCost);
                   $stmt->fetch();
                   $stmt->close();

                   $sum += $totalCost;
                }
              }
              echo $sum;
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
