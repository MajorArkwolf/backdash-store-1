<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
        <?php
          $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

          if($stmt = $mysqli->prepare("select P.id, P.name, P.email, P.address from Accounts P where P.email = ?")) {
             $stmt->bind_param("i", intval($_SESSIONS['name']));
             $stmt->execute();
             $stmt->bind_result($id, $name, $email, $address);
             $stmt->fetch();
          }
          echo '<p><b>ID:</b> ' . $id . '</p>';
          echo '<p><b>Email:</b> ' . $email . '</p>';
          echo '<p></b>Name:</b> ' . $name . '</p>';
          echo '<p><b>Address:</b> ' . $address . '</p>';
         ?>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
