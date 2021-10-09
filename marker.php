<?php 
include 'conn.php';

$sql="INSERT INTO crimes VALUES ('','$_POST[name]','$_POST[status]','$_POST[description]','$_POST[latitude]','$_POST[longitude]')";

 

if (!mysqli_query($conn,$sql)){

  die('Error: ' . mysqli_error($conn));

}else{
    echo 0;
  }

?>