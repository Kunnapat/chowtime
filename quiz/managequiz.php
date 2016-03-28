<?php include "../connection.php" ?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Manage Quiz</title>
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="../css/managequiz.css" type="text/css">
        
 
    </head>
    
    <body>
        <div class="container">
          <h2>Manage Quiz</h2>
          <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#active">Active</a></li>
            <li><a data-toggle="pill" href="#quiz">Quiz</a></li>
            <li><a data-toggle="pill" href="#question">Question</a></li>
            <li><a data-toggle="pill" href="#choice">Choice</a></li>
          </ul>

          <div class="tab-content">
          
          
<!--          ACTIVE QUIZ DIV -->
            <div id="active" class="tab-pane fade in active">
              <h3>Active Quiz</h3>
              <p>Manage Active Quiz</p>
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Active</th>
                          <th>ID</th>
                          <th>Quiz Name</th>
                          <th>Description</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Staff ID</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $sql = "SELECT * FROM quizzes";
                        $rs = mysqli_query($link,$sql);
                        while($rows[] = mysqli_fetch_assoc($rs));
                        array_pop($rows); 
                        foreach($rows as $q){
                            echo "<tr>";
                            echo "<td><input type='checkbox'></td>";
                            foreach($q as $quiz){
                                echo "<td>$quiz</td>";
                       
                            }
                            
                            echo "</tr>";
                        }
                    ?> 
                  </tbody>
              </table>
              <input class="btn btn-primary" type="submit" value="Submit">
            </div>
            
<!--            MANAGE QUIZ DIV-->
            <div id="quiz" class="tab-pane fade">
              <div id="content">
                  <h3>Quiz</h3>
                  <p>Show all quizzes</p>
              </div>
              <div id="addnew"><a href="addquiz.php"><input class="btn btn-primary" value="Create New Quiz"></a></div>
              
              <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Edit</th>
                          <th>ID</th>
                          <th>Quiz Name</th>
                          <th>Description</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Staff ID</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $sql = "SELECT * FROM quizzes";
                        $query = mysqli_query($link,$sql);
                        while($rs = mysqli_fetch_array($query)){
                    ?> 
                    
                    <tr>
                        <td><a href="editquiz.php?id=<?php echo $rs['quiz_id']; ?>">Edit</a></td>
                        <td><?php echo $rs['quiz_id']; ?></td>
                        <td><?php echo $rs['qname']; ?></td>
                        <td><?php echo $rs['description']; ?></td>
                        <td><?php echo $rs['start_date']; ?></td>
                        <td><?php echo $rs['end_date']; ?></td>
                        <td><?php echo $rs['staff_id']; ?></td>
                    </tr>
                    
                    <?php } ?>
                  </tbody>
              </table>
              <input class="btn btn-primary" type="submit" value="Submit">
            </div>
            
<!--            MANAGE QUESTION DIV-->
            <div id="question" class="tab-pane fade">
              <h3>Question</h3>
              <p>Manage Question</p>
            </div>
            
<!--            MANGAE CHOICE DIV-->
            <div id="choice" class="tab-pane fade">
              <h3>Choice</h3>
              <p>Manage Choice</p>
            </div>
          </div>
        </div>

        
        
        
        
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    </body>
    
</html>