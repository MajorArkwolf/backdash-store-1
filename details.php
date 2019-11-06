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
        <h2>
          Account Details
        </h2>
        <?php
          $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

          if($stmt = $mysqli->prepare("select id, name, email, address, isAdmin from Accounts where id = ?")) {
             $stmt->bind_param("i", $_SESSION['id']);
             $stmt->execute();
             $stmt->bind_result($id, $name, $email, $address, $admin);
             $stmt->fetch();
          }
#          echo '<form id="update" onsubmit="" action="" method="POST">'
#          echo '<p>Email: <input type="textbox" name="email" id="email" value="' . $email . '"></input></p>';
#          echo '<p>Name: <input type="textbox" name="name" id="email" value="' . $name . '"></input></p>';
#          echo '<p>Address: <input type="textbox" name="address" id="email"  value="' . $address . '"></input></p>';
#          echo '<p><button type="submit" id="submitbutton" disabled>Submit</button>'
#          echo '</form>'
         ?>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
