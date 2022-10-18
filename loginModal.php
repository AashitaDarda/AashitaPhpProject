<?php 
  session_start();
    require 'connection.php';
    $login_email = $_POST['inputEmailLogin'];
    $login_password = $_POST['inputPassLogin'];

    $sql = "SELECT * FROM user WHERE user_email='$login_email' and user_password = '$login_password'";
    $result = $conn->query($sql);
    $data = mysqli_fetch_assoc($result);
    $u_id = $data['user_name'];
    $sid=$_SESSION["sid"];
    $_SESSION["uid"]=$data['user_id'];
    
   if($data > 0){
    if(isset($_SESSION["status"]) != false){
        $_SESSION['user_name'] = $u_id;
        header("Location: http://localhost/StudentRatings/review.php?stu_rev_id=$sid");

    } else {
        $_SESSION['user_name'] = $u_id;
        header('Location: http://localhost/StudentRatings/index.php');
        
    }
   
   }
   else{
    echo 'Check your email or password you given';
   }
?>