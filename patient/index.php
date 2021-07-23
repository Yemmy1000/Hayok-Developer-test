<?php
ob_start();
    include("include_parts/head.php");
    include("../functs/all_Util_Function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>HAYOK Dev Test - Analytics Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="../assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    
    
    
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <style>
        .contacts-block__item{
            font-size: 18px !important;
            font-weight: 200 !important;
            min-width:100%;
        }
        .contacts-block__item span{
            /* padding:50px; */
           width:100%;
        }
        .contacts-block {
            max-width: 305px !important;
            margin: 36px auto;
        }
        .user-profile .widget-content-area .user-info-list ul.contacts-block{
            width:100%;
        }
     </style>

</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
        <?php   include('include_parts/navbar.php'); ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
            <?php   include('include_parts/sidebar.php'); ?>
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">

                
                    <div class="col-xl-6 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Bio Information</h3>
                                    <a href="#" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                </div>
                                <div class="text-center user-info">
                                    <img src="../uploads/<?php echo get_Patient_Profile_Pix($p_id); ?>" alt="avatar">
                                    <p class=""><?php echo get_Patient_Fullname($p_id); ?></p>
                                </div>
                                <div class="user-info-list">

                                    <div class="">
                                        <ul class="contacts-block list-unstyled">                          
                                            <li class="contacts-block__item">
                                                <table style="width:100%">
                                                    <tbody>
                                                        <?php echo get_Patient_Profile_info($p_id); ?>
                                                    </tbody>
                                                </table>
                                            </li>

                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                        </div>

                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">

                        <!-- <div class="skills layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Recent Encounter Info</h3>
                                    
                            </div>
                        </div> -->


                        <div class="education layout-spacing ">
                            <div class="widget-content widget-content-area">
                                <h3 class="">Encounter History (to be done later)</h3>
                                <div class="timeline-alter">
                                    <div class="item-timeline">
                                        <div class="t-meta-date">
                                            <p class="">10 Mar 2020</p>
                                        </div>
                                        <div class="t-dot">
                                        </div>
                                        <div class="t-text">
                                            <p>Recommended Medication</p>
                                            <p>Test conducted</p>
                                        </div>
                                    </div>
                                    <div class="item-timeline">
                                        <div class="t-meta-date">
                                            <p class="">25 May 2020</p>
                                        </div>
                                        <div class="t-dot">
                                        </div>
                                        <div class="t-text">
                                            <p>Recommended Medication</p>
                                            <p>Test conducted</p>
                                        </div>
                                    </div>
                                    <div class="item-timeline">
                                        <div class="t-meta-date">
                                            <p class="">04 Apr 2021</p>
                                        </div>
                                        <div class="t-dot">
                                        </div>
                                        <div class="t-text">
                                            <p>Recommended Medication</p>
                                            <p>Test conducted</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>






                        </div>









                </div>
            </div>
           

        <?php include('include_parts/footer.php'); ?>

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

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../assets/plugins/apex/apexcharts.min.js"></script>
    <script src="../assets/js/dashboard/dash_1.js"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script>





</script>




</body>
</html>