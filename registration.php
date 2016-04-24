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
    <link rel="stylesheet" href="css/registration.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
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
                <a class="navbar-brand page-scroll" href="#page-top"><div class="currentpage">CHOWTIME</div></a>
                <a class="navbar-brand page-scroll" href="museumhome.php">Museum</a>
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

                
   
    <body class="bg-plan">
        <div  class="row">
            <div class="col-sm-1 col-md-2"></div>
            <div class="registcontent col-sm-10 col-md-8">
                
                <form action="registersave.php" name="frmAdd" method="post" enctype="multipart/form-data">
                    <br>
                    <h1 style="margin-top:10%; margin-bottom:5%"><font color="#EF788C">Registration</font></h1>
            
                <h4><font color="red">* required field</font></h4>


                <div class="row">
                  <div class="col-md-6" name = "left-content">
                        Username<font color="red">*</font>:<br>
                        <input type="text" class="form-control" name="username" placeholder="username"required/><br>
                        Password<font color="red">*</font>:<br>
                        <input type="password" class="form-control" name="password" placeholder="password"required/><br>
                        Confirm Password<font color="red">*</font>:<br>
                        <input type="password" class="form-control" name="repassword" placeholder="confirm your password" required/><br>
                        Security Question<font color="red">*</font>:<br>
                        <input type="text" class="form-control" name="question" placeholder="your question" required/><br>
                        Answer<font color="red">*</font>:<br>
                        <input type="text" class="form-control" name="answer" placeholder="your answer" required/><br>
                        Gender:<br>
                        <input type="radio" name="gender" value="male" checked> Male
                        <input type="radio" name="gender" value="female"> Female<br>
                       

                  </div>
                  <div class="col-md-6" name = "right-content" >

                        Firstname<font color="red">*</font>:<br>    
                        <input type="text" class="form-control" name="fname" placeholder="firstname" required/><br>  
                        Lastname<font color="red">*</font>:<br> 
                        <input type="text" class="form-control" name="lname" placeholder="lastname" required/><br>
                        Birthdate:
                        <input type="date" class="form-control" name="birthdate"  required/><br>
                        Your profile picture:
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"><br>
                        <input name="user_picture_file" type="file" id="user_picture_file"><br>
                        Email<font color="red">*</font>:<br>
                        <input type="text" name="email" class="form-control" placeholder="email" required/><br>
                        <td>Phone Number<font color="red">*</font>:<br>
                        <input type="text" name="tel" class="form-control" placeholder="phone number" required/><br>
                        <input type="submit" class='button' value="Confirm">      
                        <input type ="button" class='button' onclick="window.location.href='./museumhome.php'" 
                        value="Go back to main page">
                  </div>
                </div>        
                    
                </form>
               
            </div>
        </div>
        
    </body>
        
        
     
    
</html>

