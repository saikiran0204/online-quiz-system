<?php
@session_start();
 if($_SESSION['login']!=1 AND isset($_SESSION['login'])){
header("location:index.html");
}
?>