<?php
# page for checking remote data from database for validating data

$available = true; # based on your requirment
if($available)
{
    $isAvailable = false;
}
if(mysqli_num_rows($r)==0)
{
    $isAvailable = true;
}
echo json_encode(array(
    'valid' => $isAvailable, # return  json array 
));

?>