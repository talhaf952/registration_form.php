<?php
    session_start();    


    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $gmail=$_POST['mail'];
        $pswd=$_POST['pass'];

        if(!empty($gmail) && !empty($pswd) && !is_numeric($gmail))
        {
            $sql="SELECT * FROM form WHERE email='$gmail' limit 1";
            $result=mysqli_query($conn,$sql);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data=mysqli_fetch_assoc($result);

                    if($user_data['pass']==$password)
                    {
                        header("location: index.php");
                        die;
                    }
                }
            }
                echo "<script type='text/javascript'>alert('Wrong Email or Password')</script>";
        }
        else{
        echo "<script type='text/javascript'>alert('Wrong Email or Password')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST">
            <label>Email</label>
            <input type="text" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <a href="forgot.php">Forgot Your Password?</a>
            <input type="submit" name="" value="submit">
        </form>
        <p>Not have an account? <a href="signup.php">Sign Up Here</a></p>
    </div>
</body>
</html>
