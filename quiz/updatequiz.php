<?php

    include("../connection.php");
    
    if($_POST)  {
        $quiz_id = $_POST['quiz_id'];
        $qname = $_POST['qname'];
        $description = $_POST['description'];
//        $start_date = $_POST['start_date'];
//        $end_date = $_POST['end_date'];
        $staff_id = 1;
        
//        echo "$start_date";

        $sql = "UPDATE quizzes SET qname='$qname', description='$description' WHERE quiz_id='$quiz_id'";
//
//        
        $rs = mysqli_query($link, $sql);
        
    }
?>