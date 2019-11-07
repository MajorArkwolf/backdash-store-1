<?php
  session_start();
?>
<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");
  echo $_GET['quantity'];
  echo $_GET['id'];

  $query = "select P.id, P.name, P.description, P.price, P.stock, P.price * ? as totalPrice from Products P where P.id = ?";
  if ($stmt = $mysqli->prepare($query)) {
     $stmt->bind_param("i", intval($_GET['quantity']));
     $stmt->bind_param("i", intval($_GET['id']));
     $stmt->execute();
     $stmt->bind_result($id, $name, $description, $price, $stock, $totalPrice);
     $stmt->fetch();
  }

  $results = array();
  $results["id"] = $id;
  $results["name"] = $name;
  $results["description"] = $description;
  $results["price"] = $price;
  $results["stock"] = $stock;
  $results["totalPrice"] = $totalPrice;
  echo json_encode($results);
?>
