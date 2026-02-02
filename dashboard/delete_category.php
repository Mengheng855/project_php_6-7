<?php
    require '../connection.php';
    $id=$_GET['cate_id'];
    $delete_cate="DELETE FROM tbl_category WHERE cate_id='$id'";
    $ex=mysqli_query($conn,$delete_cate);
    if($ex){
        header('location:category.php');
    }