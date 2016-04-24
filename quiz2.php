<?php  
    session_start();

//    include "check-user.php";
    include "connection.php";
    if (isset($_REQUEST['quiz_id'])) {
        $quiz_id = $_REQUEST['quiz_id'];
    }else{
        $quiz_id = 1;
    }

    $sql = "SELECT COUNT(*) FROM questions WHERE quiz_id=$quiz_id";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result) == 0) {
        mysqli_close($link);
        
        exit;
    }else{
        $amount = 4;
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
        <div class="container-fluid">
         <div class="row top">
             <?php
        $begin = 1;   //แถวเริ่มต้นในการอ่านข้อมูล
        if($_GET['begin']) {
            $begin = $_GET['begin'];
        }
        $length = 1;	//จำนวนคำถามในการอ่านข้อมูลแต่ละช่วง
        if($_GET['length']) {
            $length = $_GET['length'];
        }
        if($begin==1){
            $_SESSION[score] = 0;
//            echo $_SESSION['score'];
        }

        $begin--;   //ลำดับแถวใน MySQL เริ่มจาก 0
        $sql = "SELECT * FROM questions WHERE quiz_id = $quiz_id LIMIT $begin, $length";
        $result = mysqli_query($link, $sql);
        $num = $begin + 1;
        
        
             
        while($data = mysqli_fetch_array($result)) {
            $question_text = $data['content'];
            $question_id = $data['question_id'];
            $sql = "SELECT * FROM choices WHERE question_id = $question_id ORDER BY choice_id ASC";
            $r = mysqli_query($link, $sql);
            echo "<div class='col-xs-1 col-md-2 header'>Q".$num."/".$amount."</div>";
            echo "<div class='col-xs-10 col-md-8' id='question'>".$question_text."</div>";
            echo "<div class='col-xs-1 col-md-2 header'>".$_SESSION['score']."</div>";	
            echo '</div>';
            
            while($ch = mysqli_fetch_array($r)) {
                if(isset($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT choice_id FROM choices WHERE question_id = $question_id";  //AND subject_id = $subject_id 
                    $choose = mysqli_query($link, $sql);
                    $row = mysqli_fetch_array($choose);
                    $id = $row[0];
                    
                }
//                echo "<div class=\"choice\">{$ch['content']}</div><br>";
                echo "<div class='bottom'><button class='row choice' onclick='nextques({$ch['content']})'>{$ch['content']}</button></div>";
            }
            $num++;
        }
         
        $ansSQL = "SELECT content FROM choices WHERE is_correct=1 AND question_id=$question_id";
        $rs3 = mysqli_query($link,$ansSQL);
        $correctAns = mysqli_fetch_array($rs3);
             
    ?>
            
        
        
        <script>
            function nextques(selected){
//                alert("yay");
                var url = "quiz2.php?quiz_id=" + <?php echo $quiz_id; ?>;
                var begin = <?php echo $begin; ?>;
                begin += 2;
                url = url + "&begin=" + begin + "&length=1";
                var correct = <?php echo $correctAns[0]; ?>;
                var amount = <?php echo $amount; ?>;
                var endgame = <?php echo $begin; ?>;
                
                if(selected==correct){
                    $.ajax({
                    type: "POST",
                    url: "updatescore.php",
                    data: {}
                    }).done(function( msg ) {
    //                  alert( "Update: " + msg );
//                        alert(msg);
                   
                    });
                }else{
                    alert("CORRECT answer is " + correct);
                }
                if((endgame+1)==amount){
                    url = "quizresult.php";
                }

                location.href = url;
            }



        </script>
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>