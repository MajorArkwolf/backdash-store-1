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

          if($stmt = $mysqli->prepare("select id, name, email, address, isAdmin, phone from Accounts where id = ?")) {
             $stmt->bind_param("i", $_SESSION['id']);
             $stmt->execute();
             $stmt->bind_result($id, $name, $email, $address, $admin, $phone);
             $stmt->fetch();
          }
          echo '<form id="update" onsubmit="" action="sendUpdate.php" method="POST">';
          echo '<p>Email: <input type="textbox" name="email" id="email" value="' . $email . '"></input></p>';
          echo '<p>Name: <input type="textbox" name="name" id="name" value="' . $name . '"></input></p>';
          echo '<p>Phone: <input type="textbox" name="phone" id="phone" value="' . $phone . '"></input></p>';
          echo '<p>Address:</p> <p><textarea rows="4" cols="50" name="address" id="address">' . $address . '</textarea></p>';
          echo '<p><button type="submit" id="submitbutton">Submit</button>';
          echo '</form>';
          echo '<br></br>';
          echo '<form id="updatePassword" onsubmit="" action="sendUpdatePassword.php" method="POST">';
          echo '<p>Password: <input type="password" name="userPassword" id="userPassword" onblur="CheckPassword()"></input></p>';
          echo '<p>Confirm Password: <input type="password" id="userPassword2" onblur="CheckPassword()"></input></p>';
          echo '<p id="passwordverify"></p>';
          echo '<button type="submit" id="submitbutton2" disabled>Submit</button>';
          echo '</form';
         ?>
      </div>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
