<?php

include("../connection.php");

    if($_POST)  {
        $id = $_POST['id'];
        $quiz_id = $_POST['quiz_id'];

        $sql = "UPDATE quizzes SET winner=$id where quiz_id=$quiz_id";
        
        $rs = mysqli_query($link, $sql);
        
    }

?>