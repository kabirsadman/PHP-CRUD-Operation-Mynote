<?php
$title= $_REQUEST["titleEdit"];
$description=$_REQUEST["descriptionEdit"];
$sno=$_REQUEST["snoEdit"];
$user= ['sno'=> $sno ,'title'=> $title, 'description'=> $description];

$servername = "localhost";
$username = "root";
$password = "";
$database= "notes";
$conn = mysqli_connect($servername,$username,$password,$database);
$sql3= "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno"; 
//sql3= "UPDATE `notes` SET title = '{$user['titleEdit']'}, description = '{$user[descriptionEdit]}' WHERE sno='{$user['snoEdit']}'; 
$result = mysqli_query($conn, $sql3);
  if($result){
   header('Location: ../crud/index.php');
  }
  else{
    echo "error" . mysqli_error($conn);
  }








?>