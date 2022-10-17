<?php

    $severName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbname = 'student_ratings';

    //create connections
    $conn = new mysqli($severName, $userName, $password, $dbname);

    //check connection
    // if($conn->connect_error){
    //     die('Connection failed: ' .$conn->connect_error);
    // }
    // else{
    //     echo 'success';
    // }
?>
