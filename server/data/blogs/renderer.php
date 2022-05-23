<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ksublogger";
$test = "saad";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);


if($_POST['type'] == 7) {
$sql_getblogs = "select * from blogs order by rating";
$result = $conn->query($sql_getblogs);
}
else if($_POST['type']==8) {
$sql_getblogs = "select * from blogs order by comments";
$result = $conn->query($sql_getblogs);
}
else if($_POST['type']==10) {
    $sql_getblogs = "select * from blogs where owner = '{$_POST['own']}'";
    $result = $conn->query($sql_getblogs);
    }
else if($_POST['type']==11) {
        $sql_getblogs = "select * from blogs where bt like '%{$_POST['value']}%' and text like '%{$_POST['value']}%'";
        $result = $conn->query($sql_getblogs);
        }
else {
    $sql_getblogs = "select * from blogs order by bid desc";
    $result = $conn->query($sql_getblogs);
    }

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '  <div class="ui card">
        <div class="content">
          <div class="small ui header blogt">'.$row['bt'].'</div>
          <div class="meta bid">'.$row['bid'].'</div>
          <div class="blogdata" style="display: none">'.$row['text'].'</div>
          <img class="ui  image" src="../server/data/'.$row['image'].'">
        </div>
        <div class="image">
          <img>
        </div>
        <div class="content">
          <span class="right floated">
            <i class="like icon "></i>'.
            $row['rating']
          .'</span>'.
            $row['comments']
          .'</div>
          <div class="extra content">
            <div class="ui teal tiny label">
            Author:
            <div class="detail own">'.$row['owner'].'</div>
          </div>
          <div class=""></div>
        </div>
        <div  class="ui bottom attached button readme">
      Read
    </div>
    </div>';
    }
}
else {
    $msg = "0 Result Found";
    echo '
    <div class="ui negative message">
    <div class="header">
      We are sorry
</div>
    <p>0 Result Found
  </p></div>';
}
$conn->close();










?>