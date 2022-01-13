<?php
$insert =false;

if(isset($_POST['name'])){
// Set connnection variables
$server = "localhost";
$username = "root";
$password = "";

// Create database connection
$con = mysqli_connect($server,$username,$password);

// Check for connection success
if(!$con){
    die("connection to this database failed due to " . mysqli_connect_error());
}
// Collect post variables
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `trip`.`trip`  (`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//  echo $sql;

// Execute the query
 if($con -> query($sql) == true){
    //  Flag for successful insertion
    //  echo "Successfully inserted.";
    $insert = true;
 }
 else{
     echo "Error : $sql <br> $con->error";
 }

//  Close the database connection
 $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip Form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>

        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for   submitting your form, We are happy to see you joining us for the US trip</p> ";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name ">
            <input type="text" name="age" id="age" placeholder="Enter your age ">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender ">
            <input type="email" name="email" id="email" placeholder="Enter your e-mail ">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone ">
            <textarea name="desc" id="desc" cols="30" rows="10" 
            placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
    <!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('1', 'test name', '21', 'male', 'absds2abc.com', '9855561155', 'this is my first php database', current_timestamp()); -->
</body>
</html>