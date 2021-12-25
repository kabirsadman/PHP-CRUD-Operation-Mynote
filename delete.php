<?php
$sno =$_REQUEST["sno"];
$servername = "localhost";
$username = "root";
$password = "";
$database= "notes";
$conn=mysqli_connect($servername,$username,$password,$database);
$sql3="SELECT * FROM `notes` where sno={$sno}";
$result3=mysqli_query($conn,$sql3);
$user= mysqli_fetch_assoc($result3);
$title=$user["title"];
$description=$user["description"];








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
        <form action="/crud/deleteUser.php" method= "POST">
          <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit" value="<?php echo $title?>"  aria-describedby="emailHelp">
        
          <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Note Descroption</label>
          <!-- <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"  rows="3"></textarea> -->
          <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit" value="<?php echo $description ?>"   aria-describedby="emailHelp">
          <input type="hidden" class="form-control" id="snoEdit" name="snoEdit" value= "<?php echo $sno ?>">
        </div>
          
          <button type="submit" class="btn btn-primary">Delete</button>
        </form>
  </body>
  </html>