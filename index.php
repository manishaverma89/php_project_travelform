<!-- PHP code -->

<!-- Making Database connection with Mysqli -->
<?php
$insert = false;
if (isset($_POST["firstname"]))
{
    // connection variables
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "trip_db";

// create a connection

$con = mysqli_connect($server,$username,$password,$dbname);

// check for connection success
if (!$con){
    die("connection to this databse failed due to " . mysqli_connect_error());
}
//echo "success connecting to this db";


// Inserting Data into a MySQL Database Table
// collect POST variables
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$email = $_POST['email'];
$mobileno = $_POST['mobilenumber'];
$addinfo = $_POST['additionalinformation'];





$sql = "INSERT INTO trip_form (fname, lname, gender, address, email, mobileno, addinfo, date) VALUES ('$fname', '$lname', '$gender', '$address', '$email', '$mobileno', '$addinfo',current_timestamp())";
// echo $sql;

// Execution
// Execute the query

if ($con->query($sql) == true){
    // echo "successfully inserted";
    // flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();   //close the database connection

}    // isset closed

?>

<!-- HTML Code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <img class="bg" src="bg.jpeg" alt="US Trip">
<div class="container">
      <h1>Welcome To US Trip Form</h1>
      <p> Enter Your Details And Submit This Form To Confirm Your Participation In The Trip </p>
     
     <?php
      if ($insert == true)
      {

     echo "<p class='submitMsg'> Thanx for submitting your form.We Are Happy To See You Joining Us For The US Trip </p>";
      
    }
        ?>
<form action="index.php" method="post"> 
  
<input type="text" name="firstname" id="fname" placeholder="Enter Your First Name"> 
<input type="text" name="lastname" id="lname" placeholder="Enter Your Last Name">
<input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
<input type="text" name="address" id="address" placeholder="Enter Your Address">
<input type="email" name="email" id="email" placeholder="Enter Your Email">
<input type="number" name="mobilenumber" id="mobilenumber" placeholder="Enter Your Mobile NUmber">
<textarea type="text" name="additionalinformation" id="addinfo" placeholder="Enter Any Additional Information Here" cols="30" rows="10"></textarea>
<button class="btn" type="submit">Submit</button>
<button class="btn" type="reset">Reset</button>








</form>




</div>

<script src="index.js"></script>
</body>
</html>






