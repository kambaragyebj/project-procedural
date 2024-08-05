<?php
 session_start();
 error_reporting(0);

include('config/dbconnect.php');
//isset
if  (!empty($_POST['item_name']) &&  !empty($_POST['qnt_number'])){
      
    $item      = mysqli_real_escape_string($conn,$_POST['item_name']);

    $qnty      = mysqli_real_escape_string($conn,$_POST['qnt_number']);

    $sql = "INSERT INTO shopping_list_items (item,quantity) VALUES('".$item."','".$qnty."')";

    $result = mysqli_query($conn,$sql);

    if($result){

      echo "Item submitted successfully";

    }else{


        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}else{


    echo "Not successfully";
}


?>