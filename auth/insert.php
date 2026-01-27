<?php
    require '../connection.php';
    session_start();
    if(isset($_POST['register'])){
        $name=htmlspecialchars($_POST['username']);
        $email=htmlspecialchars($_POST['email']);
        $pass=htmlspecialchars($_POST['password']);
        $insert="INSERT INTO tbl_user (username,email,password) VALUES ('$name','$email','$pass')";
        $conn->query($insert);
        if($_SESSION['insert']==2){
            echo '<script>window.location.href="login.php"</script>';
        }else{
            echo '<script>window.location.href="../dashboard/user.php"</script>';
        }
    }
?>