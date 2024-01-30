<?php
    session_start();
    include("db.php");

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $user=$_POST['name'];
        $gmail=$_POST['mail'];
        $pswd=$_POST['pass'];
        $cnfrm=$_POST['cpass'];

        if(!empty($gmail) && !empty($pswd) && !empty($cnfrm) && !is_numeric($gmail))
        {
            $sql="INSERT INTO `form` (`username`, `email`, `password`, `confirm`) VALUES ('$user', '$gmail', '$pswd', '$cnfrm')";
            mysqli_query($conn,$sql);
            echo "<script type='text/javascript'>alert('Successfully Registered')</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Please Enter Valid Information')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login and Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="name" required>
            <label>Email</label>
            <input type="text" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <label>Confirm Password</label>
            <input type="password" name="cpass" required >
            <input type="submit" name="" value="submit">
        </form>
        <p>BY clicking the Signup button, you agree to our<br><a href="#">Terms and Conditions.</a>and <a href="#">Privacy Policy</a></p>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
    
</body>
</html>