<?php
$server = "sql100.epizy.com";
$username = "epiz_28526059";
$password = "5yA0Yn2KdgRZx";
$database = "epiz_28526059_tillmark";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>
