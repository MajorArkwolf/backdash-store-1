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
          <h1>Product Categories</h1>
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
            $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

            if($stmt = $mysqli->prepare("select C.id, C.name from Categories C")) {
              $stmt->execute();
              $stmt->bind_result($id, $name);
            }

            while ($stmt->fetch()) {
              echo "<a class='product' href='product.php?id=" . $id . "'>";
                  echo "<div class='product-image'>";
                    echo "<img src='img/category/" . $id . ".png' height='100' width='100'>";
                  echo "</div>";
                echo "<div class='product-title'>" . $name . "</div>";
              echo "</a>";
            }
          ?>
        </div>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
