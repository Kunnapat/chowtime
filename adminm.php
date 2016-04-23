<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CHOWTIME</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/adminf.css" type="text/css">
    <link rel="stylesheet" href="css/admine.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    
<body id="page-top">
    

    <div id="header">
        <div class="logo"><a href="#">Chowtime<span>Admin</span></a></div>

     </div>

    <div id ="container">
        <div class="sidebar">
            <ul id ="nav">

            <li><a href="adminf.html">Dashboard</a></li> 
            <li><a href="admine.php">Manage Events</a></li> 
            <li><a href="adminex.php">Manage Exhibitions</a></li> 
            <li><a class="selected" href="#">Manage Members</a></li> 
            <li><a href="#">Manage Reservations</a></li> 
            <li><a href="adminsub.html">Manage Subscriptions</a></li> 

            <li><a href="#">Go to Database</a></li>
            <li><a href="#">Go to Website Statistics</a></li> 

            <li><a href="#">Settings</a></li> 
            <li><a href="#">Log Out</a></li> 

            </ul>
        </div>
           <div class="content">
               
               
               
    <h1> Manage Members </h1>
     <p>This is Chowtime member admin for managing all vital members information.</p>

              <div id="box">
            <div class="box-top">Note:</div>
                    <div class="box-panel">
                        <h5>Please cautiously operate this page.</h6>
                        <br> -Add Radio Button for Active?
                        <br> -Encrypt Password
                           <br> -Changable
        
                  </div>
             </div>
               <hr>
            
          


         
       <div id="box">
            <div class="box-top">Administrative Table:</div>
                    <div class="box-panel">
 
<?php 
$objConnect = mysql_connect("localhost","root","00000000") or die("Error Connect to Database"); 
$objDB = mysql_select_db("chowtime"); 

//*** Update Condition ***// 
if($_GET["Action"] == "Save") 
{ 
    for($i=1;$i<=$_POST["hdnLine"];$i++) 

    { $strSQL = "UPDATE users SET ";
        
       
        $strSQL .="user_id = '".$_POST["txtuser_id$i"]."' "; 
        $strSQL .=",username = '".$_POST["txtusername$i"]."' ";
        $strSQL .=",email = '".$_POST["txtemail$i"]."' ";

        $strSQL .=",tel = '".$_POST["txttel$i"]."' ";
        $strSQL .=",active = '".$_POST["txtactive$i"]."' ";

        $strSQL .="WHERE user_id = '".$_POST["hdnuser_id$i"]."' "; 
       
         

         
        //echo $strSQL; 
        $objQuery = mysql_query($strSQL); 
    } 
    //header("location:$_SERVER[PHP_SELF]"); 
    //exit(); 
} 

$strSQL = "SELECT * FROM users ORDER BY user_id ASC"; 
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
?> 
<form name="frmMain" method="post" action="adminm.php?Action=Save"> 
<table width="600" border="1"> 
  <tr> 
   <th width="91"> User ID </th>
    <th width="98"> <div align="center">Username </div></th>
    <th width="98"> <div align="center">Email </div></th>

    <th width="98"> <div align="center">Tel </div></th>
          <th width="98"> <div align="center">Active </div></th>

    
  </tr> 
<?php 
$i =0;
while($objResult = mysql_fetch_array($objQuery)) 
{ 
    $i = $i + 1; 
?> 
  <tr> 
    <td> 
    
    <input type="text" name="txtuser_id<?php echo $i;?>" size="10" value="<?php echo $objResult["user_id"];?>"> 
    <input type="hidden" name="hdnuser_id<?php echo $i;?>" size="10" value="<?php echo $objResult["user_id"];?>"> 
    </td> 
    
    <td><input type="text" name="txtusername<?php echo $i;?>" size="20" value="<?php echo $objResult["username"];?>"></td> 
    
    <td><input type="text" name="txtemail<?php echo $i;?>" size="20" value="<?php echo $objResult["email"];?>"></td> 
    
    <td><input type="text" name="txttel<?php echo $i;?>" size="20" value="<?php echo $objResult["tel"];?>"></td> 

          <td><input type="text" name="txtactive<?php echo $i;?>" size="20" value="<?php echo $objResult["active"];?>"></td> 


    


  </tr> 
<?php 
} 
?> 
</table> 
    <br>
  <input button class="pull-right btn-primary" type="submit" name="submit" value="submit">  
  <input type="hidden" name="hdnLine" value="<?php echo $i;?>"> 
</form> 
<?php 
mysql_close($objConnect); 
?> 
       
  </div>
             </div>
             </div>

</body>

</html>
