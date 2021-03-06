<?php
ob_start();
//include "./gen/allfunct.php";
if(isset($_GET['msg']) && $_GET['msg'] != ''){
    $msg = $_GET['msg'];
}else{
    $msg  ='';
}
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>HAYOK-DEV-TSET - Login Page</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    
    <!-- My custom Style -->
    <link rel="stylesheet" type="text/css" href="mycssfile/my-custom-style.css">   


</head>
<body class="form">
    

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Health Worker Sign In</h1>
                        <p class="">Log in to your account to continue.</p>

                        <?php 
                            $message = '';
                            if($msg == '') { 
                                $message .= ' ';
                            }else{
                                $message .= '<div class="alert alert-success alert-dismissible">'
                                .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                                .'<h4><i class="icon fa fa-success"></i> You are welcome! Kindly login.</h4>'
                                .'</div> ';
                            }
                        
                        ?>
                            <div class="row">
                                <div class="col-md-12" style="float:none; margin-left:auto; margin-right:auto;">
                                    <?php echo  $message; ?>
                                </div>
                            </div>
                            <div class="alert alert-danger alert-dismissible" style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h6>Sorry, kindly try again!</h6>
                            </div>
                        
                        <form action="#" method="POST" class="text-left form-signin needs-validation" novalidate="" name="logform" id="logform">
                            <div class="form">
                                <input type="hidden" id="usertype" name="usertype" class="form-control" value="healthworker" required>

                                <div id="username-field" class="field-wrapper input">
                                    <label for="emailusername">EMAIL/USERNAME</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input id="emailusername" name="emailusername" type="text" class="form-control" placeholder="" required>
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <!-- <a href="#" class="forgot-pass-link">Forgot Password?</a> -->
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="button" id="hworkerlogin" class="btn btn-primary hworkerlogin" value="">Log In</button>
                                    </div>
                                </div>

                                <div class="division">
                                      <span>OR</span>
                                </div>

   

                                <p class="signup-link">Not registered ? <a href="register.php">Create an account</a></p>

                            </div>
                        </form>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>

    <!-- Personalized JS Files -->
    <script src="myjsfiles/izitoast/js/iziToast.min.js"></script>
  	<script src="myjsfiles/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- <script src="myjsfiles/userauthrg.js"></script> -->
  
    <script src="myjsfiles/userauthlg.js"></script>

</body>
</html>