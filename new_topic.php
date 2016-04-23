<? php 
session_start();
include "check-user.php"; 
$user_id = $_SESSION['user_id']; 

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Webboard :: Create new topic</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/webboard.css" type="text/css">
        <link rel="stylesheet" href="css/nav.css" type="text/css">
        <link rel="stylesheet" href="css/custom.css" type="text/css">
        <!--<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>-->
        <script src="..//ckeditor/ckeditor.js"></script>
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

<?php
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("chowtime");

?>
        
    </head>
    
    <body style="background-color: #f9f9f9;">
        
        
         <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    
                    <a class="navbar-brand page-scroll" href="#page-top"><div class="currentpage">CHOWTIME</div></a>
                    <a class="navbar-brand page-scroll" href="museumhome.html"><div>Museum</div></a>
                    <a class="navbar-brand page-scroll" href="event.html">Music Hall</a>
                </div>

                <!-- /.navbar-collapse -->
            </div>
                <!-- /.container-fluid -->
        </nav>
        <!--END OF NAV BAR-->
        
        <header>
            <!--place holder for bg-->
        </header>
        
        <div class="headernav">
            
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2"></div>
                        <div class="col-lg-3 col-xs-9 col-sm-4 col-md-4 selecttopic">
                            <div class="dropdown pull-left">
                                <a data-toggle="dropdown" href="#" >Webboard</a> <b class="caret"></b>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CU Museum</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-2" href="#">CU Music Hall</a></li>        
                                    <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Events</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Exhibitions</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-3" href="#">FAQ</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 search col-xs-12 col-sm-1 col-md-2">
                            <div class="wrap">
                                <form action="#" method="post" class="form">
                                    <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                                    <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                            <div class="stnt pull-left">                            
                                <form action="#" method="post" class="form"> 
                                    <a href="new_topic.html" role="button" class="btn btn-primary pinkbtn"  href="03_new_topic.html">Start New Topic</a>
                                </form> 
                            </div>
<!--                            <div class="env pull-left"><i class="fa fa-envelope"></i></div>-->

                            <div class="avatar pull-right dropdown profilepic">
                                <a data-toggle="dropdown" href="#"><img src="img/avatar.jpg" alt="" /></a> <b class="caret"></b>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-3" href="#">Log Out</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-4" href="04_new_account.html">Create account</a></li>
                                </ul>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="container">
                    <div class="row">
                       <div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-8 col-md-8">



                            <!-- POST -->
                            <div class="post" id="content">
                                <form class="form newtopic" method="post" action="addTopicSave.php">
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img src="img/avatar.jpg" alt="" />
                                                
                                            </div>

                                            <div class="icons">
                                                Bnzson
                                            </div>
                                        </div>
                                        <div class="posttext pull-left">

                                            <div>
                                                <input type="text" placeholder="Enter Topic Title" name="topicName" class="form-control" />
                                            </div>

                                            <div class="row">
                                                <div class="col-lg12 col-md-12">
                                                    <select name="category" id="category"  class="form-control" >
                                                        <option value="" disabled selected>Select Category</option>
                                                        <option value="op1">CU Museum</option>
                                                        <option value="op2">CU Music Hall</option>
                                                        <option value="op3">Events</option>
                                                        <option value="op4">Exhibitions</option>
                                                        <option value="op5">FAQ</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-lg-6 col-md-6">
                                                    <select name="subcategory" id="subcategory"  class="form-control" >
                                                        <option value="" disabled selected>Select Subcategory</option>
                                                        <option value="op1">Option1</option>
                                                        <option value="op2">Option2</option>
                                                    </select>
                                                </div>
                                            -->
                                            </div>

                                            <div>
                                                <textarea name="desc" id="desc" rows=15 placeholder="Description"  class="form-control" ></textarea>
                                                 <script>CKEDITOR.replace( 'desc' );</script>
                                            </div>
                                            


                                        </div>
                                        <div class="clearfix"></div>
                                    </div>                              
                                    <div class="postinfobot">

                                        

                                        

                                        <div class="pull-right postreply">
                                            
                                            <div class="pull-left"><input name="topicimg" type="file" id="topicimg" style="width:200px"/>
    </div>
                                            
                                            <div class="pull-right"><input type="submit" class="btn btn-primary" value="Post"></input></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->
                        
                            
                        </div>
                        
                    </div>
                    
                    
                </div>

                            


           

            
        </div>

        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>


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
        
        
        
        <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
        <script type="text/javascript">

            var revapi;

            jQuery(document).ready(function() {
                "use strict";
                revapi = jQuery('.tp-banner').revolution(
                        {
                            delay: 15000,
                            startwidth: 1200,
                            startheight: 278,
                            hideThumbs: 10,
                            fullWidth: "on"
                        });

            });	//ready
            
            
            function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

        </script>

        <!-- END REVOLUTION SLIDER -->
    </body>
</html>