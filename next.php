<?php
include_once 'known.php';
function next1(){
$_SESSION['question']=$_SESSION['question']+1;
if($_SESSION['question']>3)
{
$_SESSION['question']=1;
}
}
next1();
header("Location:begin.php");
?>