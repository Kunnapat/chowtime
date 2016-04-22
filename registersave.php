<html>
<body>
    <?php
        $objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $errmsg = "";
        $errmsg1 = "";


    
        if("" == trim($_POST['username'])){
            $errmsg = "please fill in username";
            
        }else if("" != trim($_POST['username'])){
            $query=mysql_query("SELECT username FROM users"); 
            while ($row = mysql_fetch_array($query)){
                if($row["username"] == $_POST['username']){ 
                    $errmsg1 = "Username is already used.";
                } 
            }
            if("" == trim($_POST['question'])){
                $errmsg = "please fill in security question";
            }else if("" == trim($_POST['answer'])){
                $errmsg = "please fill in security answer";
            }else if("" == trim($_POST['fname'])){
                $errmsg = "please fill in first name";
            }else if("" == trim($_POST['lname'])){
                $errmsg = "please fill in last name";
                
            }else if("" == ($_POST['email'])){
                $errmsg = "please fill in email";
                
            }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errmsg = "your email is incorrect format";
        
            }else if("" == trim($_POST['tel'])){
                $errmsg = "please fill in phone number";
            }else if("" != trim($_POST['tel'])){
                if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['tel']) && !preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $_POST['tel'])) {
                    $errmsg = "please fill in valid phone number Ex 011-111-1111,0111111111";
                }
                
                else if("" == trim($_POST['password'])){
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
            if("" != trim($_POST['email'])){
                $query=mysql_query("SELECT email FROM users"); 
                while ($row = mysql_fetch_array($query)){
                    if($row["email"] == $_POST['email']){ 
                        $errmsg = "This email have been used.";
                    }
                }
            }
        }
        
        else if("" == trim($_POST['question'])){
            $errmsg = "please fill in security question";
        }else if("" == trim($_POST['answer'])){
            $errmsg = "please fill in security answer";
        }else if("" == trim($_POST['fname'])){
            $errmsg = "please fill in first name";
        }else if("" == trim($_POST['lname'])){
            $errmsg = "please fill in last name";
            
         }else if("" == ($_POST['email'])){
                $errmsg = "please fill in email";
                
        }else if("" == trim($_POST['email'])){
                $errmsg = "please fill in email";
        
        }else if("" == trim($_POST['tel'])){
            $errmsg = "please fill in phone number";
        }else if("" != trim($_POST['tel'])){
            
                if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['tel']) && !preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $_POST['tel'])) {
                    $errmsg = "please fill in valid phone number Ex 011-111-1111,0111111111";
                }
                
                else if("" == trim($_POST['password'])){
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
            if("" != trim($_POST['email'])){
                $query=mysql_query("SELECT email FROM users"); 
                while ($row = mysql_fetch_array($query)){
                    if($row["email"] == $_POST['email']){ 
                        $errmsg = "This email have been used.";
                    }
                }
            }

            
           


//    if($objQuery){
//        echo "<a href='./museumhome.php'>Register Complete Go BACK TO Homepage</a>";
//    }else{
//        echo "Error: " . $strSQL . "<br>" . $conn->error;
//        
////       echo "<font size=5 color=red>$errmsg<p />
////         <a href=\"javascript: history.back()\">come back to edit</a></font>";
//    }
//    if($errmsg1 != "") {
//    echo "<font size=5 color=red>$errmsg1<p />
//         <a href=\"javascript: history.back()\">come back to edit</a></font>";
//    }
    if($errmsg1 != "") {
        echo "<font size=5 color=red>$errmsg1<p />
         <a href=\"javascript: history.back()\">come back to edit</a></font>";
    }else if($errmsg != "" && $errmsg1 == "") {

    echo "<font size=5 color=red>$errmsg<p />
    <a href=\"javascript: history.back()\">come back to edit</a></font>";
    }else{

        //insert pic
       
            $storeImgPath = "images/member_profile_img/";
            $filetmp = $_FILES["user_picture_file"]["tmp_name"];
            $filename = $_FILES["user_picture_file"]["name"];
            $filetype = $_FILES["user_picture_file"]["type"];
            $filepath = $storeImgPath.$filename;
                  
            if($filetmp){
               move_uploaded_file($filetmp,$filepath);
            }else{
                $filepath = "no picture";
            }              
        
       
       
        $strSQL = "INSERT INTO users ";
        $strSQL .="(user_id,is_member,fname,lname,username,password,email,tel,gender,birthdate,active,secure_quest,secure_ans,profile_pics)";
        $strSQL .="VALUES ";
        $strSQL .="('".'0'."','".'1'."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["tel"]."','".$_POST["gender"]."','".$_POST["birthdate"]."','1','".$_POST["question"]."','".$_POST["answer"]."'";
        $strSQL .=",'".$filepath."')";
        $objQuery = mysql_query($strSQL,$objConnect);

        if($objQuery){

           $mid = $user_id;
           $mname=$_POST['username'];

            echo $mname;
            header('Location: profile.html?mid='.$mid."&mname=".$mname);                 
        }else{
            echo "ERROR: Could not able to execute $objQuery. ";
            print_r($strSQL);
}
        //echo "<a href='./museumhome.php'>Register Complete Go BACK TO Homepage</a>";
        

    }
    mysql_close($objConnect);
    ?>

    <script>

      $.post("profile.html", {mid:mid, function(results){
      // the output of the response is now handled via a variable call 'results'
      console.log("Result: "+results);
      
        
    });

    </script>

</body>
</html>