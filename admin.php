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
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <h2>Admin Page</h2>
        <br></br>
        <h3>Add Category</h3>
          <form id="newCategory" onsubmit="CheckCategory();" action="" method="POST">
            <p>Category Name: <input type="textbox" name="cname" id="cname"></input></p>
            <p>Category Description: <input type="textbox" name="cdescription" id="cdescription"></input></p>
            <button type="submit" id="submitbutton">Submit</button>
          </form>
        <br></br>
        <h3>Add Product</h3>
        <form id="newproduct" onsubmit="CheckProduct();" action="" method="POST">
          <p>Product Name: <input type="textbox" name="pname" id="pname"></input></p>
          <p>Product Description: <input type="textbox" name="pdescription" id="pdescription"></input></p>
          <?php
            $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

            if($stmt = $mysqli->prepare("select id, name from Categories")) {
               $stmt->execute();
               $stmt->bind_result($id, $name);
            }
            echo '<p>Category: <select name="pcategory" id="pcategory">';
            while ($stmt->fetch()) {
              echo '<option value="' . $id .'" >'. $name . '</option>';
            }
            echo '</select></p>'
          ?>
          <p>Price: <input type="textbox" name="pprice" id="pprice"></input></p>
          <p>Stock: <input type="textbox" name="pstock" id="pstock"></input></p>
          <p>IMAGE UPLOADER COMING SOON</p>
          <button type="submit" id="submitbutton">Submit</button>
        </form>
        <br></br>
        <h3>Current Product List</h3>
        <?php
          $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

          if($stmt = $mysqli->prepare("select P.id, P.name, P.price from Products P")) {
             $stmt->execute();
             $stmt->bind_result($id, $name, $price);
          }

          while ($stmt->fetch()) {
            echo '<p><button type="submit" value="'. $id . '">DELETE</button> <a href="product.php?id='. $id .'" class="btn btn-info" role="button">VIEW</a> ID: ' . $id . ' Name: '. $name . ' Price: ' . $price . '</p>';
          }
        ?>
      </div>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
