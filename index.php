<?php
echo "hi";
 session_start();
 $_SESSION['login']=0;
 $_SESSION['msg']="";
 $_SESSION['reg']=0;
 header("Location:my.html");
?>