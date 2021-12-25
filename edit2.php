<?php

$servername = "localhost";
$username = "root";
$password = "";
$database= "notes";
$conn = mysqli_connect($servername,$username,$password,$database);
$sno =$_REQUEST["sno"];
//echo $sno;
 $sql2="SELECT * FROM `notes` where sno={$sno}";
 $result2=mysqli_query($conn,$sql2);
 $user= mysqli_fetch_assoc($result2);
//  /print_r($user);
 $title = $user['title'];
 $des = $user['description'];
// while($user = mysqli_fetch_assoc($result2)){
//   $title = $user['title'];
//   $des = $user['description'];
// }




?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
        <form action="/crud/editUser.php" method= "POST">
          <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit" value="<?php echo $title?>" aria-describedby="emailHelp">
        
          <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Note Descroption</label>
          <!-- <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"  rows="3"></textarea> -->
          <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit" value="<?php echo $des?>"  aria-describedby="emailHelp">
          <input type="hidden" class="form-control" id="snoEdit" name="snoEdit" value="<?php echo $sno?>"
        </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
        </form>
  </body>
  </html>