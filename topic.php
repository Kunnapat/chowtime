<?php 
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

        <title>Webboard :: Topic</title>

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
        
      
$topicid = $_GET['topicid'];         

$Per_Page = 10;   // Per Page

        
$Page = $_GET['page'];
if (isset($_GET['page'])) {
 $Page = $_GET['page'];
 } else {
 $Page = 1;
 }

echo $Page;
        
$Page_Start = (($Per_Page*$Page)-$Per_Page);

//echo $Page_Start;

//retrieve comment        
$commsql = "SELECT * FROM comments WHERE topic_id='".$topicid."' ORDER by comment_id DESC LIMIT {$Page_Start}, {$Per_Page}";
$resultcomm = mysql_query("$commsql");
        
        
//comment page        
$commsqlPage = "SELECT * FROM comments WHERE topic_id='".$topicid."'";
$resultcommPage = mysql_query("$commsqlPage");
$comm_num = mysql_num_rows($resultcommPage);

        
if($comm_num<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($comm_num % $Per_Page)==0)
{
	$Num_Pages =($comm_num/$Per_Page) ;
}
else
{
	$Num_Pages =($comm_num/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}  

if ($Page == 1) {
    $Prev_Page = 1;
} else {
    $Prev_Page = $Page-1;
}
if ($Page == $Num_Pages) {
    $Next_Page = $Num_Pages;
} else {        
    $Next_Page = $Page+1;
}


$Before_Last = $Num_Pages - 1;
$Pagination = ""; //display the page number

          
        
// retrieve topic
$strSQL = "SELECT * FROM topics WHERE topic_id='".$topicid."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");   
$objResult = mysql_fetch_array($objQuery);
        



if($_GET["Action"] == "Save")
{
    $topicid = $_GET["topicid"];
    $content = $_POST["reply"];
    
	//*** Insert Reply ***//
    if($content!=''){   
	$newcommentSQL = "INSERT INTO comments (topic_id,user_id,datetime,content)
VALUES
($topicid,$user_id,NOW(),'$content')";
        $objcommentQuery = mysql_query($newcommentSQL);
    
        echo "<script>location.href='topic.php?topicid=$topicid'</script>";
//    header("Location:0; url=topic.php?topicid=$topicid");
    }
	
		
}
        

        
?>
        

    </head>
    
    <body style="background-color: #f9f9f9;">
        <!--NAV BAR-->
        
         <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
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
                                    
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="webboard.php?category=1&page=1">CU Museum</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-2" href="webboard.php?category=2&page=1">CU Music Hall</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-3" href="webboard.php?category=3&page=1">Events</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-4" href="webboard.php?category=4&page=1">Exhibitons</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-5" href="webboard.php?category=5&page=1">FAQ</a></li>


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
                                    <a href="new_topic.php" role="button" class="btn btn-primary pinkbtn" >Start New Topic</a>
                                </form> 
                            </div>
<!--                            <div class="env pull-left"><i class="fa fa-envelope"></i></div>-->

                            <div class="avatar pull-right dropdown profilepic">
                                <a data-toggle="dropdown" href="#"><?php 
    
    if ($userimgrow['profile_pics'] == NULL) {
        echo '<img width="40" height="40" src="img/avatar.jpg"/>';
    } else { ?>
    <img width="40" height="40" src= <?php echo $userimgrow['profile_pics']; ?> />
   <?php }?></a> <b class="caret"></b>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-3" href="#">Log Out</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-4" href="registration.php">Create account</a></li>
                                </ul>
                            </div>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        
        <section class="content">
                <div class="container">
                    <div class="row">
                       <div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-8 breadcrumbf">
                            <a href="webboard.php">Webboard</a> 
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                       <div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-8 col-md-8">
                            
                            <!-- POST -->
                            <div class="post beforepagination">
                                <?php 
                                $topicid = $objResult['topic_id'];    
                                $posterid = $objResult['user_id'];
    
//username    
$sql="SELECT * FROM users WHERE user_id=$posterid";
$result=mysql_query($sql);
$users = array();

//profilepics    
$userimgsql = "SELECT profile_pics FROM users WHERE user_id=$user_id";
$resultuserimg = mysql_query("$userimgsql");
$userimgrow = mysql_fetch_assoc($resultuserimg); 

//image    
$imgsql = "SELECT profile_pics FROM users WHERE user_id=$posterid";
$resultimg = mysql_query("$imgsql");
$imgrow = mysql_fetch_assoc($resultimg); 

while ($row = mysql_fetch_assoc($result)) { $users[] = $row; } ?>
                                
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                           <?php 
    
    if ($imgrow['profile_pics'] == NULL) {
        echo '<img width="50" height="50" src="img/avatar.jpg"/>';
    } else { ?>
    <img width="50" height="50" src= <?php echo $imgrow['profile_pics']; ?> />
   <?php }?>
                                            
                                        </div>

                                        <div class="icons name"><em><?php foreach($users as $row): ?>
      <?php echo $row['username']; ?><?php endforeach; ?></em></div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <?php

    

                                        
   
