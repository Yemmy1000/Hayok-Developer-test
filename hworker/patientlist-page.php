<?php
ob_start();
   
    include("../functs/all_Util_Function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Hayok-Dev  - Patient Page</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

   
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="../assets/plugins/table/datatable/dt-global_style.css">
	<link href="../assets/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../mycssfile/my-custom-style.css"> 
   <!-- END PAGE LEVEL CUSTOM STYLES -->

   <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../assets/plugins/select2/select2.min.css">


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
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                    <div class="col-lg-12">
                        <div class="widget-content searchable-container list">

                                <form>
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-4">
                                                <select class="form-control basic22" id='age' name='age' >
                                                    <?php echo get_Patient_Age_List();   ?>                                                                                 
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control" id='gender' name='gender' >
                                                    <option value="">&nbsp;&nbsp; --Select Gender--</option>
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>                                                                                  
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select class="form-control basic22" id='bmi' name='bmi' >
                                                        <option value="">&nbsp;&nbsp; --Select Gender--</option>
                                                        <?php echo get_Patient_BMI_List();   ?>                                                                                     
                                                </select>
                                            </div>
                                            <!-- <div class="form-group col-md-2">                                                
                                                <button class="btn btn-primary" id="btnFilterList" type="button"> Filter Records  </button>
                                            </div> -->
                                        </div>
                                </form>         

                            <div class="row" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <table id="PatientListTable" class="table table-hover non-hover" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>ID No</th>
                                                        <th>Full Name</th>
                                                        <th>Age</th>
                                                        <th>Gender</th>
                                                        <th>Height</th>
                                                        <th>Weight</th>
                                                        <th>BMI</th>
                                                        <!-- <th>Ward</th>
                                                        <th>LGA</th> -->
                                                        <th>Action</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- <tr>
                                                        
                                                        <td>098374645</td>
                                                        <td>James Olamide Ahmed</td>
                                                        <td>34</td>
                                                        <td> Male</td>
                                                        <td> 23.5</td>
                                                        <td>23.2</td>
                                                        <td>23.2</td>  
                                                        <td>Gateway</td>
                                                        <td>Gateway</td>
                                                                                                                                                         

                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-dark btn-sm">Open</button>
                                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Update</a>                                                               
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" style="color:red;" href="#">Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
   -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                             

                            </div>
                        </div>
                    </div>
                </div>

            <!---------------------- BEGIN OF PATIENT DEAILS MODAL  ------------------------------>
                <div class="modal fade" id="patientDetalsModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Patient Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span id="patient_details"></span>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button class="btn btn-primary mb-2" data-dismiss="modal" >Close</button>
                    </div>
                    </div>
                </div>
                </div>
            <!---------------------- END OF PATIENT DEAILS MODAL  ------------------------------>

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
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- <script src="../assets/js/apps/contact.js"></script> -->

    
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="../assets/plugins/table/datatable/datatables.js"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="../assets/plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/table/datatable/button-ext/jszip.min.js"></script>    
    <script src="../assets/plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="../assets/plugins/table/datatable/button-ext/buttons.print.min.js"></script>
        <!--  BEGIN CUSTOM SCRIPTS FILE  -->
        <script src="../assets/js/scrollspyNav.js"></script>
    <script src="../assets/plugins/select2/select2.min.js"></script>
    <script src="../assets/plugins/select2/custom-select2.js"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <!-- THIS LINK TO THE JS File FOR SOME ACTIVITIES ON THIS PAGE -->
    <script src="../myjsfiles/patient-page-activity.js"></script>

  

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
                $('#signature-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });

    $("#signature-img").change(function(){
        readURL(this);
    });

    $(document).ready(function() {
        var ss = $(".basic").select2({
            tags: true,
        });

    });






</script>




</body>
</html>