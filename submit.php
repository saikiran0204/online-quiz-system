<?php
include_once 'conn.php';
include_once 'known.php';

$ans=$_POST['t1'];
$name=$_SESSION['name'];
$round=$_SESSION['round'];
$question=$_SESSION['question'];

$time1=strtotime($time);
$team=$_SESSION['team'];
$qid=$_SESSION['qid'];
$qu="INSERT INTO `submit`(`name`, `team`, `round`, `questionid`, `answer`, `time`, `date`) VALUES ('$name','$team',$round,$qid,'$ans','$time','$date')";
mysqli_query($con1,$qu);

$query="SELECT `start_time` FROM `start` WHERE team='$team' AND round='$round'";
$r=mysqli_query($con,$query);
$num=mysqli_num_rows($r);

if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	$_SESSION['msg']="";
}

if($num==0)
{
    header("Location:account.php");
    exit();
}
else{
	$ro = mysqli_fetch_array($r);
	$start1=$time1-strtotime($ro['start_time']);
	//echo $start1." start  ";
	if($start1>610)
	{
		exit("time out");
	}
}

$que="SELECT * FROM `answer` WHERE questionid=$qid";
$r3=mysqli_query($con,$que);
 $query="SELECT * FROM `correct` WHERE qid=$qid AND team='$team'";
$r2=mysqli_query($con,$query);
$num=mysqli_num_rows($r2);
$row5=mysqli_fetch_array($r2);
if($num==0)
{
while($row = mysqli_fetch_array($r3))
        {
            if($row['answer']==$ans)
            {
            	
               
				
					
					$query="INSERT INTO `correct`(`name`, `team`, `qid`, `round`, `qno`, `answer`, `time`) VALUES ('$name','$team',$qid,$round,$question,'$ans','$time')";
					$r=mysqli_query($con,$query);

					$query="SELECT * FROM `dashboard` WHERE team='$team'";
					$r=mysqli_query($con,$query);
					$row1=mysqli_fetch_array($r);
					$t=$row1['time']+$start1;
					$score=$row1['score']+1;
					//echo " score ".$score."   row".$row1['score'];
					$query="UPDATE `dashboard` SET `score`=$score,`time`=$t  WHERE team='$team'";
					$r=mysqli_query($con,$query);
					//echo "CORRECT";
					$_SESSION['msg']="correct";
					header("Location:next.php");
					exit();


				}
				else
				{
					//echo "incorrect answer";
            	$_SESSION['msg']="incorrect answer";
            	//echo $_SESSION['msg'];
            	header("Location:begin.php");
            	exit();
				}
            }
            
        }
else{
   	//echo "already typed";
	$_SESSION['msg']="already typed by ".$row5['name'];
	//echo $_SESSION['msg'];
	header("Location:next.php");
	exit();
            	
            }

?>