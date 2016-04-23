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
    <link rel="stylesheet" href="css/adminf.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    
<body id="page-top">
    

    <div id="header">
        <div class="logo"><a href="#">Chowtime<span>Admin</span></a></div>

     </div>

    <div id ="container">
        <div class="sidebar">
            <ul id ="nav">

            <li><a  href="adminf.html">Dashboard</a></li> 
            <li><a href="admine.php">Manage Events</a></li> 
            <li><a href="adminex.php">Manage Exhibitions</a></li> 
            <li><a href="adminm.html">Manage Members</a></li> 
            <li><a href="#">Manage Reservations</a></li> 
            <li><a class="selected" href="#">Manage Subscriptions</a></li> 

            <li><a href="#">Manage Quizzes</a></li>
            <li><a href="#">Go to Website Statistics</a></li> 

            <li><a href="#">Settings</a></li> 
            <li><a href="#" > Log Out</a></li> 

            </ul>
        </div>
        <div class="content">
    <h1> Manage Subscriptions </h1>
     <p>This is Chowtime Subsciption Management Page to Manage Subscriptions and Create Newsletter.</p>

     

               <div id="box">

                    <div class="box-top">Manage Subscriptions</div>
                    <div class="box-panel">
                   
                    <section>
        <form method="post">
                <div>
                    
              
                    Visitor's Email: <input type="email" name="email" class="form-control">
                <br>
                        <input type="radio" name="subscribe" value="subscribe" class=".radio-inline" checked>Subscribe
                    <input type="radio" name="subscribe" value="unsubscribe" class=".radio-inline" style="margin-left:5px;">Unsubscribe
                    <hr>
                    <button class="btn btn-primary">Subscribe/Unsubscribe</button>
                </div>
            </div>
                        
        </form>
      </section>
                                 </div>
            <?php
            if($_POST) {
                include "connection.php";

                $email = $_POST['email'];
                $class = ' class="err"';
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $msg = "invalid email";
                }
                else {
                    if($_POST['subscribe']=="subscribe") {
                        $sql = "SELECT COUNT(*) FROM newsletter WHERE email = '$email'";
                        $rs = mysqli_query($link, $sql);
                        $data = mysqli_fetch_array($rs);
                        if($data[0] != 0) {
                            $msg = "you are already subscribed";
                        }
                        else {
                            $sql = "INSERT INTO newsletter VALUES('$email', CURRENT_DATE())";
                            mysqli_query($link, $sql);
                            $msg = "subscribed";
                            $class = "";
                        }
                    }
                    else if($_POST['subscribe']=="unsubscribe") {
                        $sql = "DELETE FROM newsletter WHERE email = '$email'";
                        mysqli_query($link, $sql);
                    }
                }
                echo "<h3$class>$msg</h3>";
                mysqli_close($link);
            }
            ?>
        </section>
        
        <div id="box">
 <div class="box-top">Create Newsletter</div>
    
    <div class="box-panel">
            <form method="post">
           <div>
               <input type="text" class="form-control .col-sm-8" name="subject" placeholder="Subject" value="<?php echo stripslashes($_POST['subject']); ?>" required><br>
            <textarea class="form-control .input-lg" row="15" name="body" placeholder="Content"><?php echo stripslashes($_POST['body']); ?></textarea>

            <span>
                <br>
                <label>
                    Send
                    <select name="limit">
                        <option value="10"<?php if($_POST['limit']==10) echo " selected"; ?>>10</option>
                        <option value="15"<?php if($_POST['limit']==15) echo " selected"; ?>>15</option>
                        <option value="20"<?php if($_POST['limit']==20) echo " selected"; ?>>20</option>
                    </select> Emails (They will not be sent to the same person)
                </label>
                <hr>
                <button class="btn btn-primary">Send</button><br class="clear">
            </span>
           </div>
            
        </form>

<?php
        if($_POST) {
            date_default_timezone_set('Asia/Bangkok');

            require "lib/PHPMailer/class.phpmailer.php";
            
            $subject = stripslashes($_POST['subject']);
            $body = stripslashes($_POST['body']);
            $limit = $_POST['limit'];
            
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';

            $mail->Host       = "mx1.hostinger.in.th"; // SMTP server example
            $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Port       = 2525;                    // set the SMTP port for the GMAIL server
            $mail->Username   = "admin@chanikarn.xyz"; // SMTP account username example
            $mail->Password   = "chowtime";        // SMTP account password example
            $mail->SMTPSecure = 'tls';  
            $mail->isHTML(true);   

            $mail->setFrom('admin@chanikarn.xyz', 'Admin');
            $mail->Subject = $subject;
            $mail->msgHTML($body);
            
            include "connection.php";
//            $link = @mysqli_connect("localhost", "root", "root", "chowtime")
//            or die(mysqli_connect_error()."</body></html>");

//เลือกอีเมลมาเป็นจำนวนเท่ากับที่เลือกจากฟอร์ม
            $sql = "SELECT email FROM newsletter WHERE last_sent < CURRENT_DATE() LIMIT $limit";
            $rs = mysqli_query($link, $sql);
//ส่งอีเมลไปยังสมาชิกเหล่านั้น
//            $eml = array();
//            while($data = mysqli_fetch_array($rs)) {
//                $e = "<".$data['email'].">";
//                array_push($eml, $e);
//        }
//            $to = implode(",", $eml);
//            mail_to("$to");
//            $mail->addAddress($to);
            foreach ($rs as $row) {
                $e = $row['email'];
                $mail->addAddress($e);
                if($mail->send()) {   //ถ้าส่งสำเร็จให้อัปเดตวันที่ส่งข่าวสารล่าสุดเป็นวันที่ปัจจุบัน
                    mysqli_data_seek($rs, 0);
                    while($data = mysqli_fetch_array($rs)) {
                        $e = $data['email'];
                        $sql = "UPDATE newsletter SET last_sent = CURRENT_DATE()
                        WHERE email = '$e'";
                        @mysqli_query($link, $sql);
                    }
                echo "newsletter is sent";
                }else{
                    echo "error occur";
                }
                $mail->clearAddresses();
            }
            
        
        //ต่อไปเป็นขั้นตอนตรวจสอบว่ามีจำนวนสมาชิกทั้งหมดเท่าไหร่
        $sql = "SELECT COUNT(*) FROM newsletter";
        $rs = @mysqli_query($link, $sql);
        $data = @mysqli_fetch_array($rs);
        $subscribers = $data[0];        

        //ยังเหลืออีกกี่คนที่ยังไม่ได้ส่งข่าวสารไปให้
        $sql = "SELECT COUNT(*) FROM newsletter 
        WHERE last_sent < CURRENT_DATE()";

        $rs = @mysqli_query($link, $sql);
        $data = @mysqli_fetch_array($rs);
        $pending = $data[0];            

        echo "<br><b>จำนวนสมาชิกที่ต้องส่งข่าวสาร:</b> " . number_format($subscribers);
        echo "&nbsp;&nbsp;<b>จำนวนค้างส่ง:</b> " . number_format($pending);
        mysqli_close($link);
    }
?>
     
  
       
                    </div>
                    
             </div>



            </div>
     </div>
        

        </div>
    </body>
    </div>
    

</body>

</html>
