<?php
    require '../connection.php';
    session_start();
    if(isset($_POST['create'])){
        $cate=$_POST['cate_name'];
        $user_id=$_SESSION['user_id'];
        $insert_cate="INSERT INTO tbl_category (cate_name,user_id) VALUES ('$cate','$user_id')";
        $ex=$conn->query($insert_cate);
        if($ex){
            header('location:category.php');
        }
    }