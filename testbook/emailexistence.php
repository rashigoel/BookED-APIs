<?php

	
     $sql=mysqli_connect("localhost","ieeedtu","wmgStranger505++","ieeedtu_testbook");
  
   
   $email = $_GET["email"];
   $password = $_GET["password"];
   $s="1";
   $f = "0";


    $query = "Select `email` FROM `Profile_info` where `email` = '$email'";
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
    
    if($rows == NULL ) echo $f;
    else
    echo $s;
?>						