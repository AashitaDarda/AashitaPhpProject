<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <title>Student Rating And Reviews</title>
</head>
<body>
    <div class="container-fluid">
        <?php include 'header.php' ?>

        <?php
          require 'connection.php';
          $sql = 'SELECT * FROM student_details';
          $result=$conn->query($sql); ?>
       
    
            <div class="container d-flex justify-content-between">
              <div class="row"> 
                <?php while($data = mysqli_fetch_assoc($result)){
                      $stu_id = $data['stu_id'];  
                ?>
                <?php
                  $sql_avg = "SELECT AVG(user_rating) AS AVG FROM review WHERE sid = $stu_id";
                  $result_avg = $conn->query($sql_avg);
                  $average = mysqli_fetch_assoc($result_avg);
                  // print_r($average);
                ?>
                <div class="col-md-4">
                  <div class="card m-3" style="width: 18rem;">

                   <img src="./Images/<?php echo $data['stu_img'] ?>" class="card-img-top" alt="..." width="80" height="200">
                    <div class="card-body d-flex justify-content-between">
                      <h5 class="card-title" ><?php echo $data['stu_name'] ?></h5>
                      <h5>
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
                      </h5>
                     
                    </div>
                    <div class="card-link text-center mb-5">
                      <a href="StudentDetails.php?id=<?php echo $stu_id ?>" class="btn btn-primary">Show Reviews</a>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
       
    
            <!-- <div class="d-flex justify-content-center">
              <div class="row">
                <div class="col-4 col-12 col-md-6 col-sm-12 col-lg-4">
                  <div class="card m-3" style="width: 18rem;">
                    <img src="./Images/student.webp" class="card-img-top" alt="..." width="80" height="200">
                    <div class="card-body d-flex justify-content-between">
                      <h5 class="card-title" >Name</h5>
                      <h5 class="card-title" >Ratings</h5>
                    </div>
                    <div class="card-link text-center mb-5">
                      <a href="StudentDetails.php" class="btn btn-primary">Show Reviews</a>
                    </div>
                  </div>
                </div>

                <div class="col-4 col-12 col-md-6 col-sm-12 col-lg-4">
                  <div class="card m-3" style="width: 18rem;">
                    <img src="./Images/student.webp" class="card-img-top" alt="..." width="80" height="200">
                    <div class="card-body d-flex justify-content-between">
                      <h5 class="card-title" >Name</h5>
                      <h5 class="card-title" >Ratings</h5>
                    </div>
                    <div class="card-link text-center mb-5">
                      <a href="StudentDetails.php" class="btn btn-primary">Show Reviews</a>
                    </div>
                  </div>
                </div>

                <div class="col-4 col-12 col-md-6 col-sm-12 col-lg-4">
                  <div class="card m-3" style="width: 18rem;">
                    <img src="./Images/student.webp" class="card-img-top" alt="..." width="80" height="200">
                    <div class="card-body d-flex justify-content-between">
                      <h5 class="card-title" >Name</h5>
                      <h5 class="card-title" >Ratings</h5>
                    </div>
                    <div class="card-link text-center mb-5">
                      <a href="StudentDetails.php" class="btn btn-primary">Show Reviews</a>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
    </div>
    
</body>
</html>