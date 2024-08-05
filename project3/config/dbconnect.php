<?php

 $serverName = "127.0.0.1";
 $userName = "root";
 $password ="aporose";
 $dbName="restaurant";
 
 $con = new mysqli($serverName,$userName,$password,$dbName);

 if($con->error){

    die("connection failed:".$con->error);
 }

 echo "connection successfully";

?>