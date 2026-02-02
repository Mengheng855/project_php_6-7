<?php
    require '../connection.php';
    session_start();
    if(isset($_POST['update'])){
        $id=$_POST['cate_id'];
        $cate=$_POST['cate_name'];
        $user_id=$_SESSION['user_id'];
        $update_cate="UPDATE tbl_category SET cate_name='$cate',user_id='$user_id' WHERE cate_id='$id'";
        $ex=$conn->query($update_cate);
        if($ex){
            header('location:category.php');
        }
    }