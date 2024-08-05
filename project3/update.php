  <?php

   include('conn.php');
  
   if(isset($_POST['edited']) && isset($_POST['id'])){
	
	    $qnty = $_POST['edited'];

		$id   = $_POST['id'];

		 
		$result  = mysqli_query($conn , "UPDATE shopping_list_items SET quantity='$qnty'  WHERE id='$id'");

		if($result){

			echo " Quantity has been updated succesfully";
		}

 }


