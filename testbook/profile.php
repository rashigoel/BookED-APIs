<?php

	$con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
  
  $fname = $_GET['fname'];  
  $lname = $_GET['lname']; 
  $sex = $_GET['sex']; 
  $university = $_GET['university']; 
  $contact = $_GET['contact']; 
  $address = $_GET['address']; 
  $email = $_GET['email'];
  $lat= $_GET["latitude"];
  $lon= $_GET["longitude"];




    $statement1 = mysqli_prepare($con, "Update Profile_info set FirstName=? ,LastName=?,sex=?, University=? , Contact=? , Address=? , latitude=? , longitude=? where Email = ?");
    mysqli_stmt_bind_param($statement1, "sssssssss", $fname, $lname, $sex , $university , $contact, $address , $lat, $lon, $email);
    $ex = mysqli_stmt_execute($statement1);
 $response = array();
    if($ex === TRUE){
        $response["success"] = true;  

    }
else{
 $response["success"] = false;  
}


    $con->close();
   
    
    
    echo json_encode($response);
?>	