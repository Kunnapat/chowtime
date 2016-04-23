<?php
    session_start();
    include "connection.php";
//    include "check-user.php";
    
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Quiz</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/quiz2.css" type="text/css">

    </head>
    
    <body>
        <div class="row top">
            <h1 class="result">Active Quiz</h1>
        </div>
        <hr>
        
        <div class="bottom">
            <table class="table" id="avaquiz">
               <thead>
                   <th>Quiz ID</th>
                   <th>Quiz Name</th>
                   <th>Start Date</th>
                   <th>End Date</th>
                   <th>Play</th>
               </thead>
               <tbody>
                   <?php 
                        
                        $sql = "SELECT quiz_id,qname,start_date,end_date FROM quizzes where datediff(end_date,now())>0";
                        $rs = mysqli_query($link,$sql);
                        while($rows[] = mysqli_fetch_assoc($rs));
                        array_pop($rows); 
                        foreach($rows as $q){
                            echo "<tr>";
                           
                            foreach($q as $quiz){
                                echo "<td>$quiz</td>";
                       
                            }
                            echo "<td><button class='play' onclick='toquiz({$q['quiz_id']})'>PLAY</button></td>";
                            
                            echo "</tr>";
                        }
                    ?> 
               </tbody>
                
            </table>
        </div>
        
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
        <script>
            function toquiz(id){
                location.href = "quiz2.php?quiz_id=" + id;
            }
        </script>
    </body>
    
</html>
