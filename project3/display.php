<?php

include("conn.php");

 // sort item items in the list alphabetically, case-insensitive

 $sql = "SELECT id, item,quantity FROM shopping_list_items ORDER BY item ,BINARY(item) DESC";

 $result = mysqli_query($conn,$sql);

 $ouput = "";

 $ouput .='<table  class="table table-striped">
         
      <thead>
      <tr>
        <th width="10%">Position</th>
        <th width="60%">Item</th>
        <th width="10%">Quantity</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>';

 while($row = mysqli_fetch_array($result)){
          
   $ouput .= '
          <tr id='.$row["id"].' >
           <td data-target="id">'.$row["id"].'</td>
           <td data-target="item">'.$row["item"].'</td>
           <td data-target="qnt_number" contenteditable="true">'.$row["quantity"].'</td>
   
           <td><button class="btn btn-primary update" type="button" data-role="update" data-id ='.$row["id"].'  >Save</button></td>
           <td><button type="button" data-role="delete" data-id ='.$row["id"].' name="delete" class="btn btn-danger delete" data-dismiss="modal">Delete</button></td>

         </tr>';    

 }
 
  $ouput .="</tbody></table>";

  echo $ouput;

 ?>