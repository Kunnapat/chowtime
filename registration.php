<?php
session_start();

if($_POST)  {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $tel = $_POST['tel'];
  $gender = $_POST['gender']; 
  $birthdate = $_POST['birthdate']; 


  if(empty($username)) {
    $errmsg = "please fill in username";
  }
  else   if(empty($question)) {
    $errmsg = "please fill in secure question";
  }
  else   if(empty($answer)) {
    $errmsg = "please fill in answer";
  }
   else  if(empty($fname)) {
    $errmsg = "please fill in first name";
  }
  else   if(empty($lname)) {
    $errmsg = "please fill in last name";
  }
  else   if(empty($tel)) {
    $errmsg = "please fill in phone number";
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errmsg = "your email is incorrect format";
  }
  else if(empty($password)) {
    $errmsg = "please fill in password";
  }
    else if(empty($repassword)) {
    $errmsg = "please fill in confirm password";
  }
  else if($password != $repassword) {
    $errmsg = "password and confirm password is not match";
  }
 

  if($errmsg != "") {
    echo "<font size=5 color=red>$errmsg<p />
         <a href=\"javascript: history.back()\">come back to edit</a></font>";
  }
  else{
//    $Uid = mysql_insert_id();
    echo "Register Complete!<br>";   
  }
    //$strTo = $login;
    //$strSubject = "ยืนยันการเป็นสมาชิกเว็บbetterme-th.com";
    //$strHeader = "Content-type: text/html; charset=UTF-8\n"; // or UTF-8 //
    //$strHeader .= "From: webmaster@betterme-th.com\nReply-To: webmaster@betterme-th.com";
    //$strMessage = "";
    //$strMessage .= "ยินดีต้อนรับ : ".$_POST['flname']."<br>";
    //$strMessage .= "=================================<br>";
    //$strMessage .= "กรุญากดยืนยันการเป็นสมาชิก.<br>";
    //$strMessage .= "http://www.betterme-th.com/activate.php?SID=".$SID."&uid=".$Uid."<br>";
    //$strMessage .= "=================================<br>";
    //$strMessage .= "Betterme-TH.Com<br>";

    //$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);
    //echo "Register Complete!";
    //if ($flgSend) {
    //  echo "Please check your email to activate the account";
    //}
//
//    require("PHPMailer_v5.0.2/class.phpmailer.php");
//    $mail = new PHPMailer(true);
//
//    try{
//      $body = "";
//      $body .= "ยินดีต้อนรับ : ".$_POST['flname']."<br>";
//      $body .= "=================================<br>";
//      $body .= "กรุญากดยืนยันการเป็นสมาชิก.<br>";
//      $body .= "http://www.betterme-th.com/activation.php?SID=".$SID."&uid=".$Uid."<br>";
//      $body .= "=================================<br>";
//      $body .= "Betterme-TH.Com<br>";
//
//      $mail->IsHTML(true);
//      $mail->CharSet = "utf-8";
//      $mail->IsSMTP();
//      $mail->SMTPDebug = 0;
//      $mail->SMTPAuth = true;
//      $mail->Host = "mx1.hostinger.in.th"; // SMTP server
//      $mail->Port = 2525; // พอร์ท
//      $mail->Username = "webmaster@betterme-th.com"; // account SMTP
//      $mail->Password = "k4dbmIOIv6"; // รหัสผ่าน SMTP
//
//      $mail->SetFrom("webmaster@betterme-th.com", "webmaster@betterme-th.com");
//      $mail->AddReplyTo("webmaster@betterme-th.com", "webmaster@betterme-th.com");
//      $mail->Subject = "ยืนยันการเป็นสมาชิกเว็บbetterme-th.com";
//
//      $mail->MsgHTML($body);
//
//      $mail->AddAddress("".$_POST['login'], "".$_POST['flname']); // ผู้รับคนที่หนึ่ง
//
//      if(!$mail->Send()) {
//          echo "Mailer Error: " . $mail->ErrorInfo;
//      } else {
//          echo "Email sent!";
//      } 
//    } catch (phpmailerException $e) {
//      echo $e->errorMessage(); //Pretty error messages from PHPMailer
//    } catch (Exception $e) {
//      echo $e->getMessage(); //Boring error messages from anything else!
//    }

//  header("Refresh: 3; url=login.php");
  exit;
}
?>

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
                <center>
                <form action="registersave.php" name="frmAdd" method="post">
                    <br>
                    <h1 style="margin-top:10%; margin-bottom:5%"><font color="#EF788C">Registration</font></h1>
            
                <h4><font color="red">* required field</font></h4>
                <table style="width:50%;">
                  <tr>
                    <td>Username<font color="red">*</font>:</td>
                    <td><input type="text" name="username" required/></td> 
                  </tr>
                  <tr>
                    <td>Password<font color="red">*</font>:</td>
                    <td><input type="password" name="password" required/></td>
                  </tr>
                  <tr>
                    <td>Confirm Password<font color="red">*</font>:</td>
                    <td><input type="password" name="repassword" required/></td>
                  </tr>
                  <tr>
                    <td>Security Question<font color="red">*</font>:</td>
                    <td><input type="text" name="question" required/></td>
                  </tr>
                  <tr>
                    <td>Answer<font color="red">*</font>:</td>
                    <td><input type="text" name="answer" required/></td>
                  </tr>
                  <tr>
                    <td>Firstname<font color="red">*</font>:</td>
                    <td><input type="text" name="fname" required/></td>
                  </tr>
                <tr>
                    <td>Lastname<font color="red">*</font>:</td>
                    <td><input type="text" name="lname" required/></td>
                  </tr>
                  <tr>
                    <td>Email<font color="red">*</font>:</td>
                    <td><input type="text" name="email" required/></td>
                  </tr>
                <tr>
                    <td>Phone Number<font color="red">*</font>:</td>
                    <td><input type="number" name="tel" required/></td>
                  </tr>
                <tr>
                    <td>Gender:</td>
                    <td><input type="radio" name="gender" value="male" checked> Male
                  <input type="radio" name="gender" value="female"> Female</td>
                  </tr>
                <tr>
                    <td>Birthdate:</td>
                    <td><input type="date" name="birthdate" required/></td>
                  </tr>
                <tr>

                 </table>
                    <br><br>
<!--                    <a href='./profile.html' class='button'>Confirm</a>-->
                    <input type="submit" class='button' value="Confirm">
                    <a href='./museumhome.php' class='button'>Cancel</a>
                </form>
                </center>
            </div>
        </div>
        
    </body>
        
        
     
    
</html>

