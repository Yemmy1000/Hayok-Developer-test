<?php
ob_start();
    include("include_parts/head.php");
    include("../functs/all_Util_Function.php");
    // echo $_SESSION['p_id']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Hayok-Dev  - Patient Encounter Page</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

   <!-- CHAT STYE -->
   <link rel="stylesheet" type="text/css" href="chat/style.css">
   <!-- <link href="../assets/css/apps/mailing-chat.css" rel="stylesheet" type="text/css" /> -->





</head>
<body class="sidebar-noneoverflow">
    
    <!--  BEGIN NAVBAR  -->
    <?php   include('include_parts/navbar.php'); ?>
    
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php   include('include_parts/sidebar.php'); ?>
        
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="chat-section layout-top-spacing">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12">

                          <section class="chat-area">
                            <header>
                              <?php 
                                echo '<span>You are now chating with: '. get_Staff_in_Charge($_GET['user']).'</span>';
                              ?>
                              <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                              <!-- <img src="../uploads/<?php echo get_Patient_Profile_Pix($_GET['user']); ?>" alt=""> -->
                              <div class="details">
                                <span><?php //echo $row['fname'] ?></span>
                                <p><?php //echo $row['status']; ?></p>
                              </div>
                            </header>
                            <div class="chat-box">

                            </div>
                            <form action="#" class="typing-area">
                              <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $_GET['user']; ?>" hidden>
                              <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                              <button class="sendBtn"><i class="fab fa-telegram-plane"></i></button>
                            </form>
                          </section>

                        </div>
                    </div>
                </div>

                </div>
 
 
<!-- //FOOTER -->



        </div>
        

        <!--  END CONTENT AREA  -->

    </div>
        <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- <script src="../assets/js/apps/contact.js"></script> -->

    
    <!-- CHAT SCRIPTS -->
    <script src="chat/chat.js"></script>  


</body>
</html>
