<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CHOWTIME</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        
        <style>
            section{
                display: block;
                clear: both;
                margin-left: 20px;
            }
        </style>
    </head>
    
    <body>
        <section class="col-sm-4" style="clear:both;">
            <div class="list-group">
              <a href="museumhome.html" class="list-group-item">Museum Home</a>
              <a href="musichallhome.html" class="list-group-item">Music Hall Home</a>
            </div>
        </section>
        <hr>
        
        <section>
            <h1>HELLO</h1>
        
            <?php
            if($_POST) {
                include "connection.php";

                $email = $_POST['email'];
                $class = ' class="err"';
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $msg = "invalid email";
                }
                else {
                    if($_POST['subscribe']=="subscribe") {
                        $sql = "SELECT COUNT(*) FROM newsletter WHERE email = '$email'";
                        $rs = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($rs);
                        if($data[0] != 0) {
                            $msg = "you are already subscribed";
                        }
                        else {
                            $sql = "INSERT INTO newsletter VALUES('$email', CURRENT_DATE())";
                            mysqli_query($link, $sql);
                            $msg = "subscribed";
                            $class = "";
                        }
                    }
                    else if($_POST['subscribe']=="unsubscribe") {
                        $sql = "DELETE FROM newsletter WHERE email = '$email'";
                        mysqli_query($link, $sql);
                    }
                }
                echo "<h3$class>$msg</h3>";
                mysqli_close($link);
            }
            ?>
        </section>
        
     
      <section>
          <button class="btn btn-link"><a href="admin_sendmail.php">Admin Only</a></button>
        <form method="post">
            <h4>Subscribe:</h4>
            <div class="col-xs-4">
               <input type="radio" name="subscribe" value="subscribe" class=".radio-inline" checked>Subscribe
                <input type="radio" name="subscribe" value="unsubscribe" class=".radio-inline" style="margin-left:5px;">Unsubscribe
                <hr>
                
                Email: <input type="email" name="email" class="form-control">
                <br>
                <button class="btn btn-primary">Subscribe</button>
            </div>
        </form>
      </section>
       
        
        
        
        
        
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>