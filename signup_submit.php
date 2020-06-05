<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ("includes/common.php");

$name = mysqli_real_escape_string($con,$_POST['name']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$email = mysqli_real_escape_string($con,$_POST['email_id']);
$username = mysqli_real_escape_string($con,$_POST['username']);

$query1 = "SELECT email_id FROM users WHERE email_id='$email'";
$result1= mysqli_query($con, $query1) or die(mysqli_error($con));

if(mysqli_num_rows($result1)>0)
{
    $message1 = "Email already exists";
    echo "<script type='text/javascript'>alert('$message1');</script>";
}

else
{
    $query2 = "SELECT email_id FROM users WHERE username='$username'";
    $result2= mysqli_query($con, $query2) or die(mysqli_error($con));
    if(mysqli_num_rows($result2)!=0)
    {
        $message2 = "Username already taken";
        echo "<script type='text/javascript'>alert('$message2');</script>";
    }
    else
    {
        $query3 = "INSERT into users (name,email_id,password,username) VALUES ('$name','$email','$password','$username')";
        $result3 = mysqli_query($con, $query3) or die(mysqli_error($con)); 
        $message3 = "Log in to continue";
        echo "<script type='text/javascript'>alert('$message3');</script>";
    }
    
}


