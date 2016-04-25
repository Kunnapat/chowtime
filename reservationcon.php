<?php
    session_start();
    include "check-user.php";
    $userid = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Confirmation</title>
    
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
    <link rel="stylesheet" href="css/rcon.css" type="text/css">

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
    include "connection.php";
    $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
    $s1 = '';
    $s2 = '';
    $s3 = '';
    $s4 = '';
    $s5 = '';
    $objDB = mysql_select_db("chowtime");
    $eid = $_GET['id'];
    $rid = $_GET['rid'];
    $amount = $_GET['amount'];
    
    $code = rand(10000,100000);
    
    
    if ($amount == 1){
        $s1 = $_GET['s1'];
        $sql="INSERT INTO reservations VALUES(0,$userid,$code,now(),$eid,$rid)";
        if(@mysqli_query($link, $sql)){
            $maxid = mysqli_insert_id($link);
        }
        
        $sql="INSERT INTO seats VALUES(0,'$s1','1',$maxid,$rid,$eid)";
        $result=mysql_query($sql);
    }
    if ($amount == 2){
        $s1 = $_GET['s1'];
        $s2 = $_GET['s2'];
        $sql="INSERT INTO reservations VALUES(0,$userid,$code,now(),$eid,$rid)";
        if(@mysqli_query($link, $sql)){
            $maxid = mysqli_insert_id($link);
        }
        
        $sql="INSERT INTO seats VALUES(0,'$s1','1',$maxid,$rid,$eid),(0,'$s2','1',$maxid,$rid,$eid)";
        $result=mysql_query($sql);
    }
    if ($amount == 3){
        $s1 = $_GET['s1'];
        $s2 = $_GET['s2'];
        $s3 = $_GET['s3'];
        $sql="INSERT INTO reservations VALUES(0,$userid,$code,now(),$eid,$rid)";
        if(@mysqli_query($link, $sql)){
            $maxid = mysqli_insert_id($link);
        }
        
        $sql="INSERT INTO seats VALUES(0,'$s1','1',$maxid,$rid,$eid),(0,'$s2','1',$maxid,$rid,$eid),(0,'$s3','1',$maxid,$rid,$eid)";
        $result=mysql_query($sql);
    }
    if ($amount == 4){
        $s1 = $_GET['s1'];
        $s2 = $_GET['s2'];
        $s3 = $_GET['s3'];
        $s4 = $_GET['s4'];
        $sql="INSERT INTO reservations VALUES(0,$userid,$code,now(),$eid,$rid)";

        if(@mysqli_query($link, $sql)){
            $maxid = mysqli_insert_id($link);
        }
         
        
        $sql="INSERT INTO seats VALUES(0,'$s1','1',$maxid,$rid,$eid),(0,'$s2','1',$maxid,$rid,$eid),(0,'$s3','1',$maxid,$rid,$eid),(0,'$s4','1',$maxid,$rid,$eid)";
        $result=mysql_query($sql);
        
    }
    if ($amount == 5){
        $s1 = $_GET['s1'];
        $s2 = $_GET['s2'];
        $s3 = $_GET['s3'];
        $s4 = $_GET['s4'];
        $s5 = $_GET['s5'];
        $sql="INSERT INTO reservations VALUES(0,$userid,$code,now(),$eid,$rid)";
        if(@mysqli_query($link, $sql)){
            $maxid = mysqli_insert_id($link);
        }
        $sql="INSERT INTO seats VALUES(0,'$s1','1',$maxid,$rid,$eid),(0,'$s2','1',$maxid,$rid,$eid),(0,'$s3','1',$maxid,$rid,$eid),(0,'$s4','1',$maxid,$rid,$eid),(0,'$s5','1',$maxid,$rid,$eid)";
        $result=mysql_query($sql);
        
    }
    
    
    
    
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
                <span class="glyphicon glyphicon-ok-circle" aria-hidden="true" id="icon"></span>
                
                BACK TO EVENTS
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
            <section class="component page-description">
                <p class="line labels"></p>
                <h1>
                    <p><span>RESERVATION COMPLETED</span></p>
                    <span> <button class="no-print" style="float: right" onclick="print()"><span class="glyphicon glyphicon-print" aria-hidden="true" id="printi"></span></button></span>
                </h1>
                <div class="component-content">
                    <div class="intro">
                        <div class="rich-text">
                            <center> <div class="context"> Your Confirmation Code </div> </center> <br>
                            <center> <div class="codetext"> <?php echo $code ?> </div>  </center>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    
       <div class="container">
            <section class="component page-description">
                <p class="line labels"></p>
                <h1>
                    <p><span>SUMMARY</span></p>
                
                </h1>
                <div class="component-content">
                    <div class="intro">
                        <div class="rich-text">
                            
                            <?php
                            
                            $objDB = mysql_select_db("chowtime");
                            $strSQL = "SELECT * FROM events e, rounds r WHERE e.event_id=".$eid." AND r.round_id=".$rid;
                            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                            while($objResult = mysql_fetch_array($objQuery))
                            {
                            ?>
                                <div class="context">
                                    Event Name :&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $objResult["ename"];?> <br>
                                    Date : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $objResult["date"];?><br>
                                    Time : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo substr($objResult["time"],0,5)?><br>
                                    Amount : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $amount;?><br>
                                    Seat(s) : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $s1." ".$s2." ".$s3." ".$s4." ".$s5?>
                            </div>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    

        
        
        
        
        
        
    </div>

</section>



</body>
<script>
    function.print(){
    window.print();
    }
</script>
<script>
    console.log(<?php echo $code ?>);
    
</script>
    
    
<?php
mysql_close($objConnect);
?>


</html>

