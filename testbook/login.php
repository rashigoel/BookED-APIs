<?php
    
	$con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
    
    $email = $_GET["email"];
    $password = $_GET["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM UserDB WHERE email = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $email, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $name, $email, $password);
    
    $response = array();
    $response["success"] = false;  
    
	
	
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["name"] = $name;
        $response["email"] = $email;
        $response["password"] = $password;
    }

    $con->close();
    
    echo json_encode($response);
?>