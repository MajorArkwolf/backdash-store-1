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
        <h3>Add Product</h3>
        <form id="newproduct" onsubmit="" action="" method="POST">
          <p>Product Name: <input type="textbox" name="name" id="name"></input></p>
          <p>Product Description: <input type="textbox" name="description" id="description"></input></p>
          <p>Price: <input type="textbox" name="price" id="price"></input></p>
          <p>Product Name: <input type="textbox" name="stock" id="stock"></input></p>
          <p>IMAGE UPLOADER COMING SOON</p>
          <button type="submit" id="submitbutton" disabled>Submit</button>
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
            echo '<p><button type="submit" value="'. $id . '">DELETE</button> <button type="submit" value="'. $id . '">VIEW</button> ID: ' . $id . ' Name: '. $name . ' Price: ' . $price . '</p>';
          }
        ?>
      </div>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
