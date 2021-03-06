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

            if ($stmt = $mysqli->prepare("select P.id, P.name, P.description, P.price, P.stock, P.category from Products P where P.id = ?")) {
               $stmt->bind_param("i", intval($_GET['id']));
               $stmt->execute();
               $stmt->bind_result($id, $name, $description, $price, $stock, $category);
               $stmt->fetch();
               $stmt->close();
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

                if ($stock >= 1) {
                  echo '<form id="add-to-cart" action="javascript:addToCart();">';
                  echo "<input id='productId' type='hidden' name='id' value='{$id}'>";
                  echo   '<input id="quantity-picker" type="number" name="quantity" value="1" min="1">';
                  echo   '<button type="submit" class="submit-button" name="submit">';
                  echo     '<i class="fa fa-shopping-cart"></i> Add to cart';
                  echo   '</button>';
                  echo '</form>';
                } else {
                  echo 'Out of stock';
                }

              echo "</div>";
            echo "</div>";

            if($_SESSION['admin']) {
              if($stmtCat = $mysqli->prepare("select C.id, C.name from Categories C")) {
                $stmtCat->execute();
                $stmtCat->bind_result($categoryId, $categoryName);
              }

              echo "
                <div class='product-update'>
                  <h3 id='update-details'>Update product details</h3>

                  <form class='input-form' action='updateItem.php'>
                    <input id='id' type='hidden' name='id' value='{$id}'>
                    <label for='name'>Name</label>
                    <input id='name' type='text' name='name' value='{$name}'>
                    <label for='category'>Category</label>
                    <select name='category' id='category'>";

                    while ($stmtCat->fetch()) {
                        echo "<option value='{$categoryId}'";
                      if ($category == $categoryId) {
                        echo " selected='selected'";
                      }
                      echo ">{$categoryName}</option>";
                    }

                    echo "</select>
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
    <script src="navbar.js"></script>
    <script src="addToCart.js"></script>
  </body>
</html>
