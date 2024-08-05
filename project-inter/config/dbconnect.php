<?php

 $serverName = "127.0.0.1";
 $userName = "root";
 $password ="aporose";
 $dbName="advanced";
 
 $conn = new mysqli($serverName,$userName,$password,$dbName);

 if($conn->error){

    die("connection failed:".$conn->error);
 }

//  echo "connection successfully";



?>