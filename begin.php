<?php
include 'conn.php';
include_once 'known.php';

echo '<form name="form3" action="account.php" method="post">
                    <input type="submit" value="account">
                    </form>';

if(!isset($_SESSION['round'])){
header("location:index.html");
}
$qno1=$_SESSION['question'];
$name=$_SESSION['name'];
$round=$_SESSION['round'];
$team=$_SESSION['team'];
if($_SESSION['start']==0){
  $query4= "INSERT INTO `start`(`name`, `team`, `round`, `date`, `time`) VALUES ('$name','$team','$round','$date','$time')";
  mysqli_query($con1,$query4);
 $_SESSION['start']=1;
}

$query1="SELECT * FROM correct WHERE round='$round' AND team='$team'";
$r1=mysqli_query($con,$query1);
@$num2=mysqli_num_rows($r1);
if($num2>=3)
{
    header("location:account.php");
    exit();
}
else{
$query1="SELECT * FROM correct WHERE round='$round' AND qno='$qno1' AND team='$team'";
$r1=mysqli_query($con,$query1);
@$num2=mysqli_num_rows($r1);
if($num2>0){
        header("location:next.php");
        exit();
}

}


$query="SELECT `start_time` FROM `start` WHERE team='$team' AND round='$round'";
$r=mysqli_query($con,$query);
@$num=mysqli_num_rows($r);

if($num==0)
{
    $query="INSERT INTO `start` VALUES ('$team','$time','$round')";
    $r=mysqli_query($con,$query); 
    $rem=600;

}
else{
    while($row = mysqli_fetch_array($r))
        {
            if(isset($row['start_time']))
            {
                $now=strtotime(strftime($time));
                $constant=strtotime(strftime($row['start_time']))+600;
                $rem=$constant-$now;
                #echo "<br>".$now."<br>".$constant."<br>".date($row['start_time']);
                if($rem<=0)
                {
                    echo "expired";
                    exit();
                }
            }
        }
}
echo $_SESSION['msg'];
$_SESSION['msg']='';
echo "<html><body><script>var x=".json_encode($rem).";</script>";
echo '<form name="form2" action="logout.php" method="post">
<input type="submit" value="log out">
</form>';
echo '<h1 id="demo"></h1> 
<script>

console.log(x);
function my2(){
    document.getElementById("submit").click();
   

}
function showTime() {
    x=x-1;
    var sec=x%60;
    var min=Math.floor(x/60);
    document.getElementById("demo").innerHTML = min+":"+sec;
    if(x<=0){
        setTimeout(my2(), 1000);
        
    }
}
setInterval(showTime, 1000);
</script></html>';
 


include_once 'question.php';
question($qno1);

$opt=$_SESSION['opt'];
if($opt==1)
{
    echo "CORRECT";
}
elseif($opt==2)
{
    echo "already typed";
}
elseif($opt==3)
{
    echo "incorrect answer";
}
else
{
    echo "";
}

echo "<form action='submit.php' method='post'><br><textarea id='t1' name='t1' rows = '5' cols = '50' name = 'description'>";
    echo "</textarea><input id='submit' name='submit' type='submit' value='submit' required></form>";
    echo "<form method='post' action='prev.php'><input type='submit' name='prev1' value='previous'></form>";
    echo "<form method='post' action='next.php'><input type='submit' name='next1' value='next'></form>";
   # echo "answer:".$_SESSION['qid'];
$_SESSION['opt']=0;
echo "</body></html>";
?>