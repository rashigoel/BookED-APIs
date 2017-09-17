<?php

	$con=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
  
    $uname = $_GET['username'];
    $iurl = $_GET['imageurl'];
    $bname = $_GET['bookname'];
    $bauthor = $_GET['bookauthor'];
    $dp =  $_GET['date_GETed'];
    $ed =  $_GET['ed'];


	
	$statement = mysqli_prepare($con, "INSERT INTO BooksData (email, image_url, book_name, book_author, exchange_donate, date_GETed) VALUES (?,?,?,?,?,?)");
    mysqli_stmt_bind_param($statement, "ssssss",  $uname, $iurl, $bname, $bauthor, $ed , $dp);
    $r = mysqli_stmt_execute($statement);
	
	
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