<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ksublogger";
$test = "saad";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

if($_POST['type'] == 8) {
$sql_delete = " DELETE FROM blogs WHERE bid = {$_POST['bid']} " ;

if($conn->query($sql_delete)) {
    echo "Deleted!";
}
else {
    echo "Not Deleted!";
}



}




?>