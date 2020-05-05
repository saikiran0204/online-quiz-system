<?php
include_once 'UserInfo.php';
$about=get_user_agent();    
$ip=get_ip();
$device=get_device();
$os=get_os();

date_default_timezone_set("Asia/Kolkata");
$date = date("d/m/Y");
$time=date("H:i:s");
$start=strtotime(date('00:00:00'));
//echo $start;
@session_start();

@$con=mysqli_connect("127.0.0.1","root","","test1");
@$con1=mysqli_connect("127.0.0.1","root","","zlog");
if(!$con || !$con1)
{
echo "could not connect" ;
}
?>