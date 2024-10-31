<?php
require 'config.php';

if(!empty($_SESSION["id"])){
    header("Location: index.php");
}

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn,"SELECT * FROM user WHERE name = '$name' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
       echo
       "<script> alert('your name or Email has Aleardy taken');</script>";
    }
    else{
        if($password == $confirmpassword){
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO user VALUES('','$email','$name','$password','$date')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful');</script>";
        }
        else{
            echo
            "<script> alert('Password doesn't match');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form action="" class="" method="post" autocomplete="off">
        <input type="text" name="name" required value="" placeholder="Enter your name"><br>
        <input type="email" name="email" required value="" placeholder="Enter your email"><br>
        <input type="password" name="password" required value="" placeholder="Enter your password"><br>
        <input type="password" name="confirmpassword" id="" required value="" placeholder="Confirm your password"><br>
        <button type="submit" name="submit">Register</button>
    </form><br>
    <a href="login.php">login</a>
    
</body>
</html>