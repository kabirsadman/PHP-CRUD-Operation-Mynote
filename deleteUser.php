<?php
$title=$_REQUEST["titleEdit"];
$description=$_REQUEST["descriptionEdit"];
$sno=$_REQUEST["snoEdit"];
$user=['sno'=>$sno, 'title'=>$title, 'description'=>$description];

$servername = "localhost";
$username = "root";
$password = "";
$database= "notes";
$conn = mysqli_connect($servername,$username,$password,$database);
$sql4= "DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
$result= mysqli_query($conn,$sql4);
if($result){
    header('Location: ../crud/index.php');
   }
   else{
     echo "error" . mysqli_error($conn);
   }




?>