<?php
    session_start();
    $_SESSION['score'] +=1;
    echo $_SESSION['score'];

?>