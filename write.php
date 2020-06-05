<?php

include_once ("includes/common.php");
if(!isset($_SESSION['id']))
{
    header('location: login.php');
}
include_once ('includes/navlogin.php');
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
        <hr>
            
            <div class="offset-md-2 col-md-8">
                <form action="write_submit.php" method="POST" id="blog">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Title of the blog" name="title">
                    </div>
                    <div class="form-group">
                        <textarea name="blog" rows="15" cols="50" class="form-control" placeholder="Write Your Blog Here" name="message" form="blog"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="POST" name="post" class="btn btn-info" style="float: right;">
                    </div>
                </form>
            </div>
            
        </div>
    </body>
</html>