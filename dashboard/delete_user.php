<?php
    require '../connection.php';
    $id=$_GET['id'];
    $delete_user="DELETE FROM tbl_user WHERE user_id='$id'";
    $rs=$conn->query($delete_user);
    if($rs){
        header('location: user.php');
    }