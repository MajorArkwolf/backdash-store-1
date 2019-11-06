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
          <h1>Login</h1>
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
          Login
        </h2>
        <?php
          if ( isset( $_SESSION['loggedin'] ) ) {
            echo '<p>You are already logged in</p>';
          } else {
            echo '<form id="login" action="sendLogin.php" method="POST">
                      <p>Email: <input type="textbox" name="username" id="username"></input></p>
                      <p>Password: <input type="password" name="password" id="password"></input></p>
                      <button type="submit" id="submitbutton">Submit</button>
                    </form>

                    <p>If you are not registered please <a href="register.php">register</a></p>';
          }
        ?>
      </div>
    </div>
    <script src="navbar.js"></script>
  </body>
</html>
