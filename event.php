<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Current Event</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/touchTouch.css">
	
	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/nav.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

     <link rel="stylesheet" href="css/popup.css" type="text/css">
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="css/event.css" type="text/css">

    <script src="js/jquery.js"></script>
    <script src="js/touchTouch.jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/packery.pkgd.min.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <script src="js/wow.js"></script>
<!--
	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}
		});
	</script>
-->
</head>

<body>
    <?php
    $eid = $_GET['id'];
    $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
    $objDB = mysql_select_db("chowtime");
    $strSQL = "SELECT * FROM events WHERE event_id=".$eid;
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    ?>
   <div class="menuarea fullscreen" id="menuarea">

    <div class="closebutton" id="closemenu">X</div>
    <div class="active-nav">
        <ul style="list-style-type:none;">
            <li class="nav-list">MUSIC HALL</li>
            <li class="nav-list visitpluspic">
                <img src="img/plus32.png" class="pluspic" id="visitpluspic"/>
                <img src="img/minus32.png" class="minuspic" id="visitminuspic">
                Visit and do
            </li>
            <ul style="list-style-type:none;margin-left:30px;" id="visitndo">
                <li class="nav-sublist">Plan your visit</li>
                <li class="nav-sublist">Things to do</li>
            </ul>
            
            <li class="nav-list">
                <img src="img/plus32.png" class="pluspic" id="expluspic"/>
                <img src="img/minus32.png" class="minuspic" id="exminuspic">
                Events
            </li>
            <ul style="list-style-type:none;margin-left:30px;" id="ex">
                <li class="nav-sublist"><a href="eventcurrent.php">Current Events</a></li>
                <li class="nav-sublist"><a href="eventfuture.html">Future Events</a></li>
            </ul>
            <li class="nav-list">
                <img src="img/plus32.png" />
                Contact
            </li>
            <li class="nav-list"><img src="img/mag32.png"/><input type="search" id="searchbar" placeholder="  Search"/></li>
        </ul>
        <div class="fullscreen" style="background-color: #F2F2F2;"><br><br><br><br><br></div>
    </div>
</div>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="eventcurrent.php">Back to current events</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                
                <li>
                    <a class="page-scroll"><div class="toprightmenu" id="menubutton">MUSIC HALL MENU</div></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>    




<section id="content">
    
    <?php
    while($objResult = mysql_fetch_array($objQuery))
    {
    ?>
    <div class="full-width-container block-1">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="texttile">
                        <?php echo $objResult["ename"];?>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
        
        
        
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <?php 
                    $imgsql = "SELECT event_pics FROM events WHERE event_id=".$objResult["event_id"];
                    $resultimg = mysql_query("$imgsql");
                    $imgrow = mysql_fetch_assoc($resultimg);
                        echo '<img width="100%" height="100%" src="data:image/jpeg;base64,'.base64_encode( $imgrow['event_pics'] ).'"/>';    
                    ?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <div class="page-item clearfix">
                        <div class="item-content">
                            <h1><b>EVENT INFO</b></h1>
                            <ul>
                                <li>
                                    NAME - <?php echo $objResult["ename"];?>
                                </li>
                                <li>
                                    ORGANISED BY - <?php echo $objResult["organiser"];?>
                                </li>
                                <li>
                                    Conducted in  - <?php echo $objResult["language"];?>
                                </li>
                                <li>
                                    TYPE - <?php echo $objResult["type"];?>
                                </li>
                                <li>
                                    ROUNDS - <?php echo $objResult["start_date"];?>  - <?php echo $objResult["end_date"];?>
                                </li>
                            </ul>
                            
                        </div>
                        <div class="item-content2">
                            <?php echo $objResult["description"];?>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
         <div class="container">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <a href="reservation.php?id=<?php echo $eid;?>">
                        <div class="texttile2">
                            reserve
                        </div>
                    </a>
                    
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
    
        
    </div>
    <?php
    }
    ?>
</section>
<?php
mysql_close($objConnect);
?>


<form action="#checklogin" name="frmAdd" method="post">   
<div id="popup1" class="overlay">
  <div class="popup">
    <h2>Chowtime</h2>
    <a class="close" href="#">&times;</a>
    <div class="content">
        Username: <input type="text" name="username"><br>
        Password:&nbsp; <input type="password" name="password"><br>
        <lable><a href="#popup2" style="margin-top=10%;">forget password?</a></lable><br><br>
       
        <input type="submit" class='button' value="Login">
        <a href="./registration.php" class="button">Register</a>
    </div>
  </div>
