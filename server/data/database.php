<?php
//include_once('../ksublog/frontend/signup.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ksublogger";
$test = "saad";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
//$sql_command_register = "INSERT INTO `users` (`firstname`, `lastname`, `username`, `password`) VALUES ('{}', '{}', '{}', '{}')";

if($_POST['type'] == 1) {
  $sql_command_check_username = "SELECT * FROM users  WHERE username = '{$_POST['u']}'" ;
  $check = $conn->query($sql_command_check_username);
  if($check->num_rows>0){echo "taken";}
  else {echo "not taken";}
  $conn->close();
}

if($_POST['type'] == 5) {
  $sql_command_check_username = "SELECT acc FROM users  WHERE username = '{$_POST['user']}'" ;
  $check = $conn->query($sql_command_check_username);
  if($check->num_rows>0){
    while($row = $check->fetch_assoc())
      echo $row['acc'];}
  else {echo "wrong type";}
  $conn->close();
}
//$result = $conn->query($sql_command_check_username);
//if($result->num_rows > 0) {
  //while($row = $result->fetch_assoc()) {
    //echo "first name: " . $row["firstname"]. " - Last Name: " . $row["lastname"]. " Username:" . $row["username"];
  //}
//}
//else {
  //echo "0 Results found";
//}
// Check connection
//if (!$conn) {
  //die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";
?>