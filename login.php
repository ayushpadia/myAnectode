<?php
include_once ("includes/common.php");
if(isset($_SESSION['id']))
{
    header('location: index.php');
}
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
    </head>
    <body>
        <div class="container">
            <?php
            include_once ('includes/nav.php');
            ?>
            
            <div style="margin-top: auto:">
                <div class="row">
                    <div class="offset-md-2 col-md-8 offset-lg-3 col-lg-6 col-sm-12">
                        <div class="jumbotron">
                            <form action="login_submit.php" method="POST">
                                <div class="form-group">
                                    <input type="email" placeholder="E-mail" class="form-control" name="email_id">
                                </div>
                                <div class="form-group">    
                                    <input type="password" placeholder="Password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value ="Log In" class="btn btn-success form-control">
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </body>
</html>


