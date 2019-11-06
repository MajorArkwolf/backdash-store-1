<?php
  session_start();
?>
<?php
  $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

  if ($stmt = $mysqli->prepare("select P.id, P.name, P.description, P.price, P.stock from Products P where P.id = ?")) {
     $stmt->bind_param("i", intval($_GET['id']));
     $stmt->execute();
     $stmt->bind_result($id, $name, $description, $price, $stock);
     $stmt->fetch();
  }

  $results = array();
  $results["id"] = $id;
  $results["name"] = $name;
  $results["description"] = $description;
  $results["price"] = $price;
  $results["stock"] = $stock;
  echo json_encode($results);
?>
