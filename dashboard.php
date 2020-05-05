<?php
include_once 'conn.php';
$count=0;
$query="INSERT INTO `dashboard`(`date`, `time`, `ip`, `about`) VALUES ('$date','$time','$ip','$about')";
	mysqli_query($con1,$query);


$query="SELECT * FROM dashboard ORDER BY score DESC,time ASC";
$r=mysqli_query($con,$query);
echo "<html><body><table border=1><tr><th>S.NO</th><th>name</th><th>score</th><th>total time</th></tr>";
while($row1 = mysqli_fetch_array($r))
{
	$count++;
	echo "<tr><td>$count</td><td> ".$row1['team']." </td><td>   ".$row1['score']."  </td><td>    ".$row1['time']."</td></tr> ";
}
echo "</table></body></html>";
?>