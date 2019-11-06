<?php
  session_start();

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
  if (!($stmt = $mysqli->prepare("UPDATE Accounts set name = ?, email = ?, phone = ?, address = ?, isAdmin = ? where email = ?"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }

  $name = $_POST["name"];
  $email = $_POST["email"];
  $phonenumber = $_POST["phone"];
  $address = $_POST["address"];
  $isAdmin = $_POST["isAdmin"];

  if($isAdmin == 1){
    $admin = 1;
  } else {
    $admin = 0;
  }


  if (!$stmt->bind_param("ssssis", $name, $email, $phonenumber, $address, $admin, $email)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }


  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    header('Location: error.php');
  }else {
    header('Location: admin.php');
  }
 ?>
