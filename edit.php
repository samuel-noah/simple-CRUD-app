<?php
session_start();

if (!isset($_SESSION["login"])){

  header("Location: login.php");
}

require 'functions.php';

// query data berdasarkan id 
$id = $_GET['id'];

$projects = query("SELECT * FROM project WHERE id = $id")[0];
// var_dump($projects);



 //cek apakah tombol submit sudah ditekan atau belum 
 if (isset($_POST["submit"])){

   
    //cek keberhasilan ubah data
    if (edit($_POST) > 0){
      echo "<div class= 'alert alert-success' role='alert'>
            success!<script> document.location.href ='index.php'
            </script>
            </div>";
    }else{
      echo'<div class="alert alert-danger" role="alert">
          Error! 
          </div>'. mysqli_error($conn);
    }
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cowork | Edit Projects </title>
</head>
<body>
<div class="container">
  <div class="row mt-5">
    <div class="col">
    
      <h1>Edit Selected Projects Idea!</h1>

    </div>
</div>
    
    <!-- Optional JavaScript; choose one of the two! -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="#">Cowork</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Project</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="insert.php">Insert</a>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type='hidden' name='id' value="<?= $projects['id']; ?>" >
        <input type='hidden' name='gambarLama' value="<?= $projects['picture']; ?>" >
        <div class="mb-3 mt-5 ml-5">
          <label for="Name" class="form-label">Name</label>
          <input type="text" class="form-control" id="Name"  name="nama" value="<?= $projects['nama'];?>" required >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Title</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?= $projects['title'];?>"required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <input type="text" id="exampleFormTextArea1" name="descript" class="form-control" value="<?= $projects['descript'];?>" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Picture</label>
            <img src="img/<?= $projects['picture']?>" width="100px" class="mb-3"> 
            <input class="form-control" type="file" id="formFile" name="picture" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Contact</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="contact" value="<?= $projects['contact'];?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('are you sure?');">Edit</button>
    </form>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>



