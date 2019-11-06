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
        <h2>
          Update User Details
        </h2>
        <?php
          $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

          if($stmt = $mysqli->prepare("select id, name, email, address, isAdmin, phone from Accounts where id = ?")) {
             $stmt->bind_param("i", $_POST['aname']);
             $stmt->execute();
             $stmt->bind_result($id, $name, $email, $address, $admin, $phone);
             $stmt->fetch();
          }
          echo '<form id="update" onsubmit="" action="sendUpdateUser.php" method="POST">';
          echo '<p>Email: <input type="textbox" name="email" id="email" value="' . $email . '"></input></p>';
          echo '<p>Name: <input type="textbox" name="name" id="name" value="' . $name . '"></input></p>';
          echo '<p>Phone: <input type="textbox" name="phone" id="phone" value="' . $phone . '"></input></p>';
          echo '<p>Address:</p> <p><textarea rows="4" cols="50" name="address" id="address">' . $address . '</textarea></p>';
          if($admin == 1) {
            echo '<p>Is Admin? <input type="checkbox" name="isAdmin" value="1" checked></input></p>';
          } else {
            echo '<p>Is Admin? <input type="checkbox" name="isAdmin" value="1"></input></p>';
          }
          echo '<p><button type="submit" id="submitbutton2">Submit</button>';
          echo '</form>';
          echo '<br></br>';
          echo '<h3>Update Password</h3>';
          echo '<form id="updatePassword" onsubmit="" action="sendUpdateUserPassword.php" method="POST">';
          echo '<p>ID: <input type="textbox" name="id" id="id" value="' . $id . '"></input></p>';
          echo '<p>Password: <input type="password" name="userPassword" id="userPassword"></input></p>';
          echo '<button type="submit" id="submitbutton">Submit</button>';
          echo '</form>';
         ?>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
