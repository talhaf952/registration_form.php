<?php
    include("db.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    function sendMail($email,$reset_token)
    {
        require('PHPMailer/PHPMailer.php');
        require('PHPMailer/SMTP.php');
        require('PHPMailer/Exception.php');

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'bsef20a524@pucit.edu.pk';                     //SMTP username
            $mail->Password   = 'rmtfRMTF';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('bsef20a524@pucit.edu.pk', 'Learner Hub');
            $mail->addAddress($email);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Password reset link from Learner Hub';
            $mail->Body    = "Your request to reset password has been approved.<br>
            You can create new password by using the link below.
            <a href='http://localhost/forms/update.php?email=$email&reset_token=$reset_token'>Reset Password</a>";
        
            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    if(isset($_POST['send-reset-link']))
    {
        $query="SELECT * FROM `form` WHERE email='$_POST[email]'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $reset_token=bin2hex(random_bytes(16));
                date_default_timezone_set('Asia/Karachi');
                $date=date("y-m-d");
                $query="UPDATE form SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE email='$_POST[email]'";
                if(mysqli_query($conn,$query) && sendMail($_POST['email'],$reset_token))
                {
                    echo"
                    <script>
                        alert('Password Reset link send to your Email');
                        window.location.href='forgot.php';
                    </script>";
                }
                else
                {
                    echo"
                    <script>
                        alert('Server down! Try again later.');
                        window.location.href='error.php';
                    </script>";
                }
            }
            else
            {
                echo"
            <script>
                alert('Email not found');
                window.location.href='forgot.php';
            </script>";
            }
        }
        else
        {
            echo"
            <script>
                alert('Cannot run query');
                window.location.href='error.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="login">
        <h1>Forgot Password</h1>
        <form method="POST">
            <label>Email</label>
            <input type="text" name="email" required>
            <input type="submit" name="send-reset-link" value="Send Link">
            <p> <a href="login.php">Back to Login</a></p>
        </form>
    </div>
</body>