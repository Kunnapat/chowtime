<?php 
include "../connection.php";
    if (isset($_REQUEST['id'])) {
        $quiz_id = $_REQUEST['id'];
    }
?>

<?php
if($_POST) {
    $q = $_POST['question'];
    
        //เพิ่มคำถามลงในตาราง question ก่อน
		$sql = "REPLACE INTO questions VALUES('', '$q', '$quiz_id')";
		if(@mysqli_query($link, $sql)) {
			//อ่านค่า id ของคำถามที่เพิ่มใหม่ เพื่อนำไปเชื่อมโยงกับตัวเลือกในตาราง choice
			$question_id = mysqli_insert_id($link);   
			
			//ตัวเลือกถูกส่งขึ้นมาในรูปแบบอาร์เรย์ เราจะใส่ลงในตาราง choice ทีละตัวเลือก
			for($i = 1; $i <= count($_POST['choice']); $i++) {
				$ch_text = $_POST['choice'][$i];
				$answer = "0";
				if($_POST['answer'] == $i) {	//ถ้าตัวเลือกนั้นถูกกำหนดให้เป็นคำตอบ(ดูเลขลำดับอาร์เรย์ในฟอร์มประกอบ)
					$answer =  "1";
				}
				$sql = "REPLACE INTO choices VALUES('$ch_text', '$answer', '$question_id',0, '$quiz_id')";
				mysqli_query($link, $sql);
			}
			$msg = 'Question Added';
			
		}
		else {
			$msg = "Error. Please try again";
		}
    echo '<script type="text/javascript">alert("'.$msg.'");</script>';
}
?>


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Add Question</title>
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="../css/managequiz.css" type="text/css">
    </head>
    <body>
        <div class="col-sm-2"></div>
       <div class="containaer col-sm-8">
          <form method="post" id="qans" class="qans">
           
       
           <h4>Add New Question</h4>
           <h4 id="q"><input type="text" name="question" id="question" size="50"> ? </h4>

           <h4 class="not-inline">Answer</h4>

           <table class="table table-striped">
               <thead>
                   <tr>
                       <th>Id</th>
                       <th>Answers</th>
                       <th><div align="center">Is correct?</div></th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>1</td>
                       <td><input type="text" id="ans1" name="choice[1]"></td>
                       <td><div align="center"><input type="radio" value="1" name="answer" checked></div></td>
                   </tr>
                   <tr>
                       <td>2</td>
                       <td><input type="text"  id="ans2" name="choice[2]"></td>
                       <td><div align="center"><input type="radio" value="2" name="answer"></div></td>
                   </tr>
                   <tr>
                       <td>3</td>
                       <td><input type="text"  id="ans3" name="choice[3]"></td>
                       <td><div align="center"><input type="radio" value="3" name="answer"></div></td>
                   </tr>
                   <tr>
                       <td>4</td>
                       <td><input type="text"  id="ans3" name="choice[4]"></td>
                       <td><div align="center"><input type="radio" value="4" name="answer"></div></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" name="done" value="Submit" class="btn btn-primary">
           <a href="managequiz.php"><input class="btn btn-primary" value="Go to Manage Quiz Page"></a>
           </form>
           
       </div>
       

        
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    </body>
</html>