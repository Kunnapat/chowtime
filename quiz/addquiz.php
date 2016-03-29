
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Add New Quiz</title>
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
        
        <!--Custom CSS-->
        <link rel="stylesheet" href="../css/managequiz.css" type="text/css">
        <link rel="stylesheet" href="../css/datepicker.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    </head>
    
    <body>
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
           <h3>Add Quiz</h3>
           
<!--           <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">-->
                <div class="form-group">
                  <label for="qname">Quiz Name:</label>
                  <input type="text" class="form-control" id="qname" name="qname" value="<?php echo $qname; ?>" required>

                  <label for="description">Description:</label>
                  <input type="text" class="form-control" id="description" name="description" value="<?php echo $description; ?>" required>

                  <div class="control-group">
                    <label for="date-picker-2" class="control-label">Start Date</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="date-picker-2" type="text" class="date-picker form-control" name="start_date" id="start_date" placeholder="YYYY-MM-DD" value="<?php echo $start_date; ?>" required/>
                            <label for="date-picker-2" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                            </label>
                        </div>
                    </div>
                </div>

                 <div class="control-group">
                    <label for="date-picker-2" class="control-label">End Date</label>
                    <div class="controls">
                        <div class="input-group">
                            <input id="date-picker-2" type="text" class="date-picker form-control" name="end_date" id="end_date" placeholder="YYYY-MM-DD" value="<?php echo $end_date; ?>" required/>
                            <label for="date-picker-2" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>

                            </label>
                        </div>
                    </div>
                </div>


                </div>
                
                <input class="btn btn-primary" type="submit" name="submit" value="Submit" onclick="submitfn()"/>
               
<!--           </form>-->
            
              
            </div>
            
            
       </div>
        
        <script>
            function submitfn(){
                var qname = $('#qname').val();
                var description = $('#description').val();
                var start_date = $('#start_date').val();
                var end_date = $('#end_date').val();
                $.ajax({
                    type: "POST",
                  url: "submitquiz.php",
                  data: { qname: qname, description: description, start_date: start_date, end_date: end_date }
                }).done(function( msg ) {
    //                  alert( "Update: " + msg );
                    alert("Quiz Added");
                    var url = "managequiz.php"
                    location.href = url;
                });
            }
            
            $(function () {
              $(".date-picker").datepicker({ 
                    autoclose: true, 
                    todayHighlight: true
              }).datepicker('update', new Date());;
            });
            
    </script>
        
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
    </body>
    
</html>