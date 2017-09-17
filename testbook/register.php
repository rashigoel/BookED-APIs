<?php

try{ 
	$con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
}catch(Exception $e )  {
	 echo 'Caught exception: ',  $e->getMessage(), "\n";
}
  
  $email = $_GET['email'];
  $fname = $_GET['first_name']; 
  $lname = $_GET['last_name'];
  $address = $_GET['address']; 
  $latitude = $_GET['latitude'];
  $longitude = $_GET['longitude'];
  $phone = $_GET['phone'];
 
 echo $address . $fname . $lname ;

	try{ 
	$statement = mysqli_prepare($con, "INSERT INTO Profile_info(FirstName,LastName,Address,latitude,longitude,Contact,Email) VALUES (?,?,?,?,?,?,?)");
    echo "hi1";
	mysqli_stmt_bind_param($statement, "sssssss", $fname,$lname,$address,$latitude,$longitude,$phone, $email);
    echo "hi2";
	$r = mysqli_stmt_execute($statement);
	}catch(Exception $e )  {
	 echo 'Caught exception: '.  $e->getMessage(). "\n";
	}
	
	$response = array();
    if($r === TRUE ){
        $response["success"] = true;  
    }
	else{
	$response["success"] = false;  
	}

    $con->close();
   
    
    
    echo json_encode($response);
?>			