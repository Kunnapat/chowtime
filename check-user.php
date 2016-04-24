<?php
session_start();
ob_start();
include "connection.php";
if(!isset($_SESSION['user_id'])) {
//    echo "<script>location.href = 'museumhome.php#popup1';</script>";
	header("Location: museumhome.php#popup1");
//	exit;
}else{
<<<<<<< Updated upstream
//    echo "user_id: ".$_SESSION['user_id'];
=======
    //echo "user_id: ".$_SESSION['user_id'];
>>>>>>> Stashed changes
}
?>