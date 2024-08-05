<?php
session_start();
error_reporting(0);
include('config/dbconnect.php');

if(isset($_POST['edited_qnty']) && isset($_POST['id'])&& isset($_POST['item'])){

    $newQuantity = $_POST['edited_qnty'];

    $newQuantityId = $_POST['id'];

    $item = $_POST['item'];


    $sql = "UPDATE shopping_list_items SET quantity=$newQuantity WHERE id=$newQuantityId";

    $result = mysqli_query($conn,$sql);

    if($result){

        echo "$item , quantity have been updated successfully to $newQuantity";
    }
}
?>