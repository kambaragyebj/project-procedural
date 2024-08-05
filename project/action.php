<?php
   // Include Configuration File
   include_once "config.php";

   if (isset($_POST['save_category']) && !empty($_POST['add_category'])) {

      var_dump($aCountries);
      $category = $_POST['add_category'];
      $status   = !empty($_POST['status']) ? 1 : 0;
      
      $query = "INSERT INTO `categories`(`category_name`, `status`) VALUES ('$category','$status')";
      if ($con->query($query)) {
         $message = "Category add successful";
         header("Location: index.php?message=".$message."");
      }else{
         $message = "Category does not addedd please try again!";
         header("Location: index.php?message=".$message."");
      }
   }

   if(isset($_POST['submit'])) 
   {
     $aCountries = $_POST['formCountries'];

     var_dump($aCountries);
  
  if(!isset($aCountries)) 
  {
    echo("<p>You didn't select any countries!</p>\n");
  } 
  else 
  {
    $nCountries = count($aCountries);
    
    echo("<p>You selected $nCountries countries: ");
    for($i=0; $i < $nCountries; $i++)
    {
      echo($aCountries[$i] . " ");
    }
    echo("</p>");
  }
}
?>