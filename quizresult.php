<?php
    session_start();
    include "connection.php";
//    include "check-user.php";
    $score = $_SESSION['score'];
    $member_id = $_SESSION['user_id'];
    $percentage = ($score/3)*100;
    
    if(isset($_SESSION['score'])){
        $sql = "INSERT INTO play VALUES ($score,now(),$member_id,4)";
        mysqli_query($link,$sql);
    }
    
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
                <h1 class="result">You Scored: <?php echo $score ?>/3</h1>
        </div>
        <hr>
        
        <div class="bottom" style="margin-top:80px;">
            <a href="http://twitter.com/share?text=I scored a <?php echo $percentage ?>%25 on this quiz. Try to beat my score at&amp;url=chanikarn.xyz/quiz2.php&amp;hashtags=ChowTimeQuiz" target="_blank"><button class="share btn ">Share on Twitter</button></a>
            <a href="http://www.facebook.com/sharer/sharer.php?u=www.chanikarn.xyz/quiz2.php" target="_blank"><button class="share btn">Share on Facebook</button></a>
        </div>
        
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
    
</html>
