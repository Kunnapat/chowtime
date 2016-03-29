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
    <?php
//        $i=1;
        if (isset($_REQUEST['id'])) {
            $i=base64_decode($_REQUEST['id']);
        }else{
            $i=1;
        }
        if (isset($_REQUEST['score'])) {
            $currentScore=base64_decode($_REQUEST['score']);
        }else{
            $currentScore=0;
        }
        include "connection.php"
//        $sql = "SELECT q.content,c.content FROM questions q, choices c WHERE c.question_id=1 AND q.question_id=1";
    
    ?>
    <body>
        <div class="container-fluid">
           <?php 
            $qSQL = "SELECT content FROM questions WHERE question_id='$i'";
            $rs = mysqli_query($link, $qSQL);
            $question = mysqli_fetch_array($rs);
            
            
            ?>
            <div class="row top">
                <div class="col-xs-1 col-md-2 header">Q<?php echo"$i"; ?>/15</div>
                <div class="col-xs-10 col-md-8" id="question"><?php echo $question[0]; ?></div>
                <div class="col-xs-1 col-md-2 header"><?php echo"$currentScore"; ?></div>
            </div>
            <hr>
           
            <div class="bottom">
                <?php 
                    $ansSQL = "SELECT content FROM choices WHERE is_correct=1 AND question_id='$i'";
                    $rs3 = mysqli_query($link,$ansSQL);
                    $correctAns = mysqli_fetch_array($rs3);
                
                    $cSQL = "SELECT content FROM choices WHERE question_id='$i'";
                    $rs2 = mysqli_query($link, $cSQL);
                    while($rows[] = mysqli_fetch_assoc($rs2));
                    array_pop($rows); 
                foreach($rows as $c){
                    foreach($c as $choices){
//                        echo "<div class='row choice'  >$choices</div>";
                        echo "<button class='row choice' onclick='calculate($choices)'>$choices</button>";
                       
                    }
                }
               
                ?>
<!--                <button id="choice" onclick="calculate()">1916</button>-->

            </div>
        </div>
        
        <script>
          function calculate(selectedChoice){
              var ans = <?php echo $correctAns[0]; ?>;
              var i = <?php echo $i; ?>;
              var currentScore = <?php echo"$currentScore"; ?>; 
              
//              if(selectedChoice === ans){
//                  alert('true');
//              }
              $.ajax({
                  type: "POST",
                  url: "checkans.php",
                  data: { ans: selectedChoice, correct: ans, i: i, currentScore: currentScore }
                }).done(function( msg ) {
//                  alert( "Update: " + msg );
                    var url = "quiz2.php?"+msg;
                    location.href = url;
                });
          }



        </script>
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>