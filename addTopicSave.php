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
    $user_id=1;
    $staff_id=1;
    $topicn = $_POST["topicName"];
    $desc = $_POST["desc"];
    $date = date("Y-m-d H:i:s", strtotime(str_replace('-', '/', $date)));

    
    $storeImgPath = "images/topic_pics/";
        $storeImgPath = $storeImgPath . basename( $_FILES['topicimg']['name']);
    //This gets all the other information from the form
    $Filename=basename( $_FILES['topicimg']['name']);
    

if(move_uploaded_file($_FILES['topicimg']['tmp_name'], $storeImgPath)) {
    //Tells you if its all ok
    echo "The file ". basename( $_FILES['topicimg']['name']). " has been uploaded, and";
    
            $filetmp = $_FILES["topicimg"]['tmp_name'];
            $filename = $_FILES["topicimg"]['name'];
            $filetype = $_FILES["topicimg"]['type'];
            $filepath = $storeImgPath.$filename;
                  
            if($filetmp){
               move_uploaded_file($filetmp,$filepath);
            }else{
                $filepath = "no picture";
            }
}
    
    echo $storeImgPath;
    echo 'path' .$filepath;
    
	//*** Insert topics ***//

    $strSQL="INSERT INTO topics (user_id, category, title, content, datetime, topic_pics)
VALUES
($user_id,'$category','$topicn','$desc',NOW(), '$filepath')";
    
   
    
	$objQuery = mysql_query($strSQL);
            
	

	echo "Save Done.  Click <a href='webboard.php'>here</a> to view.";
    
  
mysql_close($objConnect);
?>
</body>
</html>