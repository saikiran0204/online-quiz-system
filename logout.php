<?php 
include_once 'conn.php';
session_start();
$name=$_SESSION['name'];
$team=$_SESSION['team'];

$query="INSERT INTO `logout`(`name`, `team`, `date`, `time`) VALUES ('$name','$team','$date','$time')";
mysqli_query($con1,$query);


if($_SESSION['login']==1){
session_destroy();}
header("location:index.php");
?>