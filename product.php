<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
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

            if($stmt = $sql_con->prepare("select * from Products where Products.id = ?")) {
               $stmt->bind_param("i", intval($_GET['id']));
               $stmt->execute();
               $stmt->bind_result($id, $name, $description, $price);
            }

            while ($stmt->fetch()) {
              echo $id;
              echo $name;
              echo $description;
              echo $price;
            }

            echo "<div class='product-container'>";
              echo "<div class='product-image-big'>";
                echo "<img src='img/" . "1" . ".png' height='100' width='100'>";
              echo "</div>";
              echo "<div class='product-info'>";
                echo "<div class='product-info-listing'>";
                  echo "<div class='product-info-name'>Product Name</div>";
                  echo "<div class='product-info-price'>Product Price</div>";
                  echo "<div class='product-info-description'>Product Description</div>";
                echo "</div>";
                echo "<div class='buy-button'>Buy</div>";
              echo "</div>";
            echo "</div>";
          ?>
        </p>
      </div>
    </div>
    <script src="/navbar.js"></script>
  </body>
</html>
