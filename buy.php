<?php
  header("refresh:3;url=product.php?id={$_GET['id']}");
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
          <h1>Backdash</h1>
        </div>
      </header>
      <?php
          ob_start();
          $navmenuGroup = "cart";
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <h2>
        <?php
            ob_start();
            include('navmenu.php');
            ob_end_clean();

            $order = json_decode(html_entity_decode(stripslashes($_GET["order"])), true);

            if($_SESSION['loggedin']) {
              $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");
              $sum = 0.0;
              $query = "select sum()";

              foreach ($order as $i) {
                if($stmt = $mysqli->prepare("select P.price * ? as totalCost from Products P where P.id = ?")) {
                   $stmt->bind_param("ii", $i["id"], $["quantity"]);
                   $stmt->execute();
                   $stmt->bind_result($totalCost);
                   $stmt->fetch();
                   $stmt->close();

                   $sum += $totalCost;
                }
              }

              echo $totalCost;

              // $query = "insert into ShopTransaction(id, accountID, totalprice)
              //          values(?, ?, select)";

              /*
               CREATE TABLE ShopTransaction (
                id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
                accountID INT NOT NULL,
                totalprice DECIMAL(15, 2) NOT NULL,
                salenotes TEXT,
                constraint fk_shoptransaction_accountid foreign key (accountID)
                references Accounts(id)
              );
              CREATE TABLE ItemTransaction (
                transactionID INT NOT NULL,
                productID INT NOT NULL,
                quantity INT NOT NULL,
                constraint pk_itemstransaction PRIMARY KEY (transactionID, productID),
                CONSTRAINT fk_itemtransaction_shoptransaction foreign key (transactionID)
                REFERENCES ShopTransaction (id),
                CONSTRAINT fk_itemtransaction_product foreign key (productID)
                REFERENCES Products (id),
                CONSTRAINT q_zero CHECK (quantity > 0)
              );
               */

              if ($stmt = $mysqli->prepare($query)) {
                  $stmt->bind_param("ssdiii", $_GET['name'], $_GET['description'],
                    doubleval($_GET['price']), intval($_GET['stock']),
                    intval($_GET['category']), intval($_GET['id']));
                  $stmt->execute();

                  echo "Purchase successful!";
              }
            } else {
              echo "Not authorized";
            }
        ?>
        </h2>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
