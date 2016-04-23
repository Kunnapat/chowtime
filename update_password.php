<html>
    <body>
        <?php
            $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
            $objDB = mysql_select_db("chowtime");
            $mid = $_GET['mid'];
            $q = mysql_query("SELECT * FROM users WHERE user_id='$mid' ")or die(mysql_error());
            $newPw = $_POST['newPw'];
            $oldPw = $_POST['oldPw'];
            $inputAnswer = $_POST['secureAns'];
            echo "New pw is ".$newPw;   
        
                //Check security question
                 while($row = mysql_fetch_array($q)){
                     
                     $mname = $row['username'];
                     $manswer = $row['secure_ans'];
                     $mpassword = $row['password'];
                     
                 }
        
                if($inputAnswer==$manswer && $oldPw==$mpassword) {
                    //order
                    $strSQL = "UPDATE users SET password = '$newPw' WHERE user_id = '$mid' ";
        
                    //execute
                    $objQuery = mysql_query($strSQL,$objConnect)or die("Update error: ".mysql_error());
                    
                } else {
                    echo "Hello its me again, your input answer is wrong.";
                }
        
                //successful execute
                if($objQuery){             
                    echo "<script type='text/javascript'>window.top.location='profile.php?mid=$mid&mname=$mname';</script>"; 
                    // header('Location: profile.php?mid='.$lastID."&"."mname=".$_POST['username']);                 
                }else{
                 echo "ERROR: Could not able to execute $objQuery. ";
                
                
            }
            ?>
        
    

    </body>
</html>