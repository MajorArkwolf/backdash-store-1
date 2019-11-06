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
          <h1>Search</h1>
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
        <div class="product-grid">
          <?php
            error_reporting(E_ALL);
            ini_set("display_errors", 1);

            $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");
            $search = "%{$_GET['text']}%";

            if($stmt = $mysqli->prepare("select P.id, P.name, P.price from Products P where P.name like ?")) {
               $stmt->bind_param("s", $search);
               $stmt->execute();
               $stmt->bind_result($id, $name, $price);
            }

            while ($stmt->fetch()) {
              echo "<a class='product' href='product.php?id=" . $id . "'>";
                  echo "<div class='product-image'>";
                    echo "<img src='img/product/" . $id . ".png' height='100' width='100'>";
                  echo "</div>";
                echo "<div class='product-title'>" . $name . "</div>";
                echo "<div class='product-price'>" . "$" . $price . "</div>";
              echo "</a>";
            }
          ?>
        </div>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
