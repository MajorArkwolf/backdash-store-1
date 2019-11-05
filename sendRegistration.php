<?php
  $host = "localhost";
  $userName = "X32019269";
  $password = "X32019269";
  $dbName = "X32019269";

  $db = new mysqli($host, $userName, $password, $dbName);

  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  /* Prepared statement, stage 1: prepare */
  if (!($stmt = $mysqli->prepare("INSERT INTO Accounts(name, email, password, phone, address) VALUES (?, ?, ?, ?, ?)"))) {
      echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
  }
  $id = $_POST["name"];
  if (!$stmt->bind_param("s", $id)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  $id = $_POST["email"];
  if (!$stmt->bind_param("s", $id)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  $id = $_POST["userPassword"];
  if (!$stmt->bind_param("s", $id)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  $id = $_POST["phonenumber"];
  if (!$stmt->bind_param("s", $id)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  $id = $_POST["address"];
  if (!$stmt->bind_param("s", $id)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }
  if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }
 ?>
