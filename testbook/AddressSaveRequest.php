<?php

  $con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
    
  
  $university = $_GET['university']; 
  $contact = $_GET['contact']; 
  $address = $_GET['address']; 
  $email = $_GET['email'];
  $lat= $_GET["latitude"];
  $lon= $_GET["longitude"];

$response = array();


        $response["university"] = $university;  
        $response["contact"] = $contact;  
        $response["address"] = $address;  

 $response["lat"] = $lat;  
        $response["lon"] = $lon; 

        $response["email"] = $email; 


    $statement = mysqli_prepare($con, "Update Profile_info set University=? , Contact=? , Address=? , latitude=? , longitude=? where Email = ?");
    mysqli_stmt_bind_param($statement, "ssssss", $university , $contact, $address , $lat, $lon, $email);
    $ex = mysqli_stmt_execute($statement);
 
    if($ex == TRUE){
        $response["success"] = true;  

    }
else{
 $response["success"] = false;  
}


    $con->close();
   
    
    
    echo json_encode($response);
?>	