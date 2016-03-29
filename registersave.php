<html>
<body>
    <?php
    
     
        $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $strSQL = "INSERT INTO members ";
        $strSQL .="(member_id,fname,lname,username,password,email,tel,gender,birthdate,active,secure_quest,secure_ans,confirmation_code,fav_event,profile_pics) ";
        $strSQL .="VALUES ";
        $strSQL .="(0,'".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["tel"]."','".$_POST["gender"]."','".$_POST["birthdate"]."','1','".$_POST["question"]."','".$_POST["answer"]."'";
        $strSQL .=",'12345','','NULL') ";
        $objQuery = mysql_query($strSQL);
    if($objQuery){
        echo "<a href='./museumhome.php'>Register Complete Go BACK TO Homepage</a>";
    }else{
        echo "Error: " . $strSQL . "<br>" . $conn->error;
//       echo "<font size=5 color=red>$errmsg<p />
//         <a href=\"javascript: history.back()\">come back to edit</a></font>";
    }
    mysql_close($objConnect);
    ?>
</body>
</html>