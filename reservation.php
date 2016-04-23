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
        
        
        <div id="step1">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile" id="datetexttile">
                            CHOOSE DATE
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <div id="dateselection">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <div class="timebutton">
                                <ul class="segmented-control" id="dateradiobutton" >
                                    <?php
                                        $strSQL = "SELECT DISTINCT date FROM rounds WHERE event_id=".$eid;
                                        $dobjQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                                        while($dobjResult = mysql_fetch_array($dobjQuery))
                                        {
                                    ?>
                                    
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="<?php echo $dobjResult["date"];?>"   name="dateoption" id="<?php echo $dobjResult["date"];?>"> 
                                        <label class="segmented-control__label" for="<?php echo $dobjResult["date"];?>" value="<?php echo $dobjResult["date"];?>" > 
                                            <?php echo $dobjResult["date"];?>
                                        </label>  
                                    </li>
                                    
                                    <?php
                                        }
                                    ?>
                                   
                                    
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-1">
                        </div>
                </div>
                </div>
                
                
            </div>
        </div>
        
        
        
        <div id="step2">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile" id="roundtexttile">
                            CHOOSE ROUND
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                
             <div id="roundselection">
                 <?php
                    $strSQL = "SELECT DISTINCT date FROM rounds WHERE event_id=".$eid;
                    $dobjQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                    while($dobjResult = mysql_fetch_array($dobjQuery))
                    {
                ?>
                <div id="roundof<?php echo $dobjResult["date"];?>">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <div class="timebutton" >
                                <ul class="segmented-control" id="roundradiobutton">
                                    <?php
                                        $strSQL = "SELECT * FROM rounds WHERE date = '".$dobjResult["date"]."' AND event_id=".$eid;
                                        $robjQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                                        while($robjResult =         mysql_fetch_array($robjQuery))
                                        {
                                    ?>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="<?php echo $robjResult["round_id"];?>"   name="roundoption" id="<?php echo $robjResult["round_id"];?>"> 
                                        <label class="segmented-control__label" for="<?php echo $robjResult["round_id"];?>" value="<?php echo $robjResult["round_id"];?>" > 
                                            <?php echo $robjResult["time"];?>
                                        </label> 
                                    </li>
                                    
                                    <?php
                                    }
                                    ?>
                                    
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>    
                <?php
                }
                ?>
                 
             </div>   
                
                
            </div>
            
            
            
        </div>
        
        
        <div id="step3">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile" id = amounttexttile>
                            CHOOSE AMOUNT
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                <div id="amountselection">
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
            
            
            
        </div>
        
        
        <div id="step4">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile">
                            CHOOSE ZONE
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                
                <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <br><br>
                            <img width = "100%" src="img/sp.png" />     
                                    
        

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
                                        <input class="segmented-control__input" type="radio" value="zoneA"   name="zoneoption" id="zoneA"> 
                                        <label class="segmented-control__label" for="zoneA" value="zoneA" > 
                                            A
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="zoneB"   name="zoneoption" id="zoneB"> 
                                        <label class="segmented-control__label" for="zoneB" value="zoneB" > 
                                            B
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="zoneC"   name="zoneoption" id="zoneC"> 
                                        <label class="segmented-control__label" for="zoneC" value="zoneC" > 
                                            C
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="zoneD"   name="zoneoption" id="zoneD"> 
                                        <label class="segmented-control__label" for="zoneD" value="zoneD" > 
                                            D
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="zoneE"   name="zoneoption" id="zoneE"> 
                                        <label class="segmented-control__label" for="zoneE" value="zoneE" > 
                                            E
                                        </label> 
                                    </li>
                                    <li class="segmented-control__item"> 
                                        <input class="segmented-control__input" type="radio" value="zoneF"   name="zoneoption" id="zoneF"> 
                                        <label class="segmented-control__label" for="zoneF" value="zoneF" > 
                                            F
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
        
        <div id="step5">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="texttile">
                            CHOOSE SEAT
                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
                
                
                <div id="seatforzoneA">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <br><br>
                            <div class="seatplanbg">
                               <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A23">A23</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A22">A22</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A21">A21</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A20">A20</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A19">A19</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A18">A18</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A17">A17</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B24">B24</div>
                                   </div>    
                                   <div class="col-md-1">
                                       <div class="seat" id="B23">B23</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B22">B22</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B21">B21</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B20">B20</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B19">B19</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B18">B18</div>
                                   </div>
                                   
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C23">C23</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C22">C22</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C21">C21</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C20">C20</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C19">C19</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C18">C18</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C17">C17</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D24">D24</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D23">D23</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D22">D22</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D21">D21</div>
                                   </div>
                                   <div class="col-md-1" >
                                       <div class="seat" id="D20">D20</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D19">D19</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D18">D18</div>
                                   </div>
                                   
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E23">E23</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E22">E22</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E21">E21</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E20">E20</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E19">E19</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E18">E18</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E17">E17</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                
                </div>
                
                
                <div id="seatforzoneB">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <br><br>
                            <div class="seatplanbg">
                               <div class="row">
                                   <div class="col-md-2">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A16">A16</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A15">A15</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A14">A14</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A13">A13</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A12">A12</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A11">A11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A10">A10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A9">A9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="A8">A8</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                                </div>
                            <div class="row">
                                   <div class="col-md-1">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B17">B17</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B16">B16</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="B15">B15</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="B14">B14</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="B13">B13</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="B12">B12</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="B11">B11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="B10">B10</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B9">B9</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B8">B8</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-2">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C16">C16</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C15">C15</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C14">C14</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C13">C13</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C12">C12</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C11">C11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C10">C10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C9">C9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="C8">C8</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-1">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D17">D17</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D16">D16</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D15">D15</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D14">D14</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D13">D13</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D12">D12</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D11">D11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="D10">D10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="D9">D9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="D8">D8</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-1">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F16">D16</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F15">F15</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F14">F14</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F13">F13</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F12">F12</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F11">F11</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F10">F10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="F9">F9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="F8">F8</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="F7">F7</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class='col-md-1'></div>
                    </div>
                </div>
                
                <div id="seatforzoneC">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <br><br>
                            <div class="seatplanbg">
                               <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A7">A7</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A6">A6</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A5">A5</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A4">A4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A3">A3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A2">A2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="A1">A1</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B7">B7</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B6">B6</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B5">B5</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B4">B4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B3">B3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B2">B2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="B1">B1</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C7">C7</div>
                                   </div>
                                   <div class="col-md-1" >
                                       <div class="seat" id="C6">C6</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C5">C5</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C4">C4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C3">C3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C2">C2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="C1">C1</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D7">D7</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D6">D6</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D5">D5</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D4">D4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D3">D3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D2">D2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="D1">D1</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E7">E7</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E6">E6</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E5">E5</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E4">E4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E3">E3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E2">E2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="E1">E1</div>
                                   </div>
                                   <div class="col-md-2">
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                
                </div>
                
                
                <div id="seatforzoneD">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <br><br>
                            <div class="seatplanbg">
                               <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F22">F21</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F21">F21</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F20">F20</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F19">F19</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F18">F18</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F17">F17</div>
                                   </div>
                                   <div class="col-md-3">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-4">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H20">H20</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H19">H19</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H18">H18</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H17">H17</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H16">H16</div>
                                   </div>
                                   <div class="col-md-3">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-5">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="I17">I17</div>
                                   </div>
                                   <div class="col-md-1" >
                                       <div class="seat" id="I16">I16</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="I15">I15</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="I14">I14</div>
                                   </div>
                                   <div class="col-md-3">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-5">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J18">J18</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J17">J17</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J16">J16</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J15">J15</div>
                                   </div>
                                   <div class="col-md-3">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-6">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="K15">K15</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="K14">K14</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="K13">K13</div>
                                   </div>
                                   <div class="col-md-3">
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
               
                </div>
                
                
                
                
                
                <div id="seatforzoneE">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <br><br>
                            <div class="seatplanbg">
                               <div class="row">
                                   <div class="col-md-2">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="G15">G15</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G14">G14</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G13">G13</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G12">G12</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G11">G11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G10">G10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G9">G9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G8">G8</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="G7">G7</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                                </div>
                            <div class="row">
                                   <div class="col-md-1">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H15">H15</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H14">H14</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="H13">H13</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="H12">H12</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="H11">H11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="H10">H10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="H9">H9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="H8">H8</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H7">H7</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H6">H6</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-2">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="I13">I13</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I12">I12</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I11">I11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I10">I10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I9">I9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I8">I8</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I7">I7</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I6">I6</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="I5">I5</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-1">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J14">J14</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J13">J13</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J12">J12</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J11">J11</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J10">J10</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J9">J9</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J8">J8</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="J7">J7</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="J6">J6</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="J5">J5</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-2">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="K12">K12</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K11">K11</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K10">K10</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K9">K9</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K8">K8</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K7">K7</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K6">K6</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K5">K5</div>
                                   </div>
                                    <div class="col-md-1">
                                       <div class="seat" id="K4">K4</div>
                                   </div>
                                   <div class="col-md-1">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-1'></div>
                    </div>
                </div>
                
                
                 <div id="seatforzoneF">
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">
                            <br><br>
                            <div class="seatplanbg">
                               <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F6">F6</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F5">F5</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F4">F4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F3">F3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F2">F2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="F1">F1</div>
                                   </div>
                                   <div class="col-md-3">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H5">H5</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H4">H4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H3">H3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H2">H2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="H1">H1</div>
                                   </div>
                                   <div class="col-md-4">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="I4">I4</div>
                                   </div>
                                   <div class="col-md-1" >
                                       <div class="seat" id="I3">I3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="I2">I2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="I1">I1</div>
                                   </div>
                                   <div class="col-md-5">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J4">J4</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J3">J3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J2">J2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="J1">J1</div>
                                   </div>
                                   <div class="col-md-5">
                                   </div>
                               </div>
                                <div class="row">
                                   <div class="col-md-3">
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="K3">K3</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="K2">K2</div>
                                   </div>
                                   <div class="col-md-1">
                                       <div class="seat" id="K1">K1</div>
                                   </div>
                                   <div class="col-md-6">
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
               
                </div>
                
                
                
               
            </div>
            
            
            
        </div>
        
        
        
        <div id="step6">
            <div class="container" id="step4">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <a href="#">
                        <div class="texttile2" id="reservebutton">
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