</div>
</form>       
    
<form action="#popup3" name="frmAdd2" method="post"> 
<div id="checklogin" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
    <a class="close" href="#">&times;</a>
    <div class="content">
        <?php
        $username = $_POST['username'];
        $password = $_POST ['password'];  

     
        $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $strSQL = "SELECT * FROM users ";
	// Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($strSQL);
    $non = "false";
    if($rs){
        if($username==NULL || $password==NULL){
            echo "<h4>Error</h4>";
            echo "Please fill in Username/Password<br>";
        }
        while($row = mysql_fetch_array($rs)) {
            if($row['username']==$username && $row['password']==$password){
                echo "<a href='./profile.php'>Login Complete GO TO Profile page</a>";
                echo "<input type=\"hidden\" value=\"<?php echo \$username?>\" name=\"username\" />
        <input type=\"hidden\" value=\"<?php echo \$username?>\" name=\"username\" />";
                $_SESSION['user_id'] = $row['user_id'];
                $non = "false";
                break;
            }
            if($row['username']==$username && $row['password']!=$password){
                echo "<a href='./event.php#popup2'>ForgetPassword?</a>";
            }
            else{
                $non="true";
            }
        }
        if($non=="true"){
            echo "<h4>Not Found</h4>";
            echo "Username/Password is incorrect";
        }
        $non = "false";
    }else {
        
    }
    

//	 Close the database connection
	mysql_close();
    ?>
    </div>
    </div>
</div>
</form>
    
<form action="#popup3" name="frmAdd2" method="post"> 
<div id="popup2" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
        <h4>Forget Password</h4>
    <a class="close" href="#">&times;</a>
    <div class="content">
        
        Email: <input type="text" name="email"><br><br>
        <input type="submit" class='button' value="Submit">
        <a href="./event.php" class="button">cancel</a>
        
    </div>
    </div>
</div>
</form>
   
<form action="#popup4" name="frmAdd3" method="post">     
<div id="popup3" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
        <h4>Security Question</h4>
    <a class="close" href="#">&times;</a>
    <div class="content">
         
        <?php
           $email = $_POST['email'];
        
            $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
            $objDB = mysql_select_db("chowtime");
            $strSQL = "SELECT * FROM users WHERE email='$email' ";
        // Execute the query (the recordset $rs contains the result)

        $rs = mysql_query($strSQL);
        $row = mysql_fetch_array($rs);
        $username = $row['username'];
        $question = $row['secure_quest'];
        
        $correctans = $row['secure_ans'];
        
        if($row!=NULL){
            echo "Question:$question<br>";
            echo "Answer: <input type=\"text\" name=\"answer\">";
            echo "<input type=\"submit\" class='button' value=\"Submit\">
        <a href=\"./event.php\" class=\"button\">cancel</a>";
        }else {
            echo "email not found <a href='./event.php#popup2'>Go back</a> <br>";
            echo "<a href='./registration.php'>Register</a>";
        }
        mysql_close();
        ?>
            <br><br>
        
        <input type="hidden" value="<?php echo $username?>" name="username" />
        <input type="hidden" value="<?php echo $email?>" name="email" />
        <input type="hidden" value="<?php echo $correctans?>" name="var" />
        
    </div>
    </div>
</div>
</form>    
    
<form action="#popup5" method="post">  
<div id="popup4" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
        <h4>New Password</h4>
    <a class="close" href="#">&times;</a>
    <div class="content">

        <?php
            $username = $_POST['username'];
            $email = $_POST['email'];
            $answer = $_POST['answer'];
//              echo $email;

//        echo $answer;
        $var = $_POST['var'];
//        echo $var;
        $say = "your answer is not correct <br><a href='./event.php#popup2'>Try Again</a>";

            if($var==$answer){
                echo "<input type=\"hidden\" value=\"<?php echo \$email?>\" name=\"email\" />";
                echo "New password: <input type=\"text\" name=\"password\"><br><br>
        Confirm New Password: <input type=\"text\" name=\"repassword\"><br><br>
        <input type=\"submit\" class='button' value=\"Submit\">
        <a href=\"./event.php\" class=\"button\">cancel</a>";
            }
        else {
            echo $say;
        }
        
        mysql_close();
        ?>
       
        <input type="hidden" value="<?php echo $username?>" name="username" />
        <input type="hidden" value="<?php echo $email?>" name="email" />
    </div>
    </div>
