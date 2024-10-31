<?php
   require 'config.php';
   
   if(!empty($_SESSION["id"])){
    header("Location: index.php");
   }
   if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE name = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
           $_SESSION["login"] = true;
           $_SESSION["id"] = $row["user_id"];
           header("Location: index.php");
        }
        else{
            echo
            "<script> alert('wrong password');</script>";
        }
    }
    else{
        echo
        "<script> alert('User Not Registered'); </script>";
    }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form action="" class="" method="post" autocomplete="off">
        <input type="text" name="usernameemail" required value="" placeholder="Enter your username or email"><br>
        <input type="password" name="password" required value="" placeholder="Enter your password"><br>
        <button type="submit" name="submit"> Login </button>
    </form><br>
    <a href="registration.php">Registration</a>
</body>
</html>