<?php
include_once 'conn.php';
$_SESSION['opt']=0;
$user=strtolower($_POST['username']);
$pass=$_POST['password'];

if($con)
{	
	date_default_timezone_set("Asia/Kolkata");
	$date = date("d/m/Y");
	$time=date("H:i:sa");
	$loggin="INSERT INTO `login`(`name`, `password`, `date`, `time`, `ip_address`, `device`, `about_browser`, `os`) VALUES ('$user','$pass','$date','$time','$ip','$device','$about','$os')";
	mysqli_query($con1,$loggin);
	$query="SELECT * FROM `users` WHERE name='$user'";
	$r=mysqli_query($con,$query);
	@$num=mysqli_num_rows($r);
	if($num==0)
	{
		$_SESSION['msg']="user NOT found";
		header("Location:my.html");
		exit();
	}
	else
	{	
		
		 while($row = mysqli_fetch_array($r))
		{
			echo $row['password'];
			if($row['password']=="$pass")
			{
				$_SESSION['team']=$row['team'];
				$_SESSION['name']=$user;
				$_SESSION['login']=1;
				header("location:account.php");
				exit();
			}
			
		}
	}
	$_SESSION['msg']="invalid password";
	header("Location:my.html");
}
?>