<html>
<body>
    <?php
        if("" == trim($_POST['username'])){
            $errmsg = "please fill in username";
        }else if("" == trim($_POST['question'])){
            $errmsg = "please fill in security question";
        }else if("" == trim($_POST['answer'])){
            $errmsg = "please fill in security answer";
        }else if("" == trim($_POST['fname'])){
            $errmsg = "please fill in first name";
        }else if("" == trim($_POST['lname'])){
            $errmsg = "please fill in last name";
        }else if("" == trim($_POST['tel'])){
            $errmsg = "please fill in phone number";
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errmsg = "your email is incorrect format";
        }else if("" == trim($_POST['password'])){
            $errmsg = "please fill in password";
        }else if("" == trim($_POST['repassword'])){
            $errmsg = "please fill in confirm password";
            
        }
        if("" != $_POST['password']){
            $pw = $_POST['password'];
        }
        if("" != $_POST['repassword']){
            $repw = $_POST['repassword'];
            
        }
         if($pw != $repw){
            $errmsg = "password and confirm password is not match";
        }
    
//    if($objQuery){
//        echo "<a href='./museumhome.php'>Register Complete Go BACK TO Homepage</a>";
//    }else{
//        echo "Error: " . $strSQL . "<br>" . $conn->error;
//        
////       echo "<font size=5 color=red>$errmsg<p />
////         <a href=\"javascript: history.back()\">come back to edit</a></font>";
//    }
    if($errmsg != "") {
    echo "<font size=5 color=red>$errmsg<p />
         <a href=\"javascript: history.back()\">come back to edit</a></font>";
    }else {
        $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $strSQL = "INSERT INTO members ";
        $strSQL .="(member_id,fname,lname,username,password,email,tel,gender,birthdate,active,secure_quest,secure_ans,confirmation_code,fav_event,profile_pics) ";
        $strSQL .="VALUES ";
        $strSQL .="(0,'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["tel"]."','".$_POST["gender"]."','".$_POST["birthdate"]."','1','".$_POST["question"]."','".$_POST["answer"]."'";
        $strSQL .=",'12345','','NULL') ";
        $objQuery = mysql_query($strSQL);
        echo "<a href='./museumhome.php'>Register Complete Go BACK TO Homepage</a>";
    }
    mysql_close($objConnect);
    ?>
</body>
</html>