<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ('includes/common.php');
if(isset($_GET['submit']))
{
    $comment = mysqli_real_escape_string($con,$_GET['comment']);
    if($comment!="")
    {
        if(isset($_SESSION['id']))
        {
            $comment = mysqli_real_escape_string($con,$_GET['comment']);
            $u_id = $_SESSION['id'];
            $blog_id = $_GET['blog_id'];
            $query1 = "INSERT INTO comments (blog_id,user_id,comment) VALUES('$blog_id','$u_id','$comment')";
            $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
            echo "commented";
        }  
        else 
        {
            header('location: login.php');
        }
    }
    else
    {
        header('location: index.php');
    }
}


