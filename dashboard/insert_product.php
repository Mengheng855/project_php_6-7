<?php
    require '../connection.php';
    session_start();
    if(isset($_POST['create'])){
        if(!is_dir('image')){
            mkdir('image',0777,true);
        }
        $pro_name=$_POST['pro_name'];
        $price=$_POST['price'];
        $des=$_POST['description'];
        $cate=$_POST['cate_id'];
        $user_id=$_SESSION['user_id'];
        $file=$_FILES['image']['name'];
        $tmp_name=$_FILES['image']['tmp_name'];
        $path='image/'.time().'-'.$file;
        move_uploaded_file($tmp_name,$path);
        $insert="INSERT INTO tbl_product (pro_name,price,description,image,cate_id,user_id)
        VALUES ('$pro_name','$price','$des','$path','$cate','$user_id')";
        $rs=mysqli_query($conn,$insert);
        if($rs){
            header('location: product.php');
        }

    }