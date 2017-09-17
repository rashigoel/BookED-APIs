<?php

	
	$con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
   
    $email = $_GET["email"];
	$latitude = $_GET["latitude"];
	$longitude = $_GET["longitude"];
        echo $email ;
		echo $latitude;
		echo $longitude;

    $sql = "INSERT INTO `ADRESS` (email,latitude,longitude) VALUES ($email,$latitude,$longitude)";
    if ($con->query($sql) === TRUE) {
        $response = array();
        $response["success"] = true;  
    } else {
        $response = array();
    $response["success"] = false;  
    }
  
    
    echo json_encode($response);
?>