<html>
<body>
    <?php
        $username = $_POST['username'];
        $password = $_POST ['password'];  

     
        $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $strSQL = "SELECT * FROM members ";
	// Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($strSQL);
    if($rs){
        if($username==NULL || $password==NULL){
            echo "<a href='./museumhome.php#popup1'>Please fill in Username/Password</a>";
        }
        while($row = mysql_fetch_array($rs)) {
            if($row['username']==$username && $row['password']==$password){
                echo "<a href='./profile.html'>Login Complete GO TO Profile page</a>";
            }else if($row['username']==$username && $row['password']!=$password){
                echo "<a href='./museumhome.php#popup2'>ForgetPassword?</a>";
            }
        }
    }else {
        echo "User dosen't exit!";
    }
    

//	 Close the database connection
	mysql_close();
    ?>
</body>
</html>