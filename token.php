<?php
    session_start();
    include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Code Sent to Your Email</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="login">
        <h1>Enter Code Sent</h1>
        <form method="POST">
            <label>Code</label>
            <input type="text" name="code" required>
            <input type="submit" name="" value="Continue">
        </form>
    </div>
</body>
