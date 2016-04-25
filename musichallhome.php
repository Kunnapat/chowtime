<?php
    session_start();
    include "check-user.php";
    $userid = $_SESSION['user_id'];
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
    <link rel="stylesheet" href="css/musichallhome.css" type="text/css">

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
                    <li class="nav-sublist"><a href="eventfuture.php">Future Events</a></li>
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
                <a class="navbar-brand page-scroll" href="homepage.html">CHOWTIME</a>
                <a class="navbar-brand page-scroll" href="museumhome.html">Museum</a>
                <a class="navbar-brand page-scroll" href="#page-top"><div class="currentpage">Music Hall</div></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a class="page-scroll"><div id="menubutton">MUSIC HALL MENU</div></a>
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
                <div class = "maintext">CHULA MUSIC HALL</div>
                <hr>
                <p id="1234">Discover a new look of Chula and watch a great performance. Slow your pace down and visit us at Chula Music hall!</p>
                <!-- <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a> -->
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h3 class="section-heading">Reserve an event in advance for your convenient.</h3>
                    <hr class="light">
                    <a href="eventcurrent.html" class="btn btn-default btn-xl">View all Current Events</a>
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

    

</body>

</html>
