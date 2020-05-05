<?php
include_once 'known.php';
include_once 'conn.php';
echo "logged in";
echo '<html>
<body>
<form name="form2" action="logout.php" method="post">
<input type="submit" value="log out">
</form>';
$team=$_SESSION['team'];
$name=$_SESSION['name'];
echo "welcome ".$name." from team ".$team;
date_default_timezone_set('Asia/Kolkata');
$time=strtotime(date("H:i:s"));
$constant=strtotime(date('21:52:00')); # change time for start
$s=strtotime(date('00:00:00'));
$diff=$time-$constant;
//echo $diff."<br>".$time."<br>".$constant."<br>";

$query="SELECT * FROM `rounds` ORDER BY id";
$r=mysqli_query($con,$query);

 while($row = mysqli_fetch_array($r))
        {
            if(isset($row['id']))
            {

            	$start=strtotime($row['start_time'])-$s;
            	$end=strtotime($row['end_time'])-$s;
                echo "<br>round ".$row['id'];
                if($diff>=$start && $diff<=$end)
                {
                    $round=$row['id'];
                    $query1="SELECT * FROM correct WHERE name='$name' AND round='$round'";
                    $r1=mysqli_query($con,$query1);
                    @$num2=mysqli_num_rows($r1);
                    if($num2>=3)
                    {
                        echo "completed";
                       // header("location:account.php");
                     
                    }else{
                	$_SESSION['round']=$row['id'];
                	echo '<form name="form3" action="begin.php" method="post">
                	<input type="submit" value="start">
                	</form>';
                    $_SESSION['question']=1;
                    $_SESSION['start']=0;
                }
                }
                elseif($diff<$start)
                {
                	$start=$start-$diff;
                    $min=intval($start/60);
                    $min2=$min%60;
                    $hour2=intval($min/60);
                    echo "   going to start after   ".$hour2.":".$min2.":".$start%60;
                }
                else
                {
                	$end=$diff-$end;
                	$sec=$diff%60;
                	$end=intval($end/60);
                	$hour=intval($end/60);
                	$min=$end%60;
                	echo "overed ".$hour.":".$min.":".$sec;
                }
             
            }
        }

echo '</body>
</html><br>';
echo $_SESSION['msg'];
$_SESSION['msg']="";

?>

 
