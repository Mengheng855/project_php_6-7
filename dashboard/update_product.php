<?php
    require '../connection.php';
    session_start();
    if(isset($_POST['update'])){
        $id=$_POST['pro_id'];
        
        $pro_name=$_POST['pro_name'];
        $price=$_POST['price'];
        $des=$_POST['description'];
        $cate=$_POST['cate_id'];
        $user_id=$_SESSION['user_id'];
        if(!empty($_FILES['image']['name'])){
            $file=$_FILES['image']['name'];
            $tmp_name=$_FILES['image']['tmp_name'];
            $path='image/'.time().'-'.$file;
            move_uploaded_file($tmp_name,$path);
            $update_product="UPDATE tbl_product SET pro_name='$pro_name',
            price='$price',description='$des',image='$path',
            cate_id='$cate',user_id='$user_id' WHERE pro_id='$id'";
        }else{
            $update_product="UPDATE tbl_product SET pro_name='$pro_name',
            price='$price',description='$des',
            cate_id='$cate',user_id='$user_id' WHERE pro_id='$id'";
        }
        $ex=$conn->query($update_product);
        if($ex){
            header('location:product.php');
        }
    }
