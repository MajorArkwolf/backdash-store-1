<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  ob_start();
  $host = "localhost";
  $username = "X32019269";
  $password = "X32019269";
  $db_name = "X32019269";
  $tbl_name="Accounts"; // Table name

  // Connect to server and select databse.
  mysql_connect("$host", "$username", "$password")or die("cannot connect");
  mysql_select_db("$db_name")or die("cannot select DB");

  // Define $myusername and $mypassword
  $myusername=$_POST['username'];
  $mypassword=$_POST['password'];

  // To protect MySQL injection (more detail about MySQL injection)
  $myusername = stripslashes($myusername);
  $mypassword = stripslashes($mypassword);
  $myusername = mysql_real_escape_string($myusername);
  $mypassword = mysql_real_escape_string($mypassword);

  $sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$mypassword'";
  $result=mysql_query($sql);

  // Mysql_num_row is counting table row
  $count=mysql_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count==1){
    // Register $myusername, $mypassword and redirect to file "login_success.php"
    session_register("myusername");
    session_register("mypassword");
    header('Location: ./loginsuccess.php');
  }
  else {
    header('Location: ./login.php');
  }
  ob_end_flush();
 ?>
