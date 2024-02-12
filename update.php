<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>

    <?php
        include("db.php");
        if(isset($_GET['email'])&& isset($_GET['reset_token']))
        {
            date_default_timezone_set('Asia/Karachi');
            $date=date("y-m-d");
            $query="SELECT * from form WHERE 'email'='$_GET[email]' AND 'resettoken'='$_GET[reset_token]' AND 'resettokenexpire'='$date'";
            $result=mysqli_query($conn,$query);
            if($result)
            {
                if(mysqli_num_rows($result)==1)
                {
                    echo"
                    <form>
                        <h3>create New Password</h3>
                            <input type='password' placeholder='New Password' name='Password'>
                            <input type='password' placeholder='Confirm New Password' name='ConfirmPassword'>
                            <button type='submit' name='updatepassword'>Update Password</button>
                            <input type='hidden' name='email' value='$_GET[email'>
                    </form>
                    ";
                }
                else
                {
                    echo"
                <script>
                    alert('Invalid or expired link.');
                    window.locationf.href='error.php';
                </script>
                ";
                }
            }
            else
            {
                echo"
                <script>
                    alert('Server down! Try again later');
                    window.location.href='forgot.php';
                </script>
                ";

            }
        }
    ?>

</body>
</html>
