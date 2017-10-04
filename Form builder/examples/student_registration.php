<!-- page :student_registration.php
     purpose : student registration page
-->
<?php include('config_mysqli.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- jQuery library -->
<meta name="viewport" content="width=device-width">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Latest compiled JavaScript -->
<script type="text/javascript" src="../validation/vendor/jquery/jquery-1.10.2.min.js"></script>
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<link rel="stylesheet" href="../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../validation/dist/js/bootstrapValidator.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
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
                    include('form.php');
                    $frm=new formBuilder;
                    ?>
                            <div class="form-group">
                                <label class="control-label">Admission number</label>
                                <?php
                                $id=mysqli_query($con,"select max(stud_adm_no) from tbl_student_details where inst_id='".$_SESSION['school']."'");// getting lastadmission number
                                if(mysqli_num_rows($id))
                                {
                                    $reg=mysqli_fetch_array($id);
                                    $regno=$reg[0]+1;
                                }
                                else
                                {
                                    $regno=1;
                                }
                                $frm->build("text","txt_adno","txt_adno","form-control","","value='$regno'"); // creating form using form builder written in form.php 
                                $frm->validate("txt_adno",array("required","label"=>"Admission no","max"=>"10","remote"=>"check_admno.php","rmsg"=>"Admission number alrady exist")); // Validating form using form builder written in form.php 
                                ?>                    
                            </div>
                            <div class="form-group">
                                <label class="control-label">Admission date</label>
                                <?php $ad_date=date('Y-m-d');
                                $frm->build("date","dte_admission_date","dte_admission_date","form-control","","value='$ad_date'"); // creating form using form builder written in form.php 
                                $frm->validate("dte_admission_date",array("required","label"=>"Admission date")); // Validating form using form builder written in form.php 
                                ?>                    
                            </div>
                            <div class="form-group">
                                <label class="control-label">First name</label>
                                <?php $frm->build("text","txt_fname","txt_fname","form-control","",""); // creating form using form builder written in form.php 
                                $frm->validate("txt_fname",array("required","max"=>"20","label"=>"First name","regexp"=>"name")); // Validating form using form builder written in form.php 
                                ?>                    
                            </div>
                            <div class="form-group">
                                <label class="control-label">Second name</label>
                                <?php $frm->build("text","txt_lname","txt_lname","form-control","","");
                                $frm->validate("txt_lname",array("required","label"=>"Second name","regexp"=>"name","max"=>"20"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Date of birth</label>
                                <input type='text' name='dat_dob' id='dob' class='form-control' onfocus="(this.type='date')" onfocusout="(this.type='text')"> 
                                <?php
                                $frm->validate("dat_dob",array("required","label"=>"Date of birth"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <select name="sel_gender" class="form-control">
                                    <option value> Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <?php
                                $frm->validate("sel_gender",array("required","label"=>"Gender"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Blood group</label>
                                <select name="sel_blood_group" class="form-control">
                                    <option value>Select Blood Group</option>
                                    <option value="un">Unknown</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="0-">O-</option>
                                </select>
                                <?php
                                $frm->validate("sel_blood_group",array("required","label"=>"Blood group"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Birth place</label>
                                <?php $frm->build("text","txt_birth_place","plo","form-control","","");
                                $frm->validate("txt_birth_place",array("required","label"=>"Birth place","regexp"=>"place","max"=>"50"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nationality</label>
                                <select name="sel_nat" class="form-control">
                                    <option value> Select Nationality</option>
                                    <option value="1">India</option>
                                </select>
                                <?php
                                $frm->validate("sel_nat",array("required","label"=>"Nationality"));
                                ?>
                            </div>
                             <div class="form-group">
                                 <label class="control-label">Mother tongue</label>
                                <?php $frm->build("text","txt_mother_thoungh","mother_tongue","form-control","","");
                                $frm->validate("txt_mother_thoungh",array("required","label"=>"Mother tongue","regexp"=>"text","max"=>"20"));
                                ?>
                            </div>
                            <div class="form-group">
                                 <label class="control-label">Cast</label>
                                <?php $frm->build("text","txt_cast","Cast","form-control","","");
                                $frm->validate("txt_cast",array("required","label"=>"Cast","regexp"=>"text","max"=>"20"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Religion</label>
                                <?php $frm->build("text","txt_religion","txt_religion","form-control","","");
                                $frm->validate("txt_religion",array("required","label"=>"Religion","regexp"=>"text","max"=>"30"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <?php $frm->build("file","fil_image","fil_image","form-control","","");
                                $frm->validate("fil_image",array("label"=>"Image","required"));
                                ?>
                            </div>
                            <div class="form-group text-center">
                                <hr>
                                Contact Details
                                <hr>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address line1</label>
                                <?php $frm->build("textarea","txt_address1","txt_address1","form-control","","");
                                $frm->validate("txt_address1",array("required","label"=>"Address","regexp"=>"address"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address line2</label>
                                <?php $frm->build("textarea","txt_address2","txt_address2","form-control","","");
                                $frm->validate("txt_address2",array("label"=>"Address","regexp"=>"text"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">City</label>
                                <?php $frm->build("text","txt_city","address","form-control","","");
                                $frm->validate("txt_city",array("required","label"=>"Address","regexp"=>"place","max"=>"20"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">State</label>
                                <select class="form-control" name="sel_state">
                                    <option value>Select state</option>
                                    <option value="1">Kerala</option>
                                </select>
                                <?php
                                    $frm->validate("sel_state",array("required","label"=>"State"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Pin number</label>
                                <?php $frm->build("text","txt_pin","txt_pin","form-control","","");
                                $frm->validate("txt_pin",array("required","label"=>"Pin code","regexp"=>"pin"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telephone</label>
                                <?php $frm->build("text","txt_phone","txt_phone","form-control","","");
                                $frm->validate("txt_phone",array("required","label"=>"Phone number"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mobile</label>
                                <?php $frm->build("text","txt_mobile","txt_mobile","form-control","","");
                                $frm->validate("txt_mobile",array("required","label"=>"Mobile number","regexp"=>"mobile"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <?php $frm->build("text","txt_email","txt_email","form-control","","");
                                $frm->validate("txt_email",array("required","label"=>"Email","email"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Aadhar number</label>
                                <?php $frm->build("text","txt_aadhar","txt_aadhar","form-control","","");
                                $frm->validate("txt_aadhar",array("required","label"=>"Aadhar number","regexp"=>"number","max"=>"20"));
                                ?>
                            </div>
                            <div class="form-group text-center">
                                Cource Details
                            </div>
                            <div class="form-group">
                                <label class="control-label">Select Cource</label>
                                <select name="sel_cource" class="form-control" onchange="loadBatch(this.value)">
                                    <option value>Select Cource</option>
                                    <?php $cr=mysqli_query($con,"select * from tbl_course where inst_id='".$_SESSION['school']."'");
                                    while($cource=mysqli_fetch_array($cr))
                                    {
                                        ?>
                                    <option value="<?php echo $cource['course_id'];?>"><?php echo $cource['course_name'];?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <?php
                                    $frm->validate("sel_cource",array("required","label"=>"Cource"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Select Batch</label>
                                <select name="sel_batch" class="form-control" id="batch" onchange="loadRollno(this.value)">
                                    <option>select  batch</option>
                                </select>
                                <?php
                                    $frm->validate("sel_batch",array("required","label"=>"Cource"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Roll number</label>
                                <?php $frm->build("text","txt_r_number","txt_r_number","form-control","","");
                                $frm->validate("txt_r_number",array("required","label"=>"Roll number","regexp"=>"number"));
                                ?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Biometric ID</label>
                                <?php $frm->build("text","txt_bio_id","txt_bio_id","form-control","","");
                                $frm->validate("txt_bio_id",array("required","label"=>"Biometric ID"));
                                ?>
                            </div>
                            <div class="form-group">
                               <?php $frm->build("submit","","","btn btn-success","","Save");?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    <?php $frm->applyvalidations("form1");?>//validating forms using formBuilder class
    function loadBatch(cource_id) { // for load batch of selected cource
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("batch").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "load_batch.php?cource_id="+cource_id, true);
  xhttp.send();
}
    function loadRollno(batch_id) { // for load roll number of selected batch
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("txt_r_number").value = this.responseText;
    }
  };
  xhttp.open("GET", "load_rollno.php?batch_id="+batch_id, true);
  xhttp.send();
}
</script>
</body>
</html>