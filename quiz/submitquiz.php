<?php

    include("../connection.php");

    if($_POST)  {
        $qname = $_POST['qname'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $staff_id = 1;

        $sql = "INSERT INTO quizzes VALUES(0,'$qname','$description','$start_date','$end_date',1)";
    //    $sql = "INSERT INTO quizzes VALUES(0,'test','test','2016-12-12','2016-11-12',1)";
        
        $rs = mysqli_query($link, $sql);
        
    }
?>