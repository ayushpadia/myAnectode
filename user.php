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
        <div class="container">
            <div class="container">
                <div class="form-group">
                    <div style="float: right; ">
                        <form action="write.php">
                            <input type="submit" value="Post A Blog" class="btn btn-success">
                        </form>
                    </div><br><br>
                </div>
            </div>
                <div class="row">
                        <?php
                            $name = $_SESSION['name'];
                            $id = $_SESSION['id'];
                            $query1 = "SELECT * FROM blogs WHERE user_id='$id' GROUP BY time DESC";
                            $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                            $row1 = mysqli_fetch_array($result1);
                            while ($row1)
                            {
                        ?>
                        <div class="col-md-5" style="background-color:rgba(231,223,222,0.3); margin-top: 15px;">
                            <blockquote>
                                <h1 class="font-italic""><?php echo $row1['title'];?> </h1>
                                <footer style="float: right;"><?php echo $row1['time'];?></footer>
                                <footer style="float: left;"><?php echo $name;?></footer>
                            </blockquote>
                            <br>
                            <hr>
                            <p class="lead my-3"> <?php echo $row1['short'];?></p>
                            <form action="read.php" method="GET">
                                <div class="form-group" style="float: right;">
                                    <input type="submit" value="Read More" class="btn">
                                    <input type="hidden" value="<?php echo $row1['id'];?>" name="blog_id">
                                </div>                                
                            </form>
                        </div>
                        <div class="offset-md-1"></div>
                        <?php 
                            $row1 = mysqli_fetch_array($result1);
                        }
                        ?>
                </div>
            </div>
    </body>
</html>