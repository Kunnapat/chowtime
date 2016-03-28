


<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Add Question</title>
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="css/managequiz.css" type="text/css">
    </head>
    <body>
        <div class="col-sm-2"></div>
       <div class="containaer col-sm-8">
          <form>
           <h3>Quiz: <?php echo "$qname and $id"; ?></h3>
       
           <h4>Question</h4>
           <h4 id="q"><input type="text" name="question" size="50"> ? </h4>

           <h4>Answer</h4>

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
                       <td><input type="text" name="ans1" class="chiocebox"></td>
                       <td><div align="center"><input type="checkbox"></div></td>
                   </tr>
                   <tr>
                       <td>2</td>
                       <td><input type="text" name="ans2"></td>
                       <td><div align="center"><input type="checkbox"></div></td>
                   </tr>
                   <tr>
                       <td>3</td>
                       <td><input type="text" name="ans3"></td>
                       <td><div align="center"><input type="checkbox"></div></td>
                   </tr>
                   <tr>
                       <td>4</td>
                       <td><input type="text" name="ans4"></td>
                       <td><div align="center"><input type="checkbox"></div></td>
                   </tr>
               </tbody>
           </table>
           <input type="submit" name="next" value="Add More Question">
           <input type="submit" name="done" value="Done">
           </form>
       </div>
       
       

        
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>