<?php
include_once 'known.php';

function next1(){
	include_once 'conn.php';
$_SESSION['question']=$_SESSION['question']-1;
if($_SESSION['question']<=0)
{
$_SESSION['question']=3;
}
$qno1=$_SESSION['question'];
$name=$_SESSION['name'];
$round=$_SESSION['round'];

$query1="SELECT * FROM correct WHERE name='$name' AND round='$round' AND qno='$qno1'";
$r1=mysqli_query($con,$query1);
$num2=mysqli_num_rows($r1);
if($num2!=0)
{
   header("location:prev.php"); 
  // echo "22";
}
else
{
	header("Location:begin.php");
}
//echo $_SESSION['question']." ".$_SESSION['round'];
}
next1();

?>