/* <?php echo mysql_num_rows($resultcomm); ?> เอาไว้ไปแปะใน html comment ทีหลัง count no of comment dai laew */ 
?>

                                        
                                        <h2><?php echo $objResult['title']; ?></h2>
                                        <p><?php echo $objResult['content']; ?></p>
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i>Posted on : <?php echo $objResult['datetime']; ?></div>

                                    
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div><!-- POST -->

                           
                        
                            <!-- POST -->
                            

                            <div class="break"></div>

                            <!-- POST -->
                            <div class="post comment">
                                <?php while($objCom = mysql_fetch_array($resultcomm)) { 
                                $commenterid = $objCom['user_id'];
                                
                                //username    
$sql="SELECT * FROM users WHERE user_id=$commenterid";
$result=mysql_query($sql);
$users = array();

    
    
//image    
$imgsql = "SELECT profile_pics FROM users WHERE user_id=$commenterid";
$resultimg = mysql_query("$imgsql");
$imgrow = mysql_fetch_assoc($resultimg); 

while ($row = mysql_fetch_assoc($result)) { $users[] = $row; } ?>    
                                
                                
        

                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <?php 
                                            if ($imgrow['profile_pics'] == NULL) {
                                            echo '<img width="50" height="50" src="img/avatar.jpg"/>';
                                            } else {
                                            echo '<img width="50" height="50" src="data:image/jpeg;base64,'.base64_encode(      $imgrow['profile_pics'] ).'"/>';
                                            } ?>
                                            
                                        </div>

                                        <div class="icons name"><em><?php foreach($users as $row): ?>
      <?php echo $row['username']; ?><?php endforeach; ?></em></div>
                                    </div>
                                    <div class="posttext pull-left">
                                        
                                        <p><?php echo $objCom['content']; ?></p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>                              
                                <div class="postinfobot">

                                    

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : <?php echo $objCom['datetime']; ?></div>
                                    

                                    <div class="clearfix"></div>
                                </div>
                                <?php } ?>
                            </div><!-- POST -->


                            <!-- POST -->
                            <div class="post comment">
                                <form action="topic.php?topicid=<?php echo $_GET["topicid"];?>&Action=Save" class="form" method="post">
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <?php 
    
    if ($userimgrow['profile_pics'] == NULL) {
        echo '<img width="40" height="40" src="img/avatar.jpg"/>';
    } else { ?>
    <img width="40" height="40" src= <?php echo $userimgrow['profile_pics']; ?> />
   <?php }?>
                                                
                                            </div>

                                            <div class="icons name">
                                                <em><?php echo $userimgrow['username']; ?></em>
                                            </div>
                                        </div>
                                        <div class="posttext pull-left">
                                            <div class="textwraper">
                                                <div class="postreply">Post a Reply</div>
                                                <div>
                                                <textarea name="reply" id="reply" placeholder="Type your message here"></textarea>
                                                <script>CKEDITOR.replace( 'reply' );</script>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                    </div>    
                                    
                                    <div class="postinfobot">

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-camera"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary pinkbtn">Post Reply</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->


                        </div>
                        <div class="col-lg-2 col-md-2"></div>

                            

                        
                    </div>
                </div>



                <div class="container">
                    <div class="row">
                       <div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-8">
                            <!--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>-->
                            <div align="center">
                                <ul class="pager">
                                    <li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Prev_Page ?>">&larr; Previous</a></li>
                                <ul class="paginationforum">
            <?php 
                            
                            //pages	
		if ($Num_Pages < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($i = 1; $i <= $Num_Pages; $i++)
			{
				if ($i == $Page) { ?>
					<li><a class="active" href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
				<?php } else { ?>
					<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>					
			<?php } 
		
            } 
        } elseif($Num_Pages > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($Page < 1 + ($adjacents * 2))		
			{
				for ($i = 1; $i < 4 + ($adjacents * 2); $i++)
				{
					if ($i == $Page) { ?>
						<li><a class="active" href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } else { ?>
						<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>		
				    <?php } ?>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Before_Last ?>"><?php echo $Before_Last ?></a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Num_Pages ?>"><?php echo $Num_Pages ?></a></li>	
			 <?php } 
			//in middle; hide some front and some back
            } elseif($Num_Pages - ($adjacents * 2) > $Page && $Page > ($adjacents * 2))
			{ ?>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=1">1</a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=2">2</a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<?php 
                for ($i = $Page - $adjacents; $i <= $Page + $adjacents; $i++)
				{
					if ($i == $page) { ?>
						<li><a class="active" href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } else { ?>
						<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>				
				<?php } ?>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Before_Last ?>"><?php echo $Before_Last ?></a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Num_Pages ?>"><?php echo $Num_Pages ?></a></li>		
			 <?php } 
			//close to end; only hide early pages
            } else
			{ ?>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=1">1</a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=2">2</a></li>
				<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Next_Page ?>">...</a></li>
				<?php 
                                    for ($i = $Num_Pages - (2 + ($adjacents * 2)); $i <= $Num_Pages; $i++)
				{
                        if ($i == $Page) { ?>
						<li><a class="active" href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php } else { ?>
						<li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>				
				<?php }
			     }
		      }
		

	       }
        
        ?>

                        </ul>
                                <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                <li><a href="topic.php?topicid=<?php echo $topicid ?>&page=<?php echo $Next_Page ?>">Next &rarr;</a></li>
                                </ul>
                            </div>
                            <!--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>-->
                            <div class="clearfix"></div>                        
                        </div>
                    </div>
                </div>

            </section>     


           

            
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

        </script>

        <!-- END REVOLUTION SLIDER -->
    </body>
</html>