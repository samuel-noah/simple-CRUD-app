<?php

session_start();



if (isset($_SESSION["login"])){
    
    
    header("Location: index.php");
    exit;
}


require 'functions.php';

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $_SESSION["user"] = $_POST["username"];
    
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");
    
    if (mysqli_num_rows($result)=== 1){

        //cek password 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password , $row['password'])){



            //set session 
            $_SESSION["login"] = true;



            header("Location: index.php");
            exit;
        }

    }

    $error = true;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Login Cowork</title>
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
                    <?php if(isset($error)):
                        echo '<div class="alert alert-danger" role="alert">
                                Username/Password Salah
                                </div>';
                    ?>
                    <?php endif; ?>
                <form action="" method="POST">
                <div class="mb-4">
                    <label for="Username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="Username" aria-describedby="emailHelp" name="username">
                    </div>
                <div>
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div> <br>
                    <button type="submit" class="btn btn-primary"name='login'>Login</button>
                </form>
                </div>
                <h5>Do not have an account? Sign Up <a href="register.php">Here</a></h5>
            <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>