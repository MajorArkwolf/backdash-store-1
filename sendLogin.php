<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $host = "localhost";
  $userName = "X32019269";
  $password = "X32019269";
  $dbName = "X32019269";

  // Always start this first
  session_start();

  if ( ! empty( $_POST ) ) {
      if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        echo "begin lookup";
          // Getting submitted user data from database
          $con = new mysqli($host, $userName, $password, $dbName);
          $stmt = $con->prepare("SELECT * FROM Accounts WHERE email = ?");
          $stmt->bind_param('s', $_POST['username']);
          $stmt->execute();
          $result = $stmt->get_result();
      	  $user = $result->fetch_object();
          echo "user found";

      	// Verify user password and set $_SESSION
      	if ($_POST['password'] == $user->password ) ) {
      		$_SESSION['user_id'] = $user->ID;
          echo "password true";
          //header('Location: loginsuccess.php');
      	} else {
          echo "password false";
          //header('Location: login.php');
        }
      }
  }

 ?>
