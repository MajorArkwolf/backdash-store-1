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

            foreach ($order as $i) {
              echo $i["id"] + "\n";
              echo $i["quantity"] + "\n";
            }

            // if($_SESSION['admin']) {
            //   $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");
            //   $query = "update Products P set P.name = ?, P.description = ?, P.price = ?, P.stock = ?, P.category = ? where P.id = ?";

            //   if ($stmt = $mysqli->prepare($query)) {
            //       $stmt->bind_param("ssdiii", $_GET['name'], $_GET['description'],
            //         doubleval($_GET['price']), intval($_GET['stock']),
            //         intval($_GET['category']), intval($_GET['id']));
            //       $stmt->execute();

            //       echo "Update successfully!";
            //   }
            // } else {
            //   echo "Not authorized";
            // }
        ?>
        </h2>
    </div>
    <script type="text/javascript" src="js/register.js"></script>
    <script src="navbar.js"></script>
  </body>
</html>
