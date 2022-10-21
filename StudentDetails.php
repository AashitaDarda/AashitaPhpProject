<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>

    <div class="container-fluid">
      <?php include 'header.php'?>
          

        <nav aria-label="breadcrumb">
            <div class="container my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student Details</li>
                  </ol>
            </div>
        </nav>
        <?php if(isset($_SESSION["error"])) { ?>
        <div class="alert alert-danger err" role="alert">
 <?php
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
 } 
  ?>
  </div>

        <?php 
          
           require 'connection.php';
           $student_id = $_GET['id'];
           $sid=$student_id;
           $_SESSION["sid"]=$sid;
           $sql = "SELECT * FROM student_details WHERE stu_id = $student_id";
           $result=$conn->query($sql);

  
          
        ?>

        <div class="d-flex justify-content-center">
          <div class="row">
            <?php      $data = mysqli_fetch_assoc($result);
            
              ?>
            <div class="col-sm-5">
              <div class="card">
                <div class="card-body">
                  <img src="./Images/<?php echo $data['stu_img'] ?>" class="card-img-top" alt="..." width="150" height="400">
                </div>
              </div>
            </div>
            
            <?php 
                  
  
                  $sql_review = "SELECT * from review as r join student_details as s on r.sid=s.stu_id JOIN user as u on u.user_id=r.logger_id WHERE stu_id=$student_id ";
                  $result_review=$conn->query($sql_review);

          
                  $value = mysqli_fetch_all($result_review,MYSQLI_ASSOC);
                  //  print_r($data_review);
                ?>

                <?php
                    $sql_avg = "SELECT AVG(user_rating) AS AVG FROM review WHERE sid = $student_id";
                    $result_avg = $conn->query($sql_avg);
                    $average = mysqli_fetch_assoc($result_avg);
                    // print_r($average);
                
                ?>

                <?php 
                    $sql_count = "SELECT COUNT(user_rating) AS TOTALCOUNT FROM review WHERE sid=$student_id";
                    $result_count = $conn->query($sql_count);
                    $count = mysqli_fetch_assoc($result_count);
                    // print_r($count);
                ?>

            <div class="col-sm-7">
              <div class="card">
                <div class="card-body d-flex justify-content-between">
                  <h5 class="card-title"><?php echo $data['stu_name'] ?></h5>
                  <p class="card-title">
                    <?php 
                      $avg = abs($average['AVG']);
                      if($avg > 0){
                        for($i=1;$i<=5;$i++){
                          if($i <= $avg){
                    ?>
                    <i class="fas fa-star star-light avg_star text-warning"></i>
                    <?php } else { ?>
                      <i class="fas fa-star star-light avg_star"></i>
                  <?php } ?>
                  <?php } } ?>
                    <br>
                    <b><span id='averageRating'><?php echo abs($average['AVG']) ?> / 5</span></b>
                 
                  </p>
                </div>
                <div class="card-body d-flex justify-content-between">
                  <h6 class="card-title"><?php echo $data['stu_edu'] ?></h6>
                  <h6 class="card-title"><?php echo $data['stu_age'] ?></h6>
                </div>
               
                <div class="card-body d-flex justify-content-between">
                  <h4 class="card-title">User's Reviews and Ratings</h4>
                </div>
                <hr>
                <div class="card-body d-flex justify-content-between">
                  <h6 class="card-title">
                    No. of Reviwes: 
                    <span id="total_reviews"><b><?php echo $count['TOTALCOUNT']; ?></b></span>
                  </h6>
                  <a href="review.php?stu_rev_id=<?php echo $data['stu_id'] ?>">
                    <button class="card-title btn btn-primary" id="newReview">
                          New Review
                    </button>
                  </a>
                </div>

                <hr>
                <?php foreach($value as $data_review) {  ?>
                <div class="card-body">
                <p class="card-title">
               <?php
                   $index=$data_review['user_rating'];
                 if($index > 0) {
                  for($i=1; $i<=5;$i++){ 
                    if($i <=$index ){ ?>
                      <i class="fas fa-star star-light avg_star text-warning"></i>
                  <?php  } else {  ?>
                    <i class="fas fa-star star-light avg_star"></i>  <?php
                  }
                    ?>
                    
                   
                 <?php }
                 } ?>
 </p>
                 
                  <p class="card-text"><?php echo $data_review['user_review'] ?></p>
                  <p class="card-text text-secondary" style="font-size:13px;"> Date:  <?php echo $data_review['date'] ?></p>
                  <p class="card-text text-end">
                  -  <?php echo $data_review['user_name']; ?>
                  </p>
                </div>
                <hr>
                <?php } ?>
              </div>
            </div>

            
          </div>
        </div> 
    </div>
    
</body>
</html>