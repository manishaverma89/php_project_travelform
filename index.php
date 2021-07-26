
<!-- Making Database connection with Mysqli -->
<?php

$server = "localhost";
$username = "root";
$password = "root";
$con = mysqli_connect($server,$username,$password);

if (!$con){
    die("connection to this databse failed due to " . mysqli_connect_error());
}
//echo "success connecting to this db";


?>