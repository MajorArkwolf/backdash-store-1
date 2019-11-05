<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $host = "localhost";
  $userName = "X32019269";
  $password = "X32019269";
  $dbName = "X32019269";

  $mysqli  = new mysqli($host, $userName, $password, $dbName);
  if ($mysqli ->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  /* Prepared statement, stage 1: prepare */
  if (!($stmt = $mysqli->prepare("INSERT INTO Accounts(name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }

  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["userPassword"];
  $phonenumber = $_POST["phonenumber"];
  $address = $_POST["address"];
  if (!$stmt->bind_param("sssss", $name, $email, $password, $phonenumber, $address)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }


  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }else {
    header('Location: success.php');
  }
  header('Location: register.php'); 
 ?>
