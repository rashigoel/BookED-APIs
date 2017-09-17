<?php

	
	$sql=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
$email = $_GET['email'];

     $query = "SELECT Profile_info.FirstName,Profile_info.LastName ,
Profile_info.Contact , Profile_info.latitude , Profile_info.longitude,
BooksData.image_url , BooksData.book_name , BooksData.book_author , BooksData.exchange_donate , BooksData.date_posted
FROM Profile_info
INNER JOIN BooksData
ON BooksData.email=Profile_info.Email where BooksData.email!='$email' and Profile_info.Email !='$email' ";

   

   $result = $sql->query($query);     
       if (!$result) {
       printf("Query failed: %s\n", $mysqli->error);
       exit;
   }      
 

  while($row = $result->fetch_row()) {
   $rows[]=$row;
  }
     $result->close();
    $sql->close();
    
    echo json_encode($rows);
?>	