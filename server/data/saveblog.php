<?php
    $target_dir = "uploads/";
    $target_file = $target_dir . $_FILES["img"]["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "ksublogger";
$conn = mysqli_connect($servername, $username, $password,$dbname);
    // Check if image file is a actual image or fake image
    if(isset($_FILES["img"])) {
      $check = getimagesize($_FILES["img"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }
    }
        
    // Check file size
    if ($_FILES["img"]["size"] > 500000) {
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "error file";
    // if everything is ok, try to upload file
    } else {

      if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
          if($_POST['update'] == 0) {
            $sql_count = "select count(bid)+1 from blogs";
            $rows = $conn->query($sql_count);
            $count = $rows->fetch_assoc();
            $bid = $count['count(bid)+1'];
            $sql_check_ID = "select bid from blogs where bid = {$bid}";
            $num = intval($bid);
            while(true) {
              $sql_check_ID = "select bid from blogs where bid = {$num}";
            $rows = $conn->query($sql_check_ID);
            if($rows->num_rows>0) {$num+=1;}
            else {break;}
            }

            //echo "INSERT INTO `blogs` VALUES ({$bid},'{$target_file}','{$_POST['title']}','{$_POST['blog']}','{$_POST['owner']}',0,0)";
            $sql_insert_blog = "INSERT INTO `blogs` VALUES ({$num},'{$target_file}','{$_POST['title']}','{$_POST['blog']}','{$_POST['owner']}',0,0)";
            if($conn->query($sql_insert_blog)){echo "ADDED!"; $conn->close();}
            else {echo "failed to add";}
          }
          else {
            $sql_update = "UPDATE `blogs` SET `image`='{$target_file}',`bt`='{$_POST['title']}',`text`='{$_POST['blog']}',`owner`='{$_POST['owner']}' WHERE `bid`='{$_POST['bid']}'";
            if($conn->query($sql_update)){echo "Updated!"; $conn->close();}
            else {echo "failed to Update";}
          
          }



      } else {
        
      }
    }



?>