<?php 
session_start();

include "check-user.php"; 
$user_id = $_SESSION['user_id']; 

?>

<html>
<head>
<title>PHP & MySQL Tutorial</title>
</head>
<body>
<?php

	$objConnect = mysql_connect("localhost","root","root") or die("Error Connect to Database");
	$objDB = mysql_select_db("chowtime");
	
    $topic_id =5;
    $category= $_POST["category"];
    switch ($category) {
        case op1: $category="CU Museum";
        break;
        case op2: $category="CU Music Hall";
        break;
        case op3: $category="Events";
        break;
        case op4: $category="Exhibitions";
        break;
        case op5: $category="FAQ";
        break;
        default: $category="none";    
    }
    $topicn = $_POST["topicName"];
    $desc = $_POST["desc"];
    $date = date("Y-m-d H:i:s", strtotime(str_replace('-', '/', $date)));

if(count($_FILES) > 0) {
if(is_uploaded_file($_FILES['topicimg']['tmp_name'])) {

$imgData =addslashes(file_get_contents($_FILES['topicimg']['tmp_name']));
$imageProperties = getimageSize($_FILES['topicimg']['tmp_name']);
}
}
    /*
        $sql="INSERT INTO eikones (auxon, path) VALUES ('','$file')";

     if (!mysql_query($sql))
     {
        die('Error: ' . mysql_error());
     }
     echo "<font size = '5'><font color=\"#0CF44A\">SAVED TO DATABASE";

   }

   mysql_close();
*/
    
	//*** Insert topics ***//

    $strSQL="INSERT INTO topics (user_id, category, title, content, datetime, topic_pics)
VALUES
($user_id,'$category','$topicn','$desc',NOW(), $imgData)";
    
   
    
	$objQuery = mysql_query($strSQL);
            
	

	echo "Save Done.  Click <a href='webboard.php'>here</a> to view.";
    
  
mysql_close($objConnect);
?>
</body>
</html>