</div>
</form>    
    
<form action="#login" method="post">  
<div id="popup5" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
        <h4>New Password</h4>
    <a class="close" href="#">&times;</a>
    <div class="content">

        <?php
            $username = $_POST['username'];
            $email = $_POST['email'];
            $newpass = $_POST['password'];
            $newrepass = $_POST['repassword'];
               
//        echo $email;
//        echo $newpass;
//        echo $newrepass;
      
               // Create connection
            $conn = mysqli_connect("localhost", "root", "root", "chowtime");
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if($newpass==$newrepass){
                $sql = "UPDATE users SET password='$newpass' WHERE email='$email' ";
                
                if (mysqli_query($conn, $sql)) {
                    
                    echo "Password updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }

            }else {
                echo "new password and confirm new password not match <br><a href='./event.php#popup3'>Go back</a> ";
            }
            
        mysql_close();
        ?>
        <input type="hidden" value="<?php echo $username?>" name="username" />
        
    </div>
    </div>
</div>
</form>    
    
    
</body>
    

    <div class= "login" id="login">
        <?php
            if(!isset($_SESSION['user_id'])){
                ?>
                <a href="
        <?php
            $username = $_POST['username'];  
            $password = $_POST['password'];     
               
               $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
            $objDB = mysql_select_db("chowtime");
            $strSQL = "SELECT * FROM users ";
        // Execute the query (the recordset $rs contains the result)
        $rs = mysql_query($strSQL);
        $try1 = "false";
        if($rs){
            while($row = mysql_fetch_array($rs)) {
                if($row['username']==$username && $row['password']==$password){
                    echo "/profile.php";
                    $try1 = "false";
                    break;
                }else{
                    $try1 = "true";
                }
            }
            if($try1=="true"){
                echo "#popup1";
            }
        }
               
        ?>
                 " class="loginButton">
        <?php
            $username = $_POST['username'];
            $password = $_POST['password'];  
         
            $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
            $objDB = mysql_select_db("chowtime");
            $strSQL = "SELECT * FROM users ";
        // Execute the query (the recordset $rs contains the result)
        $rs = mysql_query($strSQL);
        $try = "false";
        if($rs){
            while($row = mysql_fetch_array($rs)) {
                if($row['username']==$username && $row['password']==$password){
                    echo $username;
                    $try = "false";
                    break;
                }else{
                    $try = "true";
                }
            }
            if($try=="true"){
                echo "Login";
            }
        }
       
        ?>
                    
           </a>
      <?php
            }else{
                $user_id = $_SESSION['user_id'];
                
                  $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
            $objDB = mysql_select_db("chowtime");
            $strSQL = "SELECT username FROM users WHERE user_id = $user_id";
            // Execute the query (the recordset $rs contains the result)
            $rs = mysql_query($strSQL);
                while($row = mysql_fetch_array($rs)) {
                echo "<a href='profile.php' class='loginButton'>$row[0]</a>";
                }
            }
        ?>
        
        </div> 

</html>


</html>

<script>
$(function(){
  $('#touch_gallery a').touchTouch();
});

$("#menuarea").hide();
$("#menubutton").click(function(){
 $("#menuarea").toggle("slow");
 $("#mainNav").toggle();
           $('body > :not(#menuarea)').hide(); //hide all nodes directly under the body
           $('#menuarea').appendTo('body');
       });
$("#closemenu").click(function(){
 $("#menuarea").toggle("slow");
 $("#mainNav").toggle();
 $('body > :not(#menuarea)').show();
});
$(".minuspic").hide();
$("#visitndo").hide();
$("#ex").hide();
$("#visitpluspic").click(function(){
    $("#visitndo").toggle();
    $("#visitminuspic").show();
    $("#visitpluspic").hide();
});
$("#visitminuspic").click(function(){
 $("#visitndo").toggle();
 $("#visitminuspic").hide();
 $("#visitpluspic").show();
});
$("#expluspic").click(function(){
 $("#ex").toggle();
 $("#exminuspic").show();
 $("#expluspic").hide();
});
$("#exminuspic").click(function(){
 $("#ex").toggle();
 $("#exminuspic").hide();
 $("#expluspic").show();
});
</script>