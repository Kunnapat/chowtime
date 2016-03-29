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
            <li><a class="selected" href="#">Manage Events</a></li> 
            <li><a href="adminex.php">Manage Exhibition</a></li> 
            <li><a href="adminm.html">Manage Members</a></li> 
            <li><a href="#">Manage Reservations</a></li> 
            <li><a href="adminsub.html">Manage Subscriptions</a></li> 

            <li><a href="#">Go to Database</a></li>
            <li><a href="#">Go to Website Statistics</a></li> 

            <li><a href="#">Settings</a></li> 
            <li><a href="#">Log Out</a></li> 

            </ul>
        </div>
 
<?php
$servername = "localhost";
$username = "root";
$password = "00000000";
$dbname = "chowtime";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);} 
    
$sql="INSERT INTO events (event_id, ename, start_date, end_date, organizer, type, description, staff_id)
VALUES
('$_POST[event_id]',
'$_POST[ename]',
'$_POST[start_date]',
'$_POST[end_date]',
'$_POST[organizer]',
'$_POST[type]',
'$_POST[description]',
'$_POST[staff_id]')";
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
    

             </div>


        </div>

    </div>
    

</body>

</html>
