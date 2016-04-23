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

    <title>Webboard</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!--           PHP Database        -->

    <?php
$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
$objDB = mysql_select_db("chowtime");
 
   
//include ("Pagination.php");       
        
$Per_Page = 10;   // Per Page

        
$Page = $_GET['page'];
if (isset($_GET['page'])) {
 $Page = $_GET['page'];
 } else {
 $Page = 1;
 }

        
$Page_Start = (($Per_Page*$Page)-$Per_Page);
     
    
       
$strSQL="SELECT * FROM topics ORDER by topic_id DESC LIMIT {$Page_Start}, {$Per_Page}";

$objQuery = mysql_query($strSQL);

    
$category = $_GET['category']; //number 0-5
$Category_var = $GET['category'];    
if (isset($_GET['category'])) {
 $category = $_GET['category'];
 } else {
 $category = "";
 }

switch ($category) {
        case 1: $Category_var='CU Museum';
        break;
        case 2: $Category_var='CU Music Hall';
        break;
        case 3: $Category_var='Events';
        break;
        case 4: $Category_var='Exhibitions';
        break;
        case 5: $Category_var='FAQ';
        break;
        default: $Category_var='0';    
    }
    
if($Category_var=='0') {
    $strSQL="SELECT * FROM topics ORDER by topic_id DESC LIMIT {$Page_Start}, {$Per_Page}";
} else {
    $strSQL="SELECT * FROM topics WHERE category='". mysql_real_escape_string( $Category_var) ."' ORDER by topic_id DESC LIMIT {$Page_Start}, {$Per_Page}";  
}

    
$objQuery = mysql_query($strSQL);
//$Num_Rows = mysql_num_rows($objQuery);    


//               Paging      

if ($Category_var=='0') {
    $strSQLPage="SELECT * FROM topics ORDER by topic_id DESC";
} else {
    $strSQLPage="SELECT * FROM topics WHERE category='". mysql_real_escape_string( $Category_var) ."'";  
}
$objQueryPage = mysql_query($strSQLPage);
$Num_Rows = mysql_num_rows($objQueryPage);  

    
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
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

  

    
?>


</head>

<body style="background-color: #f9f9f9;">


    <!--          NAV BAR               
        
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
    -->

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <div class="currentpage">CHOWTIME</div>
                </a>
                <a class="navbar-brand page-scroll" href="museumhome.html">
                    <div>Museum</div>
                </a>
                <a class="navbar-brand page-scroll" href="event.html">Music Hall</a>
            </div>
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
                        <a data-toggle="dropdown" href="#">Webboard</a> <b class="caret"></b>
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
                            <div class="pull-left txt">
                                <input type="text" class="form-control" placeholder="Search Topics">
                            </div>
                            <div class="pull-right">
                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        <form action="#" method="post" class="form">
                            <a href="new_topic.php" role="button" class="btn btn-primary pinkbtn">Start New Topic</a>
                        </form>
                    </div>
                    <!--                            <div class="env pull-left"><i class="fa fa-envelope"></i></div>-->

                    <div class="avatar pull-right dropdown profilepic">
                        <a data-toggle="dropdown" href="#"> <?php 
    
    if ($userimgrow['profile_pics'] == NULL) {
        echo '<img width="40" height="40" src="img/avatar.jpg"/>';
    } else { ?>
    <img width="40" height="40" src= <?php echo $userimgrow['profile_pics']; ?> />
   <?php }?> </a> <b class="caret"></b>
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

    <div class="container" id="content">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <?php
while($objResult = mysql_fetch_array($objQuery))
{

$topicid = $objResult['topic_id'];    
$posterid = $objResult['user_id'];
    
//username    
$sql="SELECT * FROM users WHERE user_id=$posterid";
$result=mysql_query($sql);
$users = array();

//image    
$imgsql = "SELECT profile_pics FROM users WHERE user_id=$posterid";
$resultimg = mysql_query("$imgsql");
$imgrow = mysql_fetch_assoc($resultimg); 
    
    
//profilepics    
$userimgsql = "SELECT profile_pics FROM users WHERE user_id=$user_id";
$resultuserimg = mysql_query("$userimgsql");
$userimgrow = mysql_fetch_assoc($resultuserimg); 
    
//comments
$commsql = "SELECT * FROM comments WHERE topic_id=$topicid";
$resultcomm = mysql_query("$commsql");
    
/* <?php echo mysql_num_rows($resultcomm); ?> เอาไว้ไปแปะใน html comment ทีหลัง count no of comment dai laew */ 
while ($row = mysql_fetch_assoc($result)) { $users[] = $row; } ?>



                    <!-- POST -->
                    <div class="post">

                        <div class="wrap-ut pull-left">
                            <div class="userinfo pull-left">
                                <div class="avatar">
                                    <?php 
    
    if ($imgrow['profile_pics'] == NULL) {
        echo '<img width="50" height="50" src="img/avatar.jpg"/>';
    } else { ?>
    <img width="50" height="50" src= <?php echo $imgrow['profile_pics']; ?> />
   <?php }?>
                                        <div class="icons name"><em><?php foreach($users as $row): ?>
      <?php echo $row['username']; ?><?php endforeach; ?></em>
                                        </div>
                                </div>
                            </div>
                            <div class="posttext pull-left">
                                <h2><a href="topic.php?topicid=<?php echo $objResult['topic_id']; ?>&page=1"><?php echo $objResult['title']; ?></a></h2>
                                <p>
                                    <?php echo $objResult['content']; ?>
                                </p>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="postinfo pull-left">
                            <div class="comments">

                                <div class="commentbg">
                                    <?php $comm_num = mysql_num_rows($resultcomm); 
                                        if (strlen($comm_num) == 1) {
                                            $comm_num = '&nbsp;&nbsp;' . $comm_num . '&nbsp;&nbsp;';
                                        } else if (strlen($comm_num) == 2) {
                                            $comm_num = '&nbsp;&nbsp;' . $comm_num . '&nbsp;';
                                        }
                                        echo $comm_num;
                                    ?>
                                    <div class="mark"></div>
                                </div>

                            </div>
                            
                            <div class="time"><i class="fa fa-clock-o"></i>
                                <?php echo $objResult['datetime']; ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <!-- POST -->


                    <?php } ?>


            </div>


            <div class="col-lg-4 col-md-4">


                <!-- count no of topic in each category -->
                <?php
