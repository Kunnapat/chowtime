<?php 

//may change from base64 to encrypt for better security

    $ans = $_POST['ans'];
    $correct = $_POST['correct'];
    $i = $_POST['i'];
    $j = $i+1;
    $strJ=base64_encode($j);
    $score = $_POST['currentScore'];
    
    if($ans==$correct){
        $score += 1;
        $strScore=base64_encode($score);
         echo "id=$strJ&score=$strScore";
    }else{
        $strScore=base64_encode($score);
        echo "id=$strJ&score=$strScore";
    }
//  echo "$ans and correct: $correct";
    
 ?>