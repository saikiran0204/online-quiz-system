<?php
include_once 'conn.php';


$name=strtolower($_POST['name']);
$team=strtolower($_POST['team']);
$mail=$_POST['mail'];
$password=$_POST['password'];

$query="INSERT INTO `register`(`name`, `password`, `team`, `ip`, `about`, `date`, `time`) VALUES ('$name','$password','$team','$ip','$about','$date','$time')";
 mysqli_query($con1,$query); 


$query="SELECT * FROM register WHERE name='$name' AND team='$team'";
$r=mysqli_query($con,$query);
@$num1=mysqli_num_rows($r);


if($num1==0)
{
	$_SESSION['msg']="not a valid user";
	header("Location:register.html");
	
}else{
$row1 = mysqli_fetch_array($r);
if($row1['reg']==0)
{
	$query="UPDATE `register` SET `reg`=1,`date`='$date',`time`='$time',`ip`='$ip',`about`='$about' WHERE name='$name' AND team='$team'";
	mysqli_query($con,$query);
	

	$query3="INSERT INTO `users`(`name`, `team`, `mail`, `password`) VALUES ('$name','$team','$mail','$password')";
	mysqli_query($con,$query3);

	$query="SELECT * FROM `dashboard` WHERE team='$team'";
	$r=mysqli_query($con,$query);
	@$num=mysqli_num_rows($r);
	//echo $num."<br>";
	if($num==0){
		$query2="INSERT INTO `dashboard`(team, `score`, `time`) VALUES ('$team',0,0)";
  		$r2=mysqli_query($con,$query2); 

  		//echo $r2."kjbdv<br>".$query2;
	}
	$_SESSION['msg']="user registed sucessfully";
	header("Location:my.html");
}
else
{	
	$_SESSION['msg']="user already registered";
	header("Location:my.html");
}

}


?>