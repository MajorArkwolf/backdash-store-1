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
          <h1>Products</h1>
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
            $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

            if ($stmt = $mysqli->prepare("select P.id, P.name, P.description, P.price, P.stock from Products P where P.id = ?")) {
               $stmt->bind_param("i", intval($_GET['id']));
               $stmt->execute();
               $stmt->bind_result($id, $name, $description, $price, $stock);
               $stmt->fetch();
            }

            echo "<div class='product-container'>";
              echo "<div class='product-image-big'>";
                echo "<img src='img/product/" . $id . ".png' height='100' width='100'>";
              echo "</div>";
              echo "<div class='product-info'>";
                echo "<div class='product-info-listing'>";
                  echo "<div class='product-info-name'>" . $name . "</div>";
                  echo "<div class='product-info-price'> $" . $price . "</div>";
                  echo "<div class='product-info-stock'>" . $stock . " units stocked</div>";
                  echo "<div class='product-info-description'>" . $description . "</div>";
                echo "</div>";
                echo '<form action="foo.php">';
                echo   '<input type="number" name="quantity" min="1">';
                echo   '<input type="submit" value="Add to cart">';
                echo '</form>';

                #echo "<div class='buy-button'><i class='fa fa-shopping-cart'></i> Add to cart</div>";

              echo "</div>";
            echo "</div>";

            if($_SESSION['admin']) {
              echo "
                <div class='product-update'>
                  <h3 id='update-details'>Update product details</h3>

                  <form class='input-form' action='updateItem.php'>
                    <input id='id' type='hidden' name='id' value='{$id}'>
                    <label for='name'>Name</label>
                    <input id='name' type='text' name='name' value='{$name}'>
                    <label for='price'>Price</label>
                    <input id='price' type='text' name='price' value='{$price}'>
                    <label for='stock'>Stock</label>
                    <input id='stock' type='text' name='stock' value='{$stock}'>
                    <label for='description'>Description</label>
                    <textarea name='description' id='description' >{$description}</textarea>
                    <button type='submit'>Update</button>
                  </form>
                </div>";
            }
          ?>
        </p>
      </div>
    </div>
    <script src="productchecker.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
