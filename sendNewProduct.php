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
  if (!($stmt = $mysqli->prepare("INSERT INTO Categories (name, description) VALUES (?,?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }

  $name = $_POST["cname"];
  $description = $_POST["cdescription"];


  if (!$stmt->bind_param("ss", $name, $description)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }


  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    header('Location: error.php');
  }else {
    header('Location: admin.php');
  }
 ?>
