<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title></title>
</head>
<style>
    .modal-footer{
        text-align: left;
        display: block;
    }
    .err{
        position: absolute;
        right: 106px;
        top: 66px;
    }
</style>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container">
                <a class="navbar-brand mb-0 h1 text-white" href="index.php">
                    <img src="./Images/customer.png" alt="Bootstrap" width="40" height="40">
                    Student Reviews & Ratings
                </a>
                
              <div class="navbar-button text-end" id="navbarSupportedContent">
               
                <form class="d-flex text-white">
                    <?php
                        
                        if(isset($_SESSION['user_name'])){
                            echo 'Hello  ', $_SESSION['user_name'];
                           echo '<a class="btn btn-outline-info text-white mx-3" href="logout.php" type="button">
                                    Logout
                                </a>';
                        
                    ?>
                    <?php } else {
                        echo '<button class="btn btn-outline-info text-white" type="button" data-bs-toggle="modal" data-bs-target="#LoginModal">
                                Login
                            </button>';
                    }
                    ?>
                    
                </form>
              </div>
            </div>
        </nav>
  
        <!-- LoginModal -->
        <div class="d-flex justify-content-center">
            <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="LoginModalLabel">Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="loginModal.php" method="post" class="g-3 needs-validation" novalidate>
                                <div class="row mb-3">
                                    <label for="inputEmailLogin" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="inputEmailLogin" id="inputEmailLogin" required>
                                        <div class="invalid-feedback">
                                            Enter User Email!
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassLogin" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="inputPassLogin" id="inputPassLogin" required>
                                        <div class="invalid-feedback">
                                            Enter User Password!
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <p>
                                    Have Not an Account ?
                                    <a href="" data-bs-target="#RegisterModal" data-bs-toggle="modal" data-bs-dismiss="modal"> Registered First </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- RegistrationModal -->
        <div class="d-flex justify-content-center">
            <div class="modal fade" id="RegisterModal" tabindex="-1" aria-labelledby="RegisterModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="RegisterModalLabel">Register</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="modal.php" method="POST" class="g-3 needs-validation" novalidate>
                                <div class="row mb-3">
                                    <label for="inputName" class="col-sm-4 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Enter your name" required>
                                        <div class="invalid-feedback" id="invalid_name">
                                            Enter User Name!
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Enter your email" required>
                                        <div class="invalid-feedback" id="invalid_email">
                                            Enter User Email!
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Enter your password" required>
                                        <div class="invalid-feedback" id="invalid_pass">
                                            Enter Password!
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputConPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="inputConPassword" id="inputConPassword" placeholder="Confirm your password" required>
                                        <div class="invalid-feedback" id="invalid_feedback">
                                            Enter Correct Password!
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="registerdone">Register</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <p>
                                    Have an Account ?
                                    <a href="" data-bs-target="#LoginModal" data-bs-toggle="modal"> Login </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // (() => {
        //     'use strict'
        
        //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //     const forms = document.querySelectorAll('.needs-validation')
        
        //     // Loop over them and prevent submission
        //     Array.from(forms).forEach(form => {
        //     form.addEventListener('submit', event => {
        //         if (!form.checkValidity()) {
        //         event.preventDefault()
        //         event.stopPropagation()
        //         }
        
        //         form.classList.add('was-validated')
        //     }, false)
        //     })
        // })()
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="javascript/javascript.js"></script>
    <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="javascript/jquery.js"></script>
</body>
</html>