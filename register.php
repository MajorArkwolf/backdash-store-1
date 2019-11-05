<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
    <title>Backdash</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="content">
      <header>
        <div>
          <h1>Registar</h1>
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
          Register
        </h2>
        <form id="register" action="sendRegistration.php" method="POST">
          <p>Email: <input type="textbox" name="email" id="email"></input></p>
          <p>Name: <input type="textbox" name="name" id="name"></input></p>
          <p>Password: <input type="textbox" name="userPassword" id="userPassword" onblur="CheckPassword()"></input></p>
          <p>Confirm Password: <input type="textbox" id="userPassword2" onblur="CheckPassword()"></input></p>
          <p id="verify"></p>
          <p>Phone Number: <input type="textbox" name="phonenumber" id="phonenumber"></input></p>
          <p>Address: <input type="textbox" name="address" id="address"></input></p>
          <button type="submit" id="submitbutton" disabled>Submit</button>
        </form>
        <p>If you are already registered please <a href="login.php">login</a></p>
      </div>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="/navbar.js"></script>
  </body>
</html>
