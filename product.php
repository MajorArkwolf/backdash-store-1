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
          $navmenuGroup = "shop";
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <p>
          <?php
          error_reporting(E_ALL);
          ini_set("display_errors", 1);

            $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

            if($stmt = $mysqli->prepare("select P.id, P.name, P.description, P.price from Products P where P.id = ?")) {
               $stmt->bind_param("i", intval($_GET['id']));
               $stmt->execute();
               $stmt->bind_result($id, $name, $description, $price);
               $stmt->fetch();
            }

            echo "<div class='product-container'>";
              echo "<div class='product-image-big'>";
                echo "<img src='img/" . $id . ".png' height='100' width='100'>";
              echo "</div>";
              echo "<div class='product-info'>";
                echo "<div class='product-info-listing'>";
                  echo "<div class='product-info-name'>" . $name . "</div>";
                  echo "<div class='product-info-price'> $" . $price . "</div>";
                  echo "<div class='product-info-description'>" . $description . "</div>";
                echo "</div>";
                echo "<div class='buy-button'><i class='fa fa-shopping-cart'></i> Buy</div>";
              echo "</div>";
            echo "</div>";
          ?>
        </p>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
