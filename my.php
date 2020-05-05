<?php
echo '<html>
  <head>
    <title>quiz</title>
    
  </head>
  <body>
  	
   <form name="from1" method="post" action="login.php">
       <input type="text" name="username" id="username" placeholder="user" required/>
    			<br>
    			<input type="password" name="password" id="password" placeholder="Password" required/>
    			<br>

    			<input type="submit" class="button" value="Log In"/>

</form> 
 <form action="dashboard.php">
<input type="submit" class="button" value="dashboard"/>
 </form>
 <form action="register.php">
<input type="submit" class="button" value="register"/>
 
</html>'; 
    session_start();
    if($_SESSION['opt']==4)
    {
        echo "user already registered";
    }
    elseif($_SESSION["opt"]==6){
      echo "user registered succesful";
    }
    $_SESSION['opt']=0;
    $_SESSION['reg']=0;
?>