<?php
    require '../connection.php';
    $id=$_GET['pro_id'];
    $delete_product="DELETE FROM tbl_product WHERE pro_id='$id'";
    $ex=$conn->query($delete_product);
    if($ex){
        header('location:product.php');
    }
