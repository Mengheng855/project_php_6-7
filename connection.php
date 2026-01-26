<?php
    try {
        $conn=mysqli_connect('127.0.0.1','root','','db_project_6-7');
        // echo 'success';
    } catch (Exception $e) {
        echo $e->getMessage();
    }