</body>
<script>
    var date;
    var round;
    var round_id;
    var amount;
    var seatcount = 0;
    var zone;
    var seattext= "";
    var seatarray = ["A1", "A2", "A3", "A4", "A5", "A6", "A7", "A8", "A9", "A10", "A11", "A12", "A13", "A14", "A15", "A16", "A17", "A18", "A19", "A20", "A21", "A22", "A23", "B1", "B2", "B3", "B4", "B5", "B6", "B7", "B8", "B9", "B10", "B11", "B12", "B13", "B14", "B15", "B16", "B17", "B18", "B19", "B20", "B21", "B22", "B23", "B24","C1", "C2", "C3", "C4", "C5", "C6", "C7", "C8", "C9", "C10", "C11", "C12", "C13", "C14", "C15", "C16", "C17", "C18", "C19", "C20", "C21", "C22", "C23", "D1", "D2", "D3", "D4", "D5", "D6", "D7", "D8", "D9", "D10", "D11", "D12", "D13", "D14", "D15", "D16", "D17", "D18", "D19", "D20", "D21", "D22", "D23", "D24", "E1", "E2", "E3", "E4", "E5", "E6", "E7", "E8", "E9", "E10", "E11", "E12", "E13", "E14", "E15", "E16", "E17", "E18", "E19", "E20", "E21", "E22", "E23", "F1", "F2", "F3", "F4", "F5", "F6", "F7", "F8", "F9", "F10", "F11", "F12", "F13", "F14", "F15", "F16", "F17", "F18", "F19", "F20", "F21", "F22", "G1", "G2", "G3", "G4", "G5", "G6", "G7", "G8", "G9", "G10", "G11", "G12", "G13", "G14", "G15", "G16", "G17", "G18", "G19", "G20", "G21", "H1", "H2", "H3", "H4", "H5", "H6", "H7", "H8", "H9", "H10", "H11", "H12", "H13", "H14", "H15", "H16", "H17", "H18", "H19", "H20","I1", "I2", "I3", "I4", "I5", "I6", "I7", "I8", "I9", "I10", "I11", "I12", "I13", "I14", "I15", "I16", "I17", "J1", "J2", "J3", "J4", "J5", "J6", "J7", "J8", "J9", "J10", "J11", "J12", "J13", "J14", "J15", "J16", "J17", "J18", "K1", "K2", "K3", "K4", "K5", "K6", "K7", "K8", "K9", "K10", "K11", "K12", "K13", "K14", "K15"];
    
    
    
    $('#step2').hide();
    $('#step3').hide();
    $('#step4').hide();
    $('#step5').hide();
    $('#step6').hide();
    $('#seatforzoneA').hide();
    $('#seatforzoneB').hide();
    $('#seatforzoneC').hide();
    $('#seatforzoneD').hide();
    $('#seatforzoneE').hide();
    $('#seatforzoneF').hide();
    
    
     for (i = 0, len = seatarray.length ; i < len; i++) { 
        $('#'+seatarray[i]).click(function(){
            var temp = $(this).attr('id');
            var theclass = $(this).attr('class');
            if(theclass=="seat"){
                if(seatcount<amount){
                    seattext = seattext + temp;
                    console.log(seattext);
                    seatcount++;
                    document.getElementById(temp).className = "seatselected";
                }
                
            }
            if(theclass=="seatselected"){
                seatcount--;
                seattext = seattext.replace(temp,"");
                console.log(seattext);
                document.getElementById(temp).className = "seat";
            }
            
            if(seatcount==amount){
                $('#step6').show();
            } else {
                $('#step6').hide();
            }
           
            console.log(temp);
    });
    }
    
    
    function pageScroll() {
    	window.scrollBy(0,220); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScroll()',0.001); // scrolls every 100 milliseconds
    }
    
    <?php
    $strSQL = "SELECT DISTINCT date FROM rounds WHERE event_id=".$eid;
    $dobjQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    while($dobjResult = mysql_fetch_array($dobjQuery))
    {
    ?>
        $('#roundof<?php echo $dobjResult["date"];?>').hide();
        $('#<?php echo $dobjResult["date"];?>').click(function(){
            $('#step2').show();
            $('#roundof<?php echo $dobjResult["date"];?>').show();
            <?php
            $strSQL = "SELECT DISTINCT date FROM rounds WHERE event_id=".$eid." AND date !='".$dobjResult["date"]."'" ;
            $ddobjQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            while($ddobjResult = mysql_fetch_array($ddobjQuery))
            {
            ?>
                $('#roundof<?php echo $ddobjResult["date"];?>').hide();
            <?php
            }
            ?>
            $('html, body').animate({scrollTop:$(document).height()}, 'slow');
            date = $(this).attr('id');
            console.log(date);
        });
    
    
    <?php
    }
    ?>
    
    <?php
        $strSQL = "SELECT * FROM rounds WHERE event_id=".$eid;         
        $robjQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
        while($robjResult = mysql_fetch_array($robjQuery))
        {
    ?>
        $('#<?php echo $robjResult["round_id"];?>').click(function(){
            
            round = <?php echo $robjResult["round_id"];?>
            
            $('#dateselection').hide();
            $('#roundselection').hide();
            document.getElementById("roundtexttile").className = "texttilesmall";
            document.getElementById("datetexttile").className = "texttilesmall";
            document.getElementById("datetexttile").innerHTML = "DATE : "+date;
            document.getElementById("roundtexttile").innerHTML = "ROUND : "+round;
            $('#step3').show();
            $('html, body').animate({scrollTop:$(document).height()}, 'slow'); 
            console.log(round);
            
           <?php
                $strSQL = "SELECT * FROM seats WHERE round_id=".$robjResult["round_id"];  
                $sobjQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                while($sobjResult = mysql_fetch_array($sobjQuery))
                {
            ?>
                
                var temp = <?php echo $sobjResult["seat_number"];?>.id;
                console.log(temp);
            
                
                
                document.getElementById(temp).className = "seatx";
                document.getElementById(temp).disabled = true;
            
            
            <?php
                }
            ?> 
            
        });
        
    <?php
    }
    ?>
    
    $('#amount1').click(function(){
        amount = 1;
        $('#dateselection').hide();
        $('#roundselection').hide();
        $('#amountselection').hide();
        document.getElementById("datetexttile").className = "texttilesmall";
        document.getElementById("datetexttile").innerHTML = "DATE : "+date;
        document.getElementById("roundtexttile").className = "texttilesmall";
        document.getElementById("roundtexttile").innerHTML = "ROUND : "+round;
        document.getElementById("amounttexttile").className = "texttilesmall";
        document.getElementById("amounttexttile").innerHTML = "AMOUNT : "+amount;
        $('#step4').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        
        
        
        console.log("a"+amount);
    });
    $('#amount2').click(function(){
        amount = 2;
        $('#dateselection').hide();
        $('#roundselection').hide();
        $('#amountselection').hide();
        document.getElementById("datetexttile").className = "texttilesmall";
        document.getElementById("datetexttile").innerHTML = "DATE : "+date;
        document.getElementById("roundtexttile").className = "texttilesmall";
        document.getElementById("roundtexttile").innerHTML = "ROUND : "+round;
        document.getElementById("amounttexttile").className = "texttilesmall";
        document.getElementById("amounttexttile").innerHTML = "AMOUNT : "+amount;
        $('#step4').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        
        
        console.log("a"+amount);
    });
    $('#amount3').click(function(){
        amount = 3;
        $('#dateselection').hide();
        $('#roundselection').hide();
        $('#amountselection').hide();
        document.getElementById("datetexttile").className = "texttilesmall";
        document.getElementById("datetexttile").innerHTML = "DATE : "+date;
        document.getElementById("roundtexttile").className = "texttilesmall";
        document.getElementById("roundtexttile").innerHTML = "ROUND : "+round;
        document.getElementById("amounttexttile").className = "texttilesmall";
        document.getElementById("amounttexttile").innerHTML = "AMOUNT : "+amount;
        $('#step4').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        
        
        console.log("a"+amount);
    });
    $('#amount4').click(function(){
        amount = 4;
        $('#dateselection').hide();
        $('#roundselection').hide();
        $('#amountselection').hide();
        document.getElementById("datetexttile").className = "texttilesmall";
        document.getElementById("datetexttile").innerHTML = "DATE : "+date;
        document.getElementById("roundtexttile").className = "texttilesmall";
        document.getElementById("roundtexttile").innerHTML = "ROUND : "+round;
        document.getElementById("amounttexttile").className = "texttilesmall";
        document.getElementById("amounttexttile").innerHTML = "AMOUNT : "+amount;
        $('#step4').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        
        
        console.log("a"+amount);
    });
    $('#amount5').click(function(){
        amount = 5;
        $('#dateselection').hide();
        $('#roundselection').hide();
        $('#amountselection').hide();
        document.getElementById("datetexttile").className = "texttilesmall";
        document.getElementById("datetexttile").innerHTML = "DATE : "+date;
        document.getElementById("roundtexttile").className = "texttilesmall";
        document.getElementById("roundtexttile").innerHTML = "ROUND : "+round;
        document.getElementById("amounttexttile").className = "texttilesmall";
        document.getElementById("amounttexttile").innerHTML = "AMOUNT : "+amount;
        $('#step4').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        
        
        console.log("a"+amount);
    });
    
     $('#zoneA').click(function(){
        $('#step5').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        zone = 'A';
        $('#seatforzone'+zone).show(); 
        $('#seatforzoneB').hide();
        $('#seatforzoneC').hide();
        $('#seatforzoneD').hide();
        $('#seatforzoneE').hide();
        $('#seatforzoneF').hide();
        console.log("zone"+zone);
    });
    $('#zoneB').click(function(){
        $('#step5').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        zone = 'B';
        $('#seatforzone'+zone).show();
        $('#seatforzoneA').hide();
        $('#seatforzoneC').hide();
        $('#seatforzoneD').hide();
        $('#seatforzoneE').hide();
        $('#seatforzoneF').hide();
        console.log("zone"+zone);
    });
    $('#zoneC').click(function(){
        $('#step5').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        zone = 'C';
        $('#seatforzone'+zone).show();
        $('#seatforzoneA').hide();
        $('#seatforzoneB').hide();
        $('#seatforzoneD').hide();
        $('#seatforzoneE').hide();
        $('#seatforzoneF').hide();
        console.log("zone"+zone);
    });
    $('#zoneD').click(function(){
        $('#step5').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        zone = 'D';
        $('#seatforzoneA').hide();
        $('#seatforzoneB').hide();
        $('#seatforzoneC').hide();
        $('#seatforzoneE').hide();
        $('#seatforzoneF').hide();
        $('#seatforzone'+zone).show(); 
        console.log("zone"+zone);
    });
    $('#zoneE').click(function(){
        $('#step5').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        zone = 'E';
        $('#seatforzoneA').hide();
        $('#seatforzoneB').hide();
        $('#seatforzoneC').hide();
        $('#seatforzoneD').hide();
        $('#seatforzoneF').hide();
        $('#seatforzone'+zone).show(); 
        console.log("zone"+zone);
    });
    $('#zoneF').click(function(){
        $('#step5').show();
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
        zone = 'F';
        $('#seatforzone'+zone).show(); 
        $('#seatforzoneA').hide();
        $('#seatforzoneB').hide();
        $('#seatforzoneC').hide();
        $('#seatforzoneD').hide();
        $('#seatforzoneE').hide();
        console.log("zone"+zone);
    });
    
    
    $('#reservebutton').click(function(){
       console.log(round);
        
        <?php
            $sql="INSERT INTO reservations VALUES(0,)";
        ?>
         
        
       if(amount == 1){
         var s1 = seattext;  
       }
       if(amount == 2){
         var s1 = seattext.substring(0,3);
         var s2 = seattext.substring(3);
       }
       if(amount == 3){
         var s1 = seattext.substring(0,3);
         var s2 = seattext.substring(3,6);
         var s3 = seattext.substring(6);      
       }
       if(amount == 4){
         var s1 = seattext.substring(0,3);
         var s2 = seattext.substring(3,6);
         var s3 = seattext.substring(6,9);
         var s4 = seattext.substring(9);    
       }
       if(amount == 5){
         var s1 = seattext.substring(0,3);
         var s2 = seattext.substring(3,6);
         var s3 = seattext.substring(6,9);
         var s4 = seattext.substring(9,12); 
         var s5 = seattext.substring(12);
       }    
    });
    
    
    
  
   
    
</script>
    
    
<?php
mysql_close($objConnect);
?>


</html>

