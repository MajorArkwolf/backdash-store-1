<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
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
          include('navmenu.php');
          $myStr = ob_get_contents();
          ob_end_clean();
          echo $myStr;
      ?>
      <div class="text-area">
        <p>
        <?php
            $mysqli = new mysqli("localhost", "X32019269", "X32019269", "X32019269");

            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }

            $res = $mysqli->query("select * from Products");

            while ($row = $res->fetch_assoc()) {
                echo " id = " . $row['id'] . "\n";
                echo " name = " . $row['name'] . "\n";
                echo " description = " . $row['description'] . "\n";
                echo " price = " . $row['price'] . "\n";
            }

        ?>
        </p>
      </div>
    </div>
    <script src="/navbar.js"></script>
  </body>
</html>
