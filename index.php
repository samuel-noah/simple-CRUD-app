<?php
session_start();

if (!isset($_SESSION["login"])){

  header("Location: home.php");
}


include 'functions.php';
$project = query("SELECT * FROM project");

//ketika tombol cari di klik 
if (isset($_POST["search"])){
  $project = search($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="icon/CoWork.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cowork | Projects</title>
  </head>
  <body>
<div class="container">
  <div class="row mt-5">
    <div class="col">
      <h1>Projects</h1>

      </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <a class="navbar-brand" href="home.php">Cowork</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Project</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="insert.php">Insert</a>
            </li>
          </ul>
          <form action="" method="POST" class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" autofocus 
            placeholder="search keyword" autocomplete="off">
            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
          </form>
        </div>
      </div>
    </nav> <br>
    <h5>Welcome <?= $_SESSION["user"]; ?></h5>

    <a class="btn btn-primary" href="logout.php" role="button">Logout</a>

<div class="row">
      <?php
      foreach($project as $row):
      ?>
        <div class="col-md-3 my-5">
        <div class="card mt-3 " style="width: 18rem;">
          <img src="img/<?php echo $row['picture'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row["title"]?></h5>
            <h6 class="card-title"><?php echo $row["nama"]?></h6>
            <p class="card-text"><?php echo $row['descript']?></p>
            <h6 class="card-text"><?php echo $row["contact"]?></h6>
            <a href="edit.php?id=<?=$row['id']; ?>" class="btn btn-primary">Edit </a> 
            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('are you sure?');" class="btn btn-primary"> Delete </a> 
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      </div>
    </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>