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
