<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
</head>
<body>
    <?php 
        include 'header.php' ;
        // session_start();
        if(isset($_SESSION['user_name'])){

        
        
    ?>
    <?php 
        require 'connection.php';
        if(isset($_GET['stu_rev_id'])){
            $student_id = $_GET['stu_rev_id'];
            $sql = "SELECT * FROM student_details WHERE stu_id = $student_id";
            $row = $conn->query($sql);
    ?>

        <nav aria-label="breadcrumb">
            <div class="container my-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student Details/Review & Rating</li>
                  </ol>
            </div>
        </nav>

    <div class="container-fluid">
        <center>

            <?php if(isset($_SESSION["msg"])){ ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $_SESSION["msg"];
                    unset($_SESSION["msg"]);
                    ?>
                </div>
                <?php } ?>
            <div class="card m-3" style="width: 500px;">
                <div class="card-header" style="background: rgb(149, 227, 252);">
                    <h2 class="text-center">Rating & Review Page</h2>
                </div>
                <div class="card-body">
                    <?php while($data = mysqli_fetch_assoc($row)){ ?>

                    <img src="./Images/<?php echo $data['stu_img'] ?>" class="card-img-top" alt="..." width="40" height="200"><br>
                    <h3 class="card-title" ><?php echo $data['stu_name'] ?></h3>
                    <hr>
                    <?php }  } ?>

                    

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title text-start">Ratings</h4>
                        <span>
                            <i class="fas fa-star star-light submit_star fa-2x" id="submit_star_1" data-rating = "1"></i>
                            <i class="fas fa-star star-light submit_star fa-2x" id="submit_star_2" data-rating = "2"></i>
                            <i class="fas fa-star star-light submit_star fa-2x" id="submit_star_3" data-rating = "3"></i>
                            <i class="fas fa-star star-light submit_star fa-2x" id="submit_star_4" data-rating = "4"></i>
                            <i class="fas fa-star star-light submit_star fa-2x" id="submit_star_5" data-rating = "5"></i>
                        </span>    
                        
                    </div>
                    <div class="reviews">
                        <form action="reviewcode.php" method="post" class="g-3 needs-validation" novalidate>
                            <input type="number" id="rating1" name="index"  value="" hidden>
                            <h4 class="card-title text-start">Feedback:</h4>
                            <textarea name="user_review" class="form-control" id="user_review" cols="60" rows="3" required></textarea>
                            <div class="invalid-feedback" style="font-size:25px">
                                Please give feedback
                            </div>
                            <button class="btn btn-primary my-3" type="submit" id="save_review">
                                Submit
                            </button>
                        </form>
                    </div>
                    
                </div>
                <div class="card-footer">

                </div>
            </div>
        </center>
    </div>

    <script src="javascript/javascript.js"></script>
    <!-- <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="javascript/jquery.js"></script> -->
</body>
</html>

<?php } else {   
    $_SESSION["error"]="you have to login first !"
    
?>
   <script>
     window.history.back()
   </script>
  
<?php
 } ?>

 