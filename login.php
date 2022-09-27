<?php
$login = false; 
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){

include 'partial/_dbconnect.php';
$username = $_POST['username'];
$password = $_POST['password'];

    // $sql = "Select * from userinfo where username='$username' AND password='$password'";
    $sql = "Select * from userinfo where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1){
      while($row = mysqli_fetch_assoc($result)){
        if (password_verify($password, $row['password'])){
         $login = true; 
         session_start();
         $_SESSION['loggedin'] = true;
         $_SESSION['username'] = $username;
         header ("location: welcome.php");
        }
        else {
          $showError = " Invailid Input";
        }
      }   
    } 
    else {
        $showError = " Invailid Input";
    }
  }


?>



<!-- Bootstrap Sample Code -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <!-- Navbar  -->
    <?php
    require 'partial/_nav.php'
    ?>
    <!-- Alert -->
    <?php
    if ($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You Logged in successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }

    if ($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>'. $showError.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
?>
   <!-- Form -->
<div class="container my-4">
    <h1 class="text-center">Login to our Website</h1>
    <form  action="/LoginSystem/login.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div> 

  
  <button type="submit" class="btn btn-primary">Log In</button>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html> 

<!-- 
1) user - admin 
   pass - 1234 -->