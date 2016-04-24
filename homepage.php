<?php
session_start();
    

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CHOWTIME</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/homepage.css" type="text/css">
    <link rel="stylesheet" href="css/popup.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    
<body id="page-top">
    <div class="menuarea" id="menuarea">
        <div class="closebutton" id="closemenu">X</div>
        <div class="active-nav">
            <ul style="list-style-type:none;">
                <li class="nav-list">MUSEUM</li>
                <li class="nav-list visitpluspic">
                    <img src="img/plus32.png" class="pluspic" id="visitpluspic"/>
                    <img src="img/minus32.png" class="minuspic" id="visitminuspic">
                    Visit and do
                </li>
                <ul style="list-style-type:none;margin-left:30px;" id="visitndo">
                    <li class="nav-sublist"><a href="plan-your-visit.html">Plan your visit</a></li>
                    <li class="nav-sublist">Things to do</li>
                </ul>
                
                <li class="nav-list">
                    <img src="img/plus32.png" class="pluspic" id="expluspic"/>
                    <img src="img/minus32.png" class="minuspic" id="exminuspic">
                    Exhibition
                </li>
                <ul style="list-style-type:none;margin-left:30px;" id="ex">
                    <li class="nav-sublist">Current Exhibition</li>
                    <li class="nav-sublist">Future Exhibition</li>
                </ul>
                <li class="nav-list">
                    <img src="img/plus32.png" />
                    Contact
                </li>
                <li class="nav-list"><img src="img/mag32.png"/><input type="search" id="searchbar" placeholder="  Search"/></li>
            </ul>
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
                <a class="navbar-brand page-scroll" href="#page-top"><div class="currentpage">CHOWTIME</div></a>
                <a class="navbar-brand page-scroll" href="museumhome.php">Museum</a>
                <a class="navbar-brand page-scroll" href="musichallhome.php">Music Hall</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <header>
        <div class="header-content">
               
            <div class="header-content-inner">
                <div class = "maintext">CHOWTIME</div>
                <hr>
                <div class ="subtitle">CHULALONGKORN UNIVERSITY MUSEUM AND MUSIC HALL</div>
                <!-- <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a> -->
            </div>
        </div>
    </header>
    



    <section class="bg-secondary" id="about">
            <div class="row">
                <div class="col-md-6">
                    <div class="secbox1">
                        Go to Museum Home
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="secbox2">
                        Go to Music Hall Home
                    </div>
                </div>
            </div>
        
      
    </section>
    
    <section class="bg-third" id="about">
            <div class="row">
                <div class="col-md-6">
                    <a href="subscribe.html">
                         <div class="secbox3">
                            Subscribe Newsletter
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                         <div class="secbox3">
                            Webboard
                        </div>
                </div>
                
            </div>
      
    </section>


    <!-- jQuery -->

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

    <script>
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
                echo "<a href='./homepage.php#popup2'>ForgetPassword?</a>";
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
        <a href="./homepage.php" class="button">cancel</a>
        
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
        <a href=\"./homepage.php\" class=\"button\">cancel</a>";
        }else {
            echo "email not found <a href='./homepage.php#popup2'>Go back</a> <br>";
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
        $say = "your answer is not correct <br><a href='./homepage.php#popup2'>Try Again</a>";

            if($var==$answer){
                echo "<input type=\"hidden\" value=\"<?php echo \$email?>\" name=\"email\" />";
                echo "New password: <input type=\"text\" name=\"password\"><br><br>
        Confirm New Password: <input type=\"text\" name=\"repassword\"><br><br>
        <input type=\"submit\" class='button' value=\"Submit\">
        <a href=\"./homepage.php\" class=\"button\">cancel</a>";
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
                echo "new password and confirm new password not match <br><a href='./homepage.php#popup3'>Go back</a> ";
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
