<?php
$c=0;

function question($c)
{
    include 'conn.php';
    $round=$_SESSION['round'];
    $query="SELECT * FROM question WHERE round=$round ORDER BY qno";
    $r=mysqli_query($con,$query);
    $question="";
    $qno=0;
    //echo $c;
    @$num=mysqli_num_rows($r);
	if($num==0)
	{
		exit("no questions");
	}

    while($row1 = mysqli_fetch_array($r))
    {	
    	//echo "$c";
        if($row1['qno']==$c)
        {
            $question=$row1['question'];
            $qno=$row1['qno'];
            $_SESSION['qid']=$row1['id'];
        }
    }
    echo "<p id='p1'></p>";
    echo "<script>var question=".json_encode($question).";";
    echo	"var qno=".json_encode($qno).";
    		document.getElementById('p1').innerHTML=qno+'.'+question</script>";
   
}


?>