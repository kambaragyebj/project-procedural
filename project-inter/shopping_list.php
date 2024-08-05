<?php
session_start();
error_reporting(0);
include('config/dbconnect.php');
var_dump($_SESSION['add']);

$sql = "SELECT id,item, quantity FROM shopping_list_items"; 

$result = mysqli_query($conn,$sql);
$ouput = "";

$output .='<table class="table">
<thead>
  <tr>
    <th scope="col">Position</th>
    <th scope="col">Item</th>
    <th scope="col">Quantity</th>
    <th scope="col></th>
    <th scope="col></th>
    
  </tr>
</thead>
<tbody>';

while($row = mysqli_fetch_array($result)){


   $output .=  '<tr  id='.$row["id"].'> 
                  <td data-target="id">'.$row['id'].'</td>
                  <td data-target="item">'.$row['item'].'</td>
                  <td data-target="qnt_number" contenteditable="true">'.$row['quantity'].'</td>

                  <td><button class="btn btn-primary update" type="button" data-role="update" data-id ='.$row["id"].'  >Save</button></td>
                  <td><button type="button" data-role="delete" data-id ='.$row["id"].' name="delete" class="btn btn-danger delete" data-dismiss="modal">Delete</button></td>
                </tr>';
    
}

$output .= "</tbody>
</table>";

echo $output;

?>