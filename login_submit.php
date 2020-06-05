<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ("includes/common.php");

$password = mysqli_real_escape_string($con,$_POST['password']);
$email = mysqli_real_escape_string($con,$_POST['email_id']);

$query1 = "SELECT * FROM users WHERE email_id='$email' AND password='$password'";
$result1= mysqli_query($con, $query1) or die(mysqli_error($con));
$row1= mysqli_fetch_array($result1);

if(mysqli_num_rows($result1)!=1)
{
    $message1 = "Incorrect email or password";
    echo "<script type='text/javascript'>alert('$message1');</script>";
}

else
{
    $_SESSION['id']=$row1['id'];
    $_SESSION['name']=$row1['name'];
    echo $_SESSION['id'];
    header('location: index.php');
    
}

?>