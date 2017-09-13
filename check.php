<?php
session_start();
include('config.php');
$user_check=$_SESSION['username'];
 
$sql = mysqli_query($con,"SELECT username, name FROM user WHERE username='$user_check' ");

$row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
 
$username=$row['username'];

$_SESSION['username']=$row['username'];

$_SESSION['name']=$row['name'];
 
if(empty($username))
{
header("Location: index.php");
}
?>