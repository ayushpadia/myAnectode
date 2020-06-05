<?php
include_once ("includes/common.php");
if(isset($_SESSION['id']))
{
    include_once ('includes/navlogin.php');
}
else 
{
?>
<html>
    <head>
        <title>
            Renderbit
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="includes/bootstrap.css">
        <script src="includes/bootstrap.bundle.min.js"></script>
        <script src="includes/bootstrap.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="includes/index.css">
    </head>
    <body>
        <div class="container">
            <?php
            include_once ('includes/nav.php');
}
            ?>
            <br>
            <hr>
            <div class="container">
                <div class="form-group">
                    <div style="float: right; ">
                        <form action="write.php">
                            <input type="submit" value="Post A Blog" class="btn btn-success">
                        </form>
                    </div><br><br>
                </div>
            </div>
            
            
            <div class="container">
                <div class="jumbotron text-white rounded bg-info">
                    <div class="col-md-6 px-0">
                        <h1 class="font-italic">Long featured blog post</h1>
                        <p class="lead my-3"> Many a times people believe in myths but there is no scientific proof about all these myths</p>
                        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="row">
                        <?php
                            $query1 = "SELECT * FROM blogs GROUP BY time DESC";
                            $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                            $row1 = mysqli_fetch_array($result1);
                            while ($row1)
                            {
                                $user_id=$row1['user_id'];
                                $query2 = "SELECT * FROM users where id='$user_id'";
                                $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
                                $row2 = mysqli_fetch_array($result2);
                                $name = $row2['name'];
                                $_SESSION['b_id']=$row1['id'];
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
                            <form action="read.php" method="POST">
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
        
        </div>
    </body>
</html>
