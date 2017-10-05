<!-- page :student_registration.php
     purpose : student registration page
-->
<!DOCTYPE html>
<html>
<head>
   
<meta name="viewport" content="width=device-width">
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<!-- Validator css and js -->  
  
<link rel="stylesheet" href="../dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../dist/js/bootstrapValidator.js"></script>
    
</head>
<body>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Student Registration</h3>
                    </div>

                    <div class="panel-body">
                        <form id="form1" method="post" action="process_student_reg.php" enctype="multipart/form-data">
                            <div class="form-group">
                               General Details 
                                <hr>
                            </div>
                            
                                <?php
                    include('../Form.php');
                    $frm=new formBuilder;
                    ?>
                            <div class="form-group">
                                <label class="control-label">Admission number</label>
                                <input type="text" name="txt_adno" class="form-control">
                                <?php
                                    $frm->validate("txt_adno",array("required","label"=>"Admission no","max"=>"10","remote"=>"check_admno.php","rmsg"=>"Admission number alrady exist")); // Validating form using form builder written in form.php 
                                    ?>                    
                            </div>
                            <div class="form-group">
                                <label class="control-label">Admission date</label>
                                <input type="date" name="dte_admission_date" class="form-control">
                                <?php 
                                    $frm->validate("dte_admission_date",array("required","label"=>"Admission date")); // Validating form using form builder written in form.php 
                                ?>                    
                            </div>
                            <div class="form-group">
                                <label class="control-label">First name</label>
                                <input type="text" name="txt_name" class="form-control">
                                <?php 
                                    $frm->validate("txt_name",array("required","max"=>"20","label"=>"First name","regexp"=>"name")); // Validating form using form builder written in form.php 
                                ?>                    
                            </div>
                            
                            <div class="form-group">
                               <button class="btn btn-succes">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    <?php $frm->applyvalidations("form1");?>//validating forms using formBuilder class
</script>
</body>
</html>
