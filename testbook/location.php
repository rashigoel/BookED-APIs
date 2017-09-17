<?php

	
	$con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
   
    $email = $_GET["email"];
	$latitude = $_GET["latitude"];
	$longitude = $_GET["longitude"];
        

    $sql = "INSERT INTO ADRESS (latitude,longitude,email) VALUES ($latitude,$longitude,$email)";
    if ($con->query($sql) === TRUE) {
        $response = array();
        $response["success"] = true;  
    } else {
        $response = array();
    $response["success"] = false;  
    }
  
    
    echo json_encode($response);
?>