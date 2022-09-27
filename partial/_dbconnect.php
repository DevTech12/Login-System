<?php
// connecting to the server
$servername = "localhost";
$username = "root";
$password = "";
$database = "dsecure";

// making a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// die the connection
if (!$conn){
    die ("Error". mysqli_connect_error());
 } 
//  else{
//     echo "Success";
// }
// echo "<br>";
?>
