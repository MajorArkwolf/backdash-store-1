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
          $navmenuGroup = "account";
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
          echo '<h3>Update Account Details</h3>';
          echo '<form id="update" onsubmit="" action="sendUpdate.php" method="POST">';
          echo '<p>Email: <input type="textbox" name="email" id="email" value="' . $email . '"></input></p>';
          echo '<p>Name: <input type="textbox" name="name" id="name" value="' . $name . '"></input></p>';
          echo '<p>Phone: <input type="textbox" name="phone" id="phone" value="' . $phone . '"></input></p>';
          echo '<p>Address:</p> <p><textarea rows="4" cols="50" name="address" id="address">' . $address . '</textarea></p>';
          echo '<p><button type="submit" id="submitbutton2">Submit</button>';
          echo '</form>';
          echo '<br></br>';
          echo '<h3>Update Password</h3>';
          echo '<form id="updatePassword" onsubmit="" action="sendUpdatePassword.php" method="POST">';
          echo '<p>Password: <input type="password" name="userPassword" id="userPassword" onblur="CheckPassword()"></input></p>';
          echo '<p>Confirm Password: <input type="password" id="userPassword2" onblur="CheckPassword()"></input></p>';
          echo '<p id="passwordverify"></p>';
          echo '<button type="submit" id="submitbutton" disabled>Submit</button>';
          echo '</form>';
         ?>
         <br></br>
         <h2>Order History</h2>
         <table id="cart">
         <tr>
           <th id="name">Notes</th>
           <th id="quantity">ID</th>
           <th id="price">Price</th>
         </tr>
         <?php
           $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

           if($stmt = $mysqli->prepare("SELECT id, totalprice, salenotes FROM ShopTransaction WHERE accountID = ?")) {
              $stmt->bind_param("i", $_SESSION['id']);
              $stmt->execute();
              $stmt->bind_result($id, $totalprice, $salesnotes);
           }
           while ($stmt->fetch()) {
             echo '<tr>';
             echo '<td>'. $salesnotes .'<td>';
             echo '<td>'. $id .'<td>';
             echo '<td>'. $totalprice .'<td>';
             echo '</tr>';
           }
          ?>
         <br></br>
         <?php
            if($_SESSION["admin"]) {
              echo '<h2>SECRET ADMIN PAGE</h2>';
              echo '<a href="admin.php">ADMIN PAGE</a>';
            }
          ?>
      </div>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
