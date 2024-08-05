<?php
 session_start();
 include('config/dbconnect.php');

 if(isset($_POST['id'])){
    
   $id = $_POST['id'];

   $sql = " DELETE FROM shopping_list_items where id =$id";

   $query = mysqli_query($conn,$sql);

   if($query){

    echo "Item has been deleted successfully";
   }else{



   }

 }

?>