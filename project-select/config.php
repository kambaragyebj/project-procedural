<?php
   // Database configuration    
   $hostname = "127.0.0.1"; 
   $username = "root"; 
   $password = "aporose"; 
   $dbname   = "dropdown";
    
   // Create database connection 
   $con = new mysqli($hostname, $username, $password, $dbname); 
    
   // Check connection 
   if ($con->connect_error) { 
       die("Connection failed: " . $con->connect_error); 
   }
?>