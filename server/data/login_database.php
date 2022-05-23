<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ksublogger";
$test = "saad";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
session_start();
if($_POST['type'] == 3) {
    $sql_check_username = "SELECT * FROM users  WHERE username = '{$_POST['username']}' and password = '{$_POST['password']}'";
   $check =  $conn->query($sql_check_username);
  if($check->num_rows>0) {echo "found";}
  else {echo "not found";}
  $conn->close();

}
if($_POST['type'] == 4) {
    $_SESSION['user'] = $_POST['username'];
    echo $_SESSION['user'];
} 
session_destroy();
?>