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

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="css/popup.css" type="text/css">
    
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php
      // connect to database
     
      $con = mysql_connect("localhost", "root", "root");
      $db = mysql_select_db("chowtime");
        
        // session_save_path("./session/");
        // session_start();

        $mname = $_GET['mname'];
        $mid = $_GET['mid'];

        // $mid = $_SESSION["mid"];

        $query = mysql_query("SELECT * FROM users WHERE user_id =".$mid);
        while ($row = mysql_fetch_array($query)) {    

    ?>
    
    
    </head>

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
                <a class="navbar-brand page-scroll" href="museumhome.php"><div class="currentpage">Museum</div></a>
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
     
    
    <body>
    
    <div class="container-fluid" style="font-family:sans-serif; background-color:lavenderblush;">
    <div class="row">     
        <div class="col-md-5">
            <div> 
                <div class="profilepicTab">               
                  <img class="profilepic" src= "<?php echo $row['profile_pics']; ?>" width="200" height="200"  >
                </div>
              
            </div>
      
        </div>
        
        
        <div class="col-md-7"> 
            <div class="textTab">
                <div> 
                    <h2 name = "mid"value="">
                        <?php echo $row['username']; ?>
                        <button class="editProfile" id = "editbutton" >Edit profile</button>              
                    </h2>  
                    
                    <p name="user_des"><strong></strong><?php echo $row['user_des']; ?></p>
                </div>
            
                <hr>
                  <div class="row" style="margin-bottom: 10%">
                       <div class="col-md-3" >
                           <h4><strong>12</strong> reservations</h4>  
                        </div>
                      
                       <div class="col-md-3" >
                           <h4><strong>6</strong> quizzes</h4>
                        </div>
                      
                       <div class="col-md-2" >
                           <h4><strong>3</strong> posts</h4>
                        </div>
                      
                       <div class="col-md-4" >
                           
                        </div>
      
                  </div>
           
            </div>     
        </div>      
    </div> 
        
        <div class="row">
            <div class="col-md-6" >
                <div class="webboardTab">
                    <h2>Webboard</h2>
                </div>
                
                <div class="tabtab">
             
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#yourTopics">Your Topics</a></li>
                        <li><a data-toggle="tab" href="#recentPosts">Recent Posts</a></li>
                    </ul>

                <div class="tab-content">
                    <div id="yourTopics" class="tab-pane fade in active">
                        <br>
                        <li >มือสมัครเล่นขอมา Review น้ำหอมที่เคยมีและยังมีอยู่</li>
                        <li>[Home-Cooking Lab] Ep.11 "บลูเบอรี่มัฟฟิ่น" สูตรโคตรง่าย</li>
                        <li>ทำไมในยุโรปหรืออเมริกาสามารถตากผ้าในห้องที่ปิดทึบได้ครับ</li>
                    </div>
        
                <div id="recentPosts" class="tab-pane fade">
                    <br>
                    <li>กระทู้รายงานสด งานประกาศรางวัล Grammy Awards ครั้งที่ 58 ประจำปี 2016 !!!</li>
                    <li>TOP10 แฟชั่นชุดยอดเยี่ยม - ยอดแย่ บนเวที Miss Uiverse 2015 ที่นี่ที่เดียว!</li>
                    <li>ช่วยเลือกน้ำหอมทีครับ คัดเลือกมาแล้ว</li>
                </div>
            
                </div>
        
        
            </div>
         </div>
            
            <div class="col-md-6" >
                <div class="container">
                    <div></div>
                    <h2>Reservation
                    <button class="add">+</button> 
                    
                    </h2>
                    
<div class="rightTab">
     
     <div class="panel-group" id="accordion">
         <br>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Paradox On tour 2016</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">Your reservation code: ABC123</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Manie on stage</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Your reservation code: GTH123</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">8 เปื้อน</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Your reservation code: XYZ123</div>
      </div>
    </div>
  </div> 
</div>
            
    
</div>
 
                
    <div class="container">
                    <h2>Quiz
                         <button class="add">play more</button> 
        
                    </h2>

<div class="rightTab">
        
      <div class="panel-group" id="accordion">
          <br>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">ICEQuiz</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse in">
        <div class="panel-body">Your score: 10</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">What When Where</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Your score: 8</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6   ">Chula2000</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">Your score: 4</div>
      </div>
    </div>
  </div> 
</div>

<script type="text/javascript">
    document.getElementById("editbutton").onclick = function () {
      console.log("hahaha");
      var mid = <?php echo json_encode($mid); ?>;
        location.href = "editProfile.php"+"?mid="+mid;

    };
</script>

<?php

}
?>              
        
</div>
  

            </div>
        
        
        
    </div>
        
        
        
    
    </body>
    
</html>
