<?php
echo "<script> alert('Logging out...'); </script>";
session_start();
$_SESSION = array();
session_destroy();
header("Location: Login_v2.php");
exit;
?>
