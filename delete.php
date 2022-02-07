<?php
session_start();

if (!isset($_SESSION["login"])){

  header("Location: login.php");
}
require 'functions.php';


$id = $_GET["id"];

if (delete($id) >0){
        echo "<script>
            alert('sucssesfuly deletes the data!');
            document.location.href = 'index.php'
            </script>";
}else{
        

    echo'<div class="alert alert-danger" role="alert">
        Error! <?= echo mysqli_error($conn) ?>
        </div>';    
}
    
?>