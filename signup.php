<?php
include_once ("includes/common.php");
if(isset($_SESSION['id']))
{
    include_once ('includes/navlogin.php');
    header('location: index.php');
}
else 
{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>
        <title>
            
        </title>
        <link rel="stylesheet" type="text/css" href="includes/bootstrap.css">
        <script src="includes/bootstrap.bundle.min.js"></script>
        <script src="includes/bootstrap.min.js"></script>
    <body>
        <div class="container">
            <?php
            include_once ('includes/nav.php');
}
            ?>
            
            <div style="margin-top: auto:">
                <div class="row">
                    <div class="offset-md-2 col-md-8 offset-lg-3 col-lg-6 col-sm-12">
                        <div class="jumbotron">
                            <form action="signup_submit.php" method="POST">
                                <div class="form-group">
                                    <input type="text" placeholder="Full Name" class="form-control" name="name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="E-mail" class="form-control" name="email_id" required="">
                                </div>
                                <div class="form-group">    
                                    <input type="password" placeholder="Password (must contain atleast one special character)" class="form-control" name="password" required="" minlength="8" pattern="^(?=.*?[a-z])(?=.*?[#?!@$%^&*-]).{8,}$">
                                </div>
                                <div class="form-group">
                                    <input type="text" placeholder="Username" class="form-control" name="username" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value ="Sign Up" class="btn btn-success form-control">
                                </div>
                            </form>
                            <center><h4>OR</h4></center>
                            <form action="login.php">
                                <div class="form-group">
                                    <input type="submit" value="Have an account. Log In" class="form-control btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </body>
</html>


