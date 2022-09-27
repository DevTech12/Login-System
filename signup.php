<?php
$showAlert = false; 
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){

include 'partial/_dbconnect.php';
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
// $exist = false;
// Check whether this user existed 
$existSql = "SELECT * FROM `userinfo` WHERE username = '$username'";
$results = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($results);
if($numExistRows > 0){
  // $exist = true;
  $showError = " You are already a user";
}
else {
  // $exist = false;

    if (($password == $cpassword)){
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO `userinfo` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";

    $result = mysqli_query($conn, $sql);
    if ($result){
        $showAlert = true;
      } 
    }
    else {
        $showError = " Password is incorrect ";
    }
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

    <title>Sign Up</title>
  </head>
  <body>
    <!-- Navbar  -->
    <?php
    require 'partial/_nav.php'
    ?>
    <!-- Alert -->
    <?php
    if ($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your Account ID created successfully.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
    <h1 class="text-center">Sign Up to our Website</h1>
    <form  action="/LoginSystem/signup.php" method="POST">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="form-group">
    <label for="cpassword">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
    <small id="emailHelp" class="form-text text-muted">Make sure to type same password</small>
  </div>
  
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html> 