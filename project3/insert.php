<?php

 include("conn.php");

 if(isset($_POST['item_name']) && isset($_POST['qnt_number'])){

      $itemName  = $_POST["item_name"];

      $quantity  = $_POST["qnt_number"];      

      $item      = mysqli_real_escape_string($conn,$itemName);

      $qnty      = mysqli_real_escape_string($conn,$quantity);


      $sql       = "INSERT INTO shopping_list_items (item,quantity) VALUES('".$item."','".$qnty."')";
     
      $result    = mysqli_query($conn,$sql);

      if($result){

      	 //echo " Item has been submitted successfully";

       } else {

    			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }


}


?>