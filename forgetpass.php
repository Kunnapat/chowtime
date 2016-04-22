<html>
<body>
    <?php
        $email = $_POST['email'];
     
        $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $strSQL = "SELECT * FROM members WHERE email='$email' ";
	// Execute the query (the recordset $rs contains the result)

	$rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);
    if($row!=NULL){
        echo "<a href='./museumhome.php#popup3'>Answer Secure Question</a> <br>";
        echo $_POST['email'];
    }else {
        echo "email not found <a href='./museumhome.php#popup2'>Go back</a> <br>";
        echo "<a href='./registration.php'>Register</a>";
    }
    

//	 Close the database connection
	mysql_close();
    ?>
</body>
</html>