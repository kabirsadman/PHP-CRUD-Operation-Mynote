<?php 
//INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'Select a note title', 'This is select operation, after select operation we will perform some other operations ', current_timestamp());

//connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database= "notes";
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
  die("sorry we failed to connect : ". mysqli_conncet_error());
}
// for insetion start from here
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $title = $_POST["title"];
  $description = $_POST["description"];
  $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo "..";
  }
  else{
    echo "error" . mysqli_error($conn);
  }


}
// for edit start from here

// else{
  //  $sno =$_REQUEST["sno"];
  //  echo $sno;
  //  $sql2="SELECT * FROM `notes` where sno={$sno}";
  //   $result2=mysqli_query($conn,$sql2);
  //    $user= mysqli_fetch_assoc($result2);
  //   print_r($user);

// }



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP CRUD OPERATION</title>
    
  </head>
  <body>
    <!-- edit modal start -->
    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit Modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form action="/crud/index.php" method= "POST">
          <div class="mb-3">
            <label for="title" class="form-label">Note Title</label>
            <input type="text" class="form-control" id="titleEdit" name="titleEdit"  aria-describedby="emailHelp">
        
          <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Note Descroption</label>
          <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"  rows="3"></textarea>
        </div>
          
          <button type="submit" class="btn btn-primary">Add Note</button>
        </form> -->
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                <!-- edit modal end -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sami's Notebook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li><li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a> -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul> -->
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container my-3">
  
    <h2>Add a Note</h2>
    <form action="/crud/index.php" method= "POST">
  <div class="mb-3">
    <label for="title" class="form-label">Note Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">

  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Note Descroption</label>
  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
</div>

  <button type="submit" class="btn btn-primary">Add Note</button>
</form>
  
</form>
<div class="container">
  

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sql="SELECT * FROM `notes`" ;
  $result = mysqli_query($conn,$sql);
  // $sno= 0 ;
  while($row=mysqli_fetch_assoc($result))
  {
    // $sno = $sno + 1;
    echo   "<tr>
    <th scope='row'> ".$row['sno'] ."</th>
    <td>".$row['title'] ."</td>
    <td>".$row['description'] ."</td>
    <td> <a href='/crud/edit2.php?sno=".$row['sno'] ."'> Edit </a><br> <a href= '/crud/delete.php?sno=".$row['sno']."'>Delete</a> </td>

    
  </tr>" ;
    
  } 
  
  ?>
   
    
  </tbody> 
</table>
  
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <!-- <script>
     edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        
        titleEdit.value=title;
        descriptionEdit.value=description;
        $('#editModal').modal('toggle');
        })
      }) 

    </script>  -->
  </body>
</html>