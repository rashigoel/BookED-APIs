<?php

	$con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
  
  $fname = $_GET['first_name']; 
  $lname = $_GET['last_name'];
 
  $address = $_GET['address'];
  
 $email = $_GET['email'];


    $statement1 = mysqli_prepare($con, "INSERT INTO Profile_info (FirstName,LastName,Address,Email) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement1, "ssss", $fname, $lname, $address, $email);
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