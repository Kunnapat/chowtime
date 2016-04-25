<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Subscribe Email</title>
    
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/touchTouch.css">
	
	<!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    <link rel="stylesheet" href="css/subscribe.css" type="text/css">

    <script src="js/jquery.js"></script>
    <script src="js/touchTouch.jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/packery.pkgd.min.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <script src="js/wow.js"></script>

</head>

<body>
   

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand page-scroll" href="homepage.html"> 
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" id="icon"></span>
                    Back to homepage
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
</nav>

<section id="content">
    <div class="full-width-container block-1">
        
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="texttile">
                        Newsletter Subscription
                    </div>
                </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-2">
                </div>
            </div>
            
        </div>
        <div class="container">
<?php
 include "connection.php";

if($_REQUEST) {
    $email = $_REQUEST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "invalid email";
    }else {
        if($_REQUEST['subscribe']=="subscribe") {
            $sql = "SELECT COUNT(*) FROM email WHERE address = '$email'";
            $rs = mysqli_query($link, $sql);
            $data = mysqli_fetch_array($rs);
            if($data[0] != 0) {
                $msg = "You are already subscribed";
            }
            else {
                $sql = "INSERT INTO email VALUES(0,'$email',DATE_SUB(CURRENT_DATE(),INTERVAL 1 DAY))";
                mysqli_query($link, $sql);
                $msg = "Subscribed";
                
            }
        }
        else if($_REQUEST['unsubscribe']=="unsubscribe") {
            $sql = "DELETE FROM email WHERE address = '$email'";
            mysqli_query($link, $sql);
            $msg = "You are unsubscribed";
        }
        echo $msg;
    }
    
    
    mysqli_close($link);
}
?>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="iconbox" style="text-align: center;">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true" id="icon2"></span>
                    </div>
                    
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
    <form>
    <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon2">@</span>
                        <input type="text" class="form-control" placeholder="Your email" aria-describedby="basic-addon2" name="email">
                        
                        </div>

                    
    
                </div>
                
            </div>
        </div>
    
    <div class="container">
            
            <div class="row">
                
                <div class="col-md-3">
                </div>
                
                <div class="col-md-3">
                    <div class="buttonarea" style="text-align: center;">
                        <button class="myButton" name="subscribe" value="subscribe">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true" id="icon3"></span>
                            SUBSCIBE
                        </button>
                    </div>
                    
    
                </div>
                
                <div class="col-md-3">
                    <div class="buttonarea" style="text-align: center;">
                        <button class="myButton" name="unsubscribe" value="unsubscribe">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true" id="icon3"></span>
                            UNSUBSCIBE
                        </button>
                    </div>
    
                </div>
                <div class="col-md-3">
                </div>
                
            </div>
        </div>
    </form>
</section> 
    





<script>
    $('#step2').hide();
    $('#step4').hide();
    function pageScroll() {
    	window.scrollBy(0,220); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScroll()',0.001); // scrolls every 100 milliseconds
    }
    $('#date1').click(function(){
        $('#step2').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        var temp = $(this).attr('id');
        console.log(temp);
    });
    
    $('#date2').click(function(){
        $('#step2').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        var temp = $(this).attr('id');
        console.log(temp);
    });
    $('#round1').click(function(){
        $('#step4').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        var temp = $(this).attr('id');
        console.log(temp);
    });
    
    $('#round2').click(function(){
        $('#step4').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        var temp = $(this).attr('id');
        console.log(temp);
    });
  
  
   
    
</script>
    

</html>

