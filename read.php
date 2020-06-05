<?php

include_once ("includes/common.php");
if(!isset($_SESSION['id']))
{
    include_once ('includes/nav.php');
}
 else 
{
    include_once ('includes/navlogin.php');
}
?>
<html>
    <head>
        <title>
            
        </title>
        <link rel="stylesheet" type="text/css" href="includes/bootstrap.css">
        <script src="includes/bootstrap.bundle.min.js"></script>
        <script src="includes/bootstrap.min.js"></script>
        <script src="includes/index.js"></script>
        <link rel="stylesheet" type="text/css" href="includes/index.css">
    </head>
    <body>
        <hr>
        <div class="container">
            <div class="offset-md-1 col-md-10">
                <?php
                $blog_id=$_POST['blog_id'];
                $query1 = "SELECT * FROM blogs WHERE id='$blog_id'";
                $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                $row1 = mysqli_fetch_array($result1);
                $u_id = $row1['user_id'];
                $query2 = "Select * FROM users WHERE id='$u_id'";
                $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
                $row2 = mysqli_fetch_array($result2);
                $name = $row2['name'];
                ?>
                <blockquote>
                    <h1 class="font-italic""><?php echo $row1['title'];?> </h1>
                    <footer style="float: right;"><?php echo $row1['time'];?></footer>
                    <footer style="float: left;"><?php echo $name;?></footer>
                </blockquote>
                <br>
                <hr>
                <p class="lead my-3"> <?php echo $row1['message'];?></p>
            </div>
            
            <div style="margin-top:7em;">
                <div class="offset-md-1 col-md-10" style="background-color: #eeeeee">
                    <div>
                        <h1 style="float:right" class="font-italic">Comment Section</h1>
                        <form action="comment_submit.php" method="GET">
                            <div class="form-group">
                                <textarea rows="3" cols="auto" style="margin-top:1.2em; width: 100%; margin-bottom: 1.1em;" placeholder="Enter your comment" name="comment"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Comment" class="btn" style="border: 1px black solid;" name="submit">
                                <input type="hidden" value="<?php echo $blog_id ?>" name="blog_id">
                            </div>
                        </form>
                        <div>
                            <?php
                            $query3 = "SELECT * from comments";
                            $result3 = mysqli_query($con, $query3);
                            $row3 = mysqli_fetch_array($result3);
                            while($row3){
                                $u_id = $row3['user_id'];
                                $b_id = $row3['blog_id'];
                                if($b_id == $blog_id)
                                {
                                    $query4 = "SELECT * FROM users WHERE id='$u_id'";
                                    $result4 = mysqli_query($con, $query4);
                                    $row4 = mysqli_fetch_array($result4);
                                    $u_name = $row4['name'];
                                    $comment_id=$row3['id']
                            ?>
                            
                            <div style="text-decoration: underline"><?php echo $u_name;?></div>
                                <p><?php echo $row3['comment'];?></p>
                                <p style="float: right">
                                    <button id="myBtn">Reply</button>
                                    <div id="myModal" class="modal">
                                        <div class="modal-content">
                                            <span class="close">&times;</span>
                                                <form action="comment_submit.php" method="GET">
                                                    <div class="form-group">
                                                        <textarea rows="1" cols="auto" style="margin-top:1.2em; width: 100%; margin-bottom: 1.1em;" placeholder="Reply" name="comment"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Reply" class="btn" style="border: 1px black solid;" name="submit">
                                                        <input type="hidden" value="<?php echo $comment_id ?>" name="comment_id">
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                <script>
                                    var modal = document.getElementById("myModal");
                                    var btn = document.getElementById("myBtn");
                                    var span = document.getElementsByClassName("close")[0];
                                    btn.onclick = function() {
                                      modal.style.display = "block";
                                    }
                                    span.onclick = function() {
                                      modal.style.display = "none";
                                    }
                                    window.onclick = function(event) {
                                      if (event.target == modal) {
                                        modal.style.display = "none";
                                      }
                                    }
                                </script>
                                </p>
                                <br>
                                <hr>
                            
                            <?php
                                }
                                $row3 = mysqli_fetch_array($result3);
                            }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </body>
</html>

