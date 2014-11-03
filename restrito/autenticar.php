<?php 
session_start();
$_SESSION['adm'] = 'adm@123';
header("Location: arearestrita.php");
?>