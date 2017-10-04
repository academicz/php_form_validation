<?php
session_start();
include('config_mysqli.php');
$adno=$_POST['txt_adno'];
$qry1="select * from tbl_student_details where stud_adm_no='$adno' and inst_id='".$_SESSION['school']."'";//select booking in given date
$r=mysqli_query($con,$qry1);
if(mysqli_num_rows($r)>0)
{
$isAvailable = false;
}
if(mysqli_num_rows($r)==0)
{
  $isAvailable = true;
}
echo json_encode(array(
    'valid' => $isAvailable, // return  json array 
));
//page for check if admission number is exist 
?>