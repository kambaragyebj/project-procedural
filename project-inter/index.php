<?php
include_once("config/dbconnect.php");

$add_dishe = "INSERT INTO shopping_list_items(item,quantity) VALUES ('test',902)";

$result    = mysqli_query($conn,$add_dishe);

if($result){

  echo " Item has been submitted successfully";

} else {

       echo "Error: " . $add_dishe . "<br>" . mysqli_error($conn);
}

//$sql       = "INSERT INTO shopping_list_items (item,quantity) VALUES('".$item."','".$qnty."')";

?>