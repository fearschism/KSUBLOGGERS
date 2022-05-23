
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ksublogger";
$test = "saad";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

if($_POST['type'] == 2) {
  $sql_insert1 = "INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`,`acc`) VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['username']}', '{$_POST['password']}','{$_POST['acc']}')";
  if($conn->query($sql_insert1)) {echo $_POST['username']. " has been Registered";}
  else {echo "failed";}
  $conn->close();

}

?>