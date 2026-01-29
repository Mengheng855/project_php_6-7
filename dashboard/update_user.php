<?php
    require '../connection.php';
    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $name=htmlspecialchars($_POST['username']);
        $email=htmlspecialchars($_POST['email']);
        $pass=htmlspecialchars($_POST['password']);
        $is_admin=$_POST['is_admin'];
        $update_user="UPDATE tbl_user SET username='$name',email='$email',password='$pass',
        is_admin='$is_admin' WHERE user_id='$id'";
        $ex=$conn->query($update_user);
        if($ex){
            header('location: user.php');
        }

    }