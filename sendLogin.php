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
          // Getting submitted user data from database
          $con = new mysqli($host, $userName, $password, $dbname);
          $stmt = $con->prepare("SELECT * FROM Accounts WHERE username = ?");
          $stmt->bind_param('s', $_POST['username']);
          $stmt->execute();
          $result = $stmt->get_result();
      	  $user = $result->fetch_object();

      	// Verify user password and set $_SESSION
      	if ( password_verify( $_POST['password'], $user->password ) ) {
      		$_SESSION['user_id'] = $user->ID;
          header('Location: loginsuccess.php');
      	} else {
          header('Location: login.php');
        }
      }
  }

 ?>