$cat1SQL = "SELECT * FROM topics WHERE category='CU Museum'";
$cat2SQL = "SELECT * FROM topics WHERE category='CU Music Hall'";  
$cat3SQL = "SELECT * FROM topics WHERE category='Events'"; 
$cat4SQL = "SELECT * FROM topics WHERE category='Exhibitions'";
$cat5SQL = "SELECT * FROM topics WHERE category='FAQ'";            
$objQuery  = mysql_query($cat1SQL); 
$objQuery2  = mysql_query($cat2SQL);  
$objQuery3  = mysql_query($cat3SQL);                              
$objQuery4  = mysql_query($cat4SQL);      
$objQuery5  = mysql_query($cat5SQL);  
    
?>

                    <!-- -->
                    <div class="sidebarblock">
                        <h3>Categories</h3>
                        <div class="divline"></div>
                        <div class="blocktxt">
                            <ul class="cats">
                                
                                <li><a href="webboard.php?category=1&page=1">CU Museum <span class="badge pull-right" ><?php echo mysql_num_rows($objQuery); echo $cat1_num; ?></span></a></li>
                                <li><a href="webboard.php?category=2&page=1">CU Music Hall <span class="badge pull-right"><?php echo mysql_num_rows($objQuery2); ?></span></a></li>
                                <li><a href="webboard.php?category=3&page=1">Events <span class="badge pull-right"><?php echo mysql_num_rows($objQuery3); ?></span></a></li>
                                <li><a href="webboard.php?category=4&page=1">Exhibitions <span class="badge pull-right"><?php echo mysql_num_rows($objQuery4); ?></span></a></li>
                                <li><a href="webboard.php?category=5&page=1">FAQ <span class="badge pull-right"><?php echo mysql_num_rows($objQuery5); ?></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- -->


                    <!-- -->
                
                    <div class="sidebarblock">
                        <h3>Topics that you have created.</h3>
                        <?php 
                //topics posted   
$postsql="SELECT * FROM topics WHERE user_id=$user_id ORDER BY topic_id DESC LIMIT 0,5";
$postquery=mysql_query($postsql);

while($postResult = mysql_fetch_array($postquery))
{
                
                ?>
                        <div class="divline"></div>
                        <div class="blocktxt">
                            <?php echo $postResult['title']; ?>
                        </div>
                        
                    
<?php } ?>
                        </div>

            </div>
        </div>

    </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <!--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>-->
                <div align="center">
                    <ul class="pager">
                        <li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Prev_Page ?>">&larr; Previous</a></li>

                        <ul class="paginationforum">

                            <!-- PAGING -->
                            <?php include("Pagination.php"); ?>
                            

                        </ul>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                        <li><a href="webboard.php?category=<?php echo $category ?>&page=<?php echo $Next_Page ?>">Next &rarr;</a></li>
                    </ul>
                </div>
                <!--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>-->
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

  



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
            $("#menubutton").click(function () {
                $("#menuarea").toggle("slow");
                $("#mainNav").toggle();
                $('body > :not(#menuarea)').hide(); //hide all nodes directly under the body
                $('#menuarea').appendTo('body');
            });
            $("#closemenu").click(function () {
                $("#menuarea").toggle("slow");
                $("#mainNav").toggle();
                $('body > :not(#menuarea)').show();
            });
            $(".minuspic").hide();
            $("#visitndo").hide();
            $("#ex").hide();
            $("#visitpluspic").click(function () {
                $("#visitndo").toggle();
                $("#visitminuspic").show();
                $("#visitpluspic").hide();
            });
            $("#visitminuspic").click(function () {
                $("#visitndo").toggle();
                $("#visitminuspic").hide();
                $("#visitpluspic").show();
            });
            $("#expluspic").click(function () {
                $("#ex").toggle();
                $("#exminuspic").show();
                $("#expluspic").hide();
            });
            $("#exminuspic").click(function () {
                $("#ex").toggle();
                $("#exminuspic").hide();
                $("#expluspic").show();
            });
        </script>

</body>

</html>