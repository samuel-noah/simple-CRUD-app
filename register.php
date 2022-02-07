<?php

include 'functions.php';

if (isset($_POST['register'])){

  if(registrasi($_POST)>0){
    echo "<script> a;ert('new user has been added') </script>";
  }else{
    echo mysqli_error($conn);
  }

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

    <title>CoWork | Home </title>
  </head>
  <body>
  <div class="container">
  <div class="row mt-5">
    <div class="col">
      <div class="mx-auto">
          <div class="row mt-3 mb-5">
              <div class="col">
                  <h1> Welcome to CoWork  </h1>
                  <h3>Find a Partner to Collaborate on a Project</h3>
                </div>
            </div>
        </div>
        <div class="left ">
        <form action="" method="POST">
          <div class="mb-4">
            <label for="Username" class="form-label">Username</label>
            <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" name="username">
          <div class="mb-4">
            <div class="mb-4 mt-3 ml-10">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
          <div>
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
          </div>
          <div>
              <label for="exampleInputPassword2" class="form-label"> Confirm Password</label>
              <input type="password" class="form-control" id="exampleInputPassword2" name="password2">
          </div>
          <br>
            <button type="submit" class="btn btn-primary"name='register'>Submit</button>
          </form>
          <h5>Already have an account? Log In <a href="login.php">Here</a></h5>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>