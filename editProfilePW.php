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
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    
     <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/editProfile.css" type="text/css">
    <link rel="stylesheet" href="css/popup.css" type="text/css">
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    </head>
    
     <?php
      // connect to database
     
      $con = mysql_connect("localhost", "root", "root");
      $db = mysql_select_db("chowtime");
        
        // session_save_path("./session/");
        // session_start();

       //take member id
        $mid = $_GET['mid'];
    
       // $mname = mysql_query("SELECT secure_ans FROM users WHERE user_id='$mid'");
        //$mname = "SELECT username FROM users WHERE user_id='$mid' ";


        // $mid = $_SESSION["mid"];

        $query = mysql_query("SELECT * FROM users WHERE user_id =".$mid);
        while ($row = mysql_fetch_array($query)) {    

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
                <a class="navbar-brand page-scroll" href="#page-top">CHOWTIME</a>
                <a class="navbar-brand page-scroll" href="museumhome.html"><div class="currentpage">Museum</div></a>
                <a class="navbar-brand page-scroll" href="event.html">Music Hall</a>
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
    
    
     <div class="login">
        <a href="profile.html" class="loginButton">Logout</a> 
    </div>
    
    <body style="font-family:sans-serif; background-color:lavenderblush;">
        
         <form action= <?php echo "update_password.php?"."mid=".$mid ?> name="frmAdd" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-3">
                
                <div class="leftPanel">
                <div style="border-bottom: 2px solid #000; padding-bottom:15px; padding-top:15px; border-color: gainsboro">&nbsp;&nbsp;YOUR ACCOUNT </div>
                    
                    <ul class="leftList">
                        <?php $pic_path = $row['profile_pics'];
                            echo "<img src =".$pic_path." width="."'247'"."'height='200'"." >";
                        ?>
                     <li class="withBorder"><a href=<?php echo "editProfile.php?"."mid=".$mid ?>>&nbsp;&nbsp;&nbsp;&nbsp;Edit Profile</a></li>
                        <li class="withBorder"><a href=<?php echo "editProfilePW.php?"."mid=".$mid ?>>&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a></li>
                        <li class="withBorder"><a href=<?php echo "editProfileEmail.php?"."mid=".$mid ?>>&nbsp;&nbsp;&nbsp;&nbsp;Email Preference</a></li>
                        <li class="withBorder"><a href=<?php echo "profile.php?"."mid=".$mid ?>>&nbsp;&nbsp;&nbsp;&nbsp;&laquo; Back to profile</a></li>
                    </ul>
                    
                </div>
                
            </div>
            
            <div class="col-sm-9"> 
                <div class="rightpanel">
                    <h2 style="margin-left:20px">Change Password</h2><hr>
                    
                    <div class="inputField">
                        Old Password:<font color="red">*</font> <br> <input type="text" name="oldPw" value="<?php echo $row['password']; ?>" style="margin-top:2%" ><br>
                    </div>
                    
                    <div class="inputField">
                        New Password:<font color="red">*</font> <br> <input type="text" name="newPw" style="margin-top:2%">
                    </div>
                    
                    <div class="inputField">
                        New Password Confirmation:<font color="red">*</font> <br> <input type="text" name="newPwCon" style="margin-top:2%">
                    </div>
                    
                    <div class="inputField">
                        Please answer your security question: <?php echo $row['secure_quest']; ?><font color="red">*</font> <br> <input type="text" name="secureAns" value="xxx" style="margin-top:2%">
                    </div>
                    
                    <hr>
                    
                    <div class="pwButton">
                        <input type="submit" class='button' value="Change Password">
                    </div>
                    
                    </form>
                    
                    
                
                </div>
               
                 
            </div>
 
        </div>
        
        <?php
        }
        ?>
        
    </body>
    
</html>
