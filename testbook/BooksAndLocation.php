<?php

	
     $sql=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  

	 $email = $_GET["email"];
    $query = "select email, book_name , latitude , longitude from Profile_info NATURAL JOIN BooksData WHERE `email`!='$email';";
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