<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ChowtimeAdmin</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/cssadmin.css" type="text/css">
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
        <div class="logo"><a href="adminf.html">Chowtime<span>Admin</span></a></div>

     </div>

    <div id ="container">
        <div class="sidebar">
            <ul id ="nav">

            <li><a href="adminf.html">Dashboard</a></li> 
            <li><a class="selected" href="#">Manage Events</a></li> 
            <li><a href="adminex.php">Manage Exhibitions</a></li> 
            <li><a href="adminm.html">Manage Members</a></li> 
            <li><a href="#">Manage Reservations</a></li> 
            <li><a href="adminsub.html">Manage Subscriptions</a></li> 

            <li><a href="#">Manage Quizzes</a></li>
            <li><a href="#">Go to Website Statistics</a></li> 

            <li><a href="#">Settings</a></li> 
            <li><a href="#">Log Out</a></li> 

            </ul>
        </div>
        
<!--
        <?php
$servername = "localhost";
$username = "root";
$password = "00000000";
$dbname = "chowtime";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO events (event_id, ename, start_date, end_date, organizer, type, description, staff_id)
VALUES ('222', 'Doe', '2015-10-01', '2015-11-01', 'aummy', 'best', 'eieigumgum', '1')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
-->



        <div class="content">
    <h1> Manage Events </h1>
         <p>This Panel is for Administrators to Add or Edit Exhibitions.</p>

                    <div id="box">
                    <div class="box-top">Current Events</div>
                    <div class="box-panel"><a href="#">Manage Current Events</a></div>

                    <div id="box">
                    <div class="box-top">Add New Events</div>

                   
                    

            <div class="container">
                    <div class="row">
                       <div class="col-lg-2 col-md-2"></div>
                        <div class="col-lg-8 col-md-8">



                            <!-- POST -->
                            <div class="post" id="content">
                 
                                <form action="admineposted.php" class="form newtopic" method="post">
            
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img src="img/avatar.jpg" alt="" />
                                                
                                            </div>

                                            <div class="icons">
                                            Upload Image
                                            </div>
                                        </div>
                                        <div class="posttext pull-left">

                                            <div>
                                                <input type="text" name="event_id" placeholder="Enter Event ID" class="form-control" />
                                            </div>
 <div>
                                                <input type="text"
                                                       name="ename"
                                                       placeholder="Enter Event Title" class="form-control" />
                                            </div>
                                             <div>
                                                <input type="text"
                                                       name="start_date"
                                                       placeholder="Enter Event Start Date" class="form-control" />
                                            </div>

                                             <div >
                                                <input type="text"
                                                       name="end_date"
                                                       placeholder="Enter Event End Date" class="form-control" />
                                            </div>

                                             <div>
                                                <input type="text"
                                                       name="organizer"
                                                       placeholder="Enter Event Organizer" class="form-control" />
                                            </div>

                                             <div>
                                                <input type="text"
                                                       name="type"
                                                       placeholder="Enter Event Type" class="form-control" />
                                            </div>


                                          

                                            <div>
                                                <textarea name="desc" id="desc"
                                                          name="description"
                                                          placeholder="Description"  class="form-control" ></textarea>
                                            </div>
                                            
                                            <div>
                                                <input type="text"
                                                       name="staff_id"
                                                       placeholder="Enter Staff ID '1'" class="form-control" />
                                            </div>
                                        
                                            


                                        </div>
                                        <div class="clearfix"></div>
                                    </div>                              
                                    <div class="postinfobot">

                                        

                                        

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>

                            </div><!-- POST -->


             </div>


        </div>

    </div>
    

</body>

</html>
