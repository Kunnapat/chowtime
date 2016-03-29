<?php
session_start();

if($_POST)  {
  $username = $_POST['username'];
  $password = $_POST['password'];
    
    include("connection.php");
//    my_connect();
    $sql = "SELECT username FROM members";
//    $sql2 = "SELECT password FROM members";
    echo "addddd";
//    $result = $conn->query($sql);
//    $result2 = $conn->query($sql2);
//    
//    echo "$result";
//    echo "$result2";
    echo "add";
    if ($sql!=NULL) {
//         output data of each row
//        if($result==$sql){
//            echo "username is match";
//        }
//        if($result2==$sql2){
//            echo "password is match";
//        }
        echo "1";
        while($row = $sql->fetch_assoc()) {
            echo "username: " . $row["username"]. " - password: " . $row["password"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    
    if(empty($username)) {
        $errmsg = "please fill in username";
      }
      else if($password) {
        $errmsg = "password and confirm password is not match";
      }

    @mysql_query($link,$sql) or die(mysql_error());
  
//    $Uid = mysql_insert_id();
    echo "Register Complete!<br>";   
  
  exit;
}
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
    <link rel="stylesheet" href="css/museumhome.css" type="text/css">
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
                <a class="navbar-brand page-scroll" href="#page-top">CHOWTIME</a>
                <a class="navbar-brand page-scroll" href="museumhome.html"><div class="currentpage">Museum</div></a>
                <a class="navbar-brand page-scroll" href="musichallhome.html">Music Hall</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a class="page-scroll"><div id="menubutton">MUSEUM MENU</div></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <header>
        <div class="header-content">
               
            <div class="header-content-inner">
                <div class = "maintext">CHULA MUSEUM</div>
                <hr>
                <p id="1234">Discover a new look of Chula and watch a great performance. Slow your pace down and visit us at Chula Museum!</p>
                <!-- <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a> -->
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Open on Weekdays 09.00 - 16.00</h2>
                    <hr class="light">
                    <p class="text-faded">Chulalongkorn University</p>
                    <a href="#" class="btn btn-default btn-xl">Plan your visit</a>
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

    
  
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
<div id="popup1" class="overlay">
  <div class="popup">
    <h2>Chowtime</h2>
    <a class="close" href="#">&times;</a>
    <div class="content">
        Username: <input type="text" name="username"><br>
        Password:&nbsp; <input type="password" name="lname"><br>
        <lable><a href="#popup2" style="margin-top=10%;">forget password?</a></lable><br><br>
       
        <input type="submit" class='button' value="Login">
        <a href="./registration.php" class="button">Register</a>
    </div>
  </div>
</div>
</form>    
    
<div id="popup2" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
        <h4>Forget Password</h4>
    <a class="close" href="#">&times;</a>
    <div class="content">
         
        Email: <input type="text" name="email"><br><br>
        <a href="#popup3" class="button">submit</a>
        <a href="./museumhome.php" class="button">cancel</a>
        
    </div>
    </div>
</div>
    
<div id="popup3" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
        <h4>Security Question</h4>
    <a class="close" href="#">&times;</a>
    <div class="content">
         
        Question: คำถามจากDatabase<br><br>
        Answer: <input type="text" name="answer"><br><br>
        <a href="#popup4" class="button">send</a>
        <a href="./museumhome.php" class="button">cancel</a>
        
    </div>
    </div>
</div>
<div id="popup4" class="overlay">
    <div class="popup">
        <h2>Chowtime</h2>
        <h4>New Password</h4>
    <a class="close" href="#">&times;</a>
    <div class="content">
         
        New password: <input type="text" name="password"><br><br>
        Confirm New Password: <input type="text" name="repassword"><br><br>
        Question: <input type="text" name="question"><br><br>
        Answer: <input type="text" name="answer"><br><br>
        <a href="./profile.html" class="button">confirm</a>
        <a href="./museumhome.php" class="button">cancel</a>
        
    </div>
    </div>
</div>

    
    
    
</body>
    
    <div class= "login">
                <a href="#popup1" class="loginButton">Login</a> 
            </div>   

</html>
