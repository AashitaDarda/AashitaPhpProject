<?php
    require 'connection.php';
    $user_name = $_POST['inputName'];
    $user_email = $_POST['inputEmail'];
    $user_password = $_POST['inputPassword'];

    $sql = "INSERT INTO user(user_name, user_email, user_password) 
            VALUES ('$user_name','$user_email','$user_password')";

    $result = $conn->query($sql);

    if($result){
        header('location: http://localhost/StudentRatings/index.php');
    }
    else{
        echo false;
    }
?>