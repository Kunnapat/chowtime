<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Current Event</title>
    
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
    <link rel="stylesheet" href="css/reservation.css" type="text/css">

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
<?php
    $eid = $_GET['id'];
    $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
    $objDB = mysql_select_db("chowtime");
    $estrSQL = "SELECT * FROM events WHERE event_id=".$eid;
    $eobjQuery = mysql_query($estrSQL) or die ("Error Query [".$estrSQL."]");
    $rstrSQL = "SELECT * FROM rounds WHERE event_id=".$eid;
    $robjQuery = mysql_query($rstrSQL) or die ("Error Query [".$rstrSQL."]");
    ?>

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
            <a class="navbar-brand page-scroll" href="eventcurrent.php">
                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true" id="icon"></span>
                
                CANCEL RESERVATION
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
            <?php
                while($eobjResult = mysql_fetch_array($eobjQuery))
                {
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                     <?php 
                    $imgsql = "SELECT event_pics FROM events WHERE event_id=".$eobjResult["event_id"];
                    $resultimg = mysql_query("$imgsql");
                    $imgrow = mysql_fetch_assoc($resultimg);
                        echo '<img width="100%" height="100%" src="data:image/jpeg;base64,'.base64_encode( $imgrow['event_pics'] ).'"/>';    
                    ?>     
                </div>
                <div class="col-md-5">
                    <div class="page-item2 clearfix">
                        <div class="item-content2">
                            <h3>
                                <b>EVENT SUMMARY</b> 
                            </h3>
                            <ul>
                                <li>
                                    NAME - <?php echo $eobjResult["ename"];?>
                                </li>
                                <li>
                                    CONDUCTED IN - <?php echo $eobjResult["language"];?>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
            <?php
            }
            ?>
        </div>
        
        
        <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile">
                            CHOOSE DATE
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                
                <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <div class="timebutton">
                                <ul class="segmented-control" id="dateradiobutton">
                                    <?php
                                        while($objResult = mysql_fetch_array($robjQuery))
                                        {
                                    ?>
                                    
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="date1"   name="dateoption" id="date1"> 
                                        <label class="segmented-control__label" for="date1" value="date1" > 
                                            <?php echo $objResult["datetime"];?>
                                        </label>  
                                    </li>
                                    <?php
                                        }
                                    ?>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="date2"   name="dateoption" id="date2" >  		
                                        <label class="segmented-control__label" for="date2" value="date2" >
                                            Thursday, April 8
                                        </label> 
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-1">
                        </div>
                </div>
            </div>
        
        <div id="step2">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile">
                            CHOOSE ROUND
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                
                <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <div class="timebutton" >
                                <ul class="segmented-control" id="roundradiobutton">
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="round1"   name="roundoption" id="round1"> 
                                        <label class="segmented-control__label" for="round1" value="round1" > 
                                            13.00
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="round2"   name="roundoption" id="round2" >  		
                                        <label class="segmented-control__label" for="round2" value="round2" >
                                            19.00
                                            
                                        </label> 
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-1">
                        </div>
                </div>
            </div>
            
            
            
        </div>
        
        
        <div id="step3">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile">
                            CHOOSE AMOUNT
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                
                <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <div class="timebutton" >
                                <ul class="segmented-control" id="amountradiobutton">
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="amount1"   name="amountoption" id="amount1"> 
                                        <label class="segmented-control__label" for="amount1" value="amount1" > 
                                            1
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="amount2"   name="amountoption" id="amount2"> 
                                        <label class="segmented-control__label" for="amount2" value="amount2" > 
                                            2
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="amount3"   name="amountoption" id="amount3"> 
                                        <label class="segmented-control__label" for="amount3" value="amount3" > 
                                            3
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="amount4"   name="amountoption" id="amount4"> 
                                        <label class="segmented-control__label" for="amount4" value="amount4" > 
                                            4
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="amount5"   name="amountoption" id="amount5"> 
                                        <label class="segmented-control__label" for="amount5" value="amount5" > 
                                            5
                                        </label> 
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-1">
                        </div>
                </div>
            </div>
            
            
            
        </div>
        
        <div id="step4">
            <div class="container" id="step4">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <a href="#">
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
         
    
        
    </div>

</section>

<?php
mysql_close($objConnect);
?>


</body>
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

