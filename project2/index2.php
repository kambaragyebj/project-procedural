<?php

$dbname ="devprox";
$username = "root";
$password = "aporose";

$connection = new  mysqli($serverName,$username,$password,$dbname);

if($connection->connect_error){

    die("Connection failed:".$connection->error);
}

echo "Database connected succussfully";


?>