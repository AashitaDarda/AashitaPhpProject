<?php
    session_start();
 require 'connection.php';
// print_r($_POST);

$rating_data = $_POST['index'] ;
$user_review = $_POST['user_review'] ;
 $datetime = date('Y-m-d');
 $sid=$_SESSION["sid"];
 $uid=$_SESSION["uid"];

 $sql2 = "SELECT * from review as r JOIN user as u on r.logger_id = u.user_id where sid= $sid and user_id = $uid";
 $result2 = $conn->query($sql2);
 $data=mysqli_fetch_assoc($result2);
  // print_r($data);
if($data > 0){
  $_SESSION["msg"]="You have only one chance for giving review to one student";
  header("location: http://localhost/StudentRatings/review.php?stu_rev_id=$sid");
} else {
  $sql = "INSERT INTO review( user_rating, user_review,datetime,logger_id,sid) 
        VALUES ('$rating_data','$user_review','$datetime','$uid','$sid')";
        $result = $conn->query($sql);

          if($result){
              echo $sid;
                header("location: http://localhost/StudentRatings/StudentDetails.php?id=$sid");
              // echo "succes";
            
          }
          else{
              echo "f";
          }
}

// $sql = "INSERT INTO review( user_rating, user_review,datetime,logger_id,sid) 
//         VALUES ('$rating_data','$user_review','$datetime','$uid','$sid')";
// $result = $conn->query($sql);

// if($result){
//     echo $sid;
//       header("location: http://localhost/StudentRatings/StudentDetails.php?id=$sid");
//     // echo "succes";
   
// }
// else{
//     echo "f";
// }
?>