<?php

 include("conn.php");


 if(isset($_POST['id'])){

	 $sql  = "DELETE FROM shopping_list_items WHERE id =".$_POST["id"]."";

	 $result = mysqli_query($conn, $sql);

	 if ($result) {

		 //echo " Data deleted from the database";

	 }

}

?>