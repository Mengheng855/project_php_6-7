<?php
    require '../connection.php';
    if(isset($_POST['register'])){
        $name=htmlspecialchars($_POST['username']);
        $email=htmlspecialchars($_POST['email']);
        $pass=htmlspecialchars($_POST['password']);
        $insert="INSERT INTO tbl_user (username,email,password) VALUES ('$name','$email','$pass')";
        $ex=$conn->query($insert);
        if($ex){
            echo '<script>window.location.href="login.php"</script>';
        }
    }
?>