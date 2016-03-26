<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php
	$objConnect = mysql_connect("localhost","root","00000000") or die("Error Connect to Database");
	$objDB = mysql_select_db("registration");
	for($i=1;$i<=$_POST["hdnLine"];$i++)
	{
		if($_POST["txtProfID$i"] != "")
		{
			
			$strSQL = "INSERT INTO professor ";
			$strSQL .="(pid,pname,salary) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$_POST["txtProfID$i"]."','".$_POST["txtProfName$i"]."', ";
			$strSQL .="'".$_POST["txtSalary$i"]."') ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo "Save Done.  Click <a href='listRecord.php'>here</a> to view.";

mysql_close($objConnect);
?>
</body>
</html>
