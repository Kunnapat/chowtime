<html>
<body>
    <?php
        $answer = $_POST['answer'];
     
        $objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
        $objDB = mysql_select_db("chowtime");
        $strSQL = "SELECT * FROM members WHERE secure_ans='$answer' ";
	// Execute the query (the recordset $rs contains the result)

	$rs = mysql_query($strSQL);
    $row = mysql_fetch_array($rs);
    if($row!=NULL){
        echo "<a href='./profile.html'>Go to Profile page</a>";
    }else {
        echo "<a href='./museumhome.php#popup3'>Your answer is not correct</a> <br>";
        echo "<a href='./registration.php'>Register</a>";
    }
    

//	 Close the database connection
	mysql_close();
    ?>
</body>
</html>