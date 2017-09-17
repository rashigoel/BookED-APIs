<?php
    
	//$con=mysqli_connect("sql105.unaux.com","unaux_20378841","booked","unaux_20378841_booked");
	$con=mysqli_connect("testbook","ieeedtu_testbook","booked1201","ieeedtu_testbook");

    $email = $_GET["email"];
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    
    $statement = mysqli_prepare($con, "SELECT FirstName , LastName , University,Contact,Address FROM Profile_info WHERE email = ?");
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $f, $l , $University, $Contact, $Address );
    
    $response = array();
    $response["success"] = false;  
    
    if(mysqli_stmt_fetch($statement)){
      
        if($f==NULL || $l==NULL){
        
           $statement1 = mysqli_prepare($con, "Update Profile_info set FirstName=? , LastName=?  WHERE email = ?");
    mysqli_stmt_bind_param($statement1, "sss",$fname,$lname, $email);
    mysqli_stmt_execute($statement1);

         
        }

        $response["success"] = true;  
        $response["university"] = $University;
        $response["contact"] = $Contact;
        $response["address"] = $Address;
    }else{ 
	
    $statement2 = mysqli_prepare($con, "INSERT INTO Profile_info(Email, FirstName, LastName) values(?,?,?)");
    mysqli_stmt_bind_param($statement2, "sss", $email , $fname , $lname);
    mysqli_stmt_execute($statement2);
    }

    $con->close();
    
    echo json_encode($response);
	exit();
?>						