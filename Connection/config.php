<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "alpha_db");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}   

else{
    echo "<script> alert('Connetion to Database Succesful!'); </script>";
}
?>