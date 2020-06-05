<?php
include_once ("includes/common.php");

/*$title = mysqli_real_escape_string($con,$_POST['title']);
$message = mysqli_real_escape_string($con,$_POST['message']);
$u_id = $_SESSION['id'];

echo $u_id;
echo "<br>".$title."<br>";
echo $message;
//$query1 = "INSERT INTO blogs(user_id,title,message,short) VALUES('$u_id','$title','$message','$message'";
//$result1= mysqli_query($con, $query1) or die(mysqli_error($con));

*/
extract($_POST);
if (isset($post))
{
    $t=time();
    $time=date("Y-m-d",$t);
    $u_id = $_SESSION['id'];
    $msg1 = $blog;
    $msg = mysqli_real_escape_string($con,$_POST['blog']);
    $query1 = "INSERT INTO blogs(user_id,title,message,short,time) VALUES('$u_id','$title','$msg','$msg','$time')";
    $result1= mysqli_query($con, $query1) or die(mysqli_error($con));
    header ('location:user.php');
}