<html>
<body>
    <?php
        $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $errmsg = "";
        $errmsg1 = "";

        $mid = $_GET['mid'];
        //echo $mid;
    
        
            
            if("" == trim($_POST['fname'])){
                $errmsg = "please fill in first name";
            }else if("" == trim($_POST['lname'])){
                $errmsg = "please fill in last name";      
            }else if("" == trim($_POST['tel'])){
                $errmsg = "please fill in phone number";
            }else if("" != trim($_POST['tel'])){
                if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['tel']) && !preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $_POST['tel'])) {
                    $errmsg = "please fill in valid phone number Ex 011-111-1111,0111111111";
                }                
            
         }else if("" == ($_POST['email'])){
                $errmsg = "please fill in email";
                
        }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $errmsg = "your email is incorrect format";
            
        }else if("" == trim($_POST['fname'])){
            $errmsg = "please fill in first name";
        }else if("" == trim($_POST['lname'])){
            $errmsg = "please fill in last name";            
           
        }else if("" == trim($_POST['tel'])){
            $errmsg = "please fill in phone number";
        }else if("" != trim($_POST['tel'])){
            
                if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $_POST['tel']) && !preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $_POST['tel'])) {
                    $errmsg = "please fill in valid phone number Ex 011-111-1111,0111111111";
                }     
           
        }
         if("" != trim($_POST['email'])){

                $query = mysql_query("SELECT email FROM users WHERE user_id != $mid");
                    while ($row = mysql_fetch_array($query)){
                    if($row["email"] == $_POST['email']){ 
                        $errmsg = "This email have been used.";
                    }
                }               
        }         

    if($errmsg1 != "") {
        echo "<font size=5 color=red>$errmsg1<p />
         <a href=\"javascript: history.back()\">come back to edit</a></font>";
    }else if($errmsg != "" && $errmsg1 == "") {

    echo "<font size=5 color=red>$errmsg<p />
    <a href=\"javascript: history.back()\">come back to edit</a></font>";
    }else{

        $query=mysql_query("SELECT profile_pics FROM users WHERE user_id=".$mid); 
            while ($row = mysql_fetch_array($query)){
                $lastpic = $row['profile_pics'];
            }

            $storeImgPath = "images/member_profile_img/";

            if($lastpic!="no picture"){
                unlink($storeImgPath.$lastpic);
            }
            
                   
            $filetmp = $_FILES["user_picture_file"]["tmp_name"];
            $filename = $_FILES["user_picture_file"]["name"];
            $filetype = $_FILES["user_picture_file"]["type"];
            $filepath = $storeImgPath.$filename;
                  
            if($filetmp){
               move_uploaded_file($filetmp,$filepath);
            }else{
                $filepath = "no picture";
            }


        $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
                  

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $birthdate = $_POST['birthdate'];
        $user_des = $_POST['user_des'];
         

           
        $strSQL = "UPDATE users SET fname = '$fname'
                                    ,lname = '$lname'
                                    ,email = '$email' 
                                    ,tel = '$tel' 
                                    ,gender = '$gender' 
                                    ,birthdate = '$birthdate'
                                    ,user_des = '$user_des' 
                                    ,profile_pics =  '$filepath' WHERE user_id = '$mid' ";
        

        $objQuery = mysql_query($strSQL,$objConnect)or die("Update error  :".mysql_error());
        
         // $query=mysql_query("SELECT profile_pics FROM users WHERE user_id=".$mid); 
         //    while ($row = mysql_fetch_array($query)){
         //        $lastpic = $row['profile_pics'];
         // 

        if($objQuery){      
            echo "<script type='text/javascript'>window.top.location='profile.php?mid=$mid';</script>"; exit;
            //header('Location: profile.php?mid='.$lastID."&"."mname=".$_POST['username']);                 
        }else{
            echo "ERROR: Could not able to execute $objQuery. ";
            print_r($strSQL);
        }
        //echo "<a href='./museumhome.php'>Register Complete Go BACK TO Homepage</a>";
        

    }
    mysql_close($objConnect);
    ?>

    

</body>
</html>