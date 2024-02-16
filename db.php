<?php
$servername="localhost";
$username="root";
$password="";
$database="register";
$conn=mysqli_connect($servername,$username,$password, $database);
// if(!$conn)
// {
//     die("Sorry, Not connected.".mysqli_connect_error());
// }
// else{
//     echo"Connected Successfully!";
// }

// $sql="create database register";
// $result=mysqli_query($conn, $sql);

// if($result){
//     echo "Database created Successfully.\n";
// }
// else{
//     echo "Dataase was not created because of this error->".mysqli_error($conn);
// }

// $sql="CREATE TABLE `register`.`login` (`Id` INT(255) NOT NULL AUTO_INCREMENT , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB";
// $result=mysqli_query($conn,$sql);
// if($result){
//     echo "Table created Successfully.\n";
// }
// else{
//     echo "Table was not created becaus of this error->".mysqli_error($conn);
// }
?>
