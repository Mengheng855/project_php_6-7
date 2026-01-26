<?php
    require '../connection.php';
    session_start();
    if(isset($_POST['login'])){
        $email=htmlspecialchars($_POST['email']);
        $pass=htmlspecialchars($_POST['password']);
        $select="SELECT user_id,password,is_admin FROM tbl_user WHERE email='$email'";
        $rs=$conn->query($select);
        $row=mysqli_fetch_assoc($rs);
        if($row['password']!=$pass){
            header('location: login.php');
            exit;
        }
        $_SESSION['is_admin']=$row['is_admin'];
        if($row['is_admin']!=1){
            header('location:../user/user.php');
        }else{
            header('location: ../dashboard/index.php');
        }

    }