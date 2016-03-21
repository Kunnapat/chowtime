<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Send Mail</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    </head>
    
    <body>
        <h1>Create Newsletter</h1>
        <hr>
        <form method="post">
           <div class="col-xs-10">
               <input type="text" class="form-control .col-sm-8" name="subject" placeholder="Subject" value="<?php echo stripslashes($_POST['subject']); ?>" required><br>
            <textarea class="form-control .input-lg" row="15" name="body" placeholder="Content"><?php echo stripslashes($_POST['body']); ?></textarea>
            <hr>
            <span>
                <label>
                    Send
                    <select name="limit">
                        <option value="10"<?php if($_POST['limit']==10) echo " selected"; ?>>10</option>
                        <option value="15"<?php if($_POST['limit']==15) echo " selected"; ?>>15</option>
                        <option value="20"<?php if($_POST['limit']==20) echo " selected"; ?>>20</option>
                    </select> Emails (Email will not be sent to the same person)
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
        
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>