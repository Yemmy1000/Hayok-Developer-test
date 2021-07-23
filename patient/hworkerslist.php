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
    <title>Hayok-Dev  - Patient Encounter Page</title>
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
    <script type="text/javascript" src="../myjsfiles/webcamjs-master/webcam.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../mycssfile/my-custom-style.css"> 
   <!-- END PAGE LEVEL CUSTOM STYLES -->


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

                            <div class="row" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                        <div class="table-responsive mb-4 mt-4">
                                            <table id="healthWorkersListTable" class="table table-hover non-hover" style="width:100%">
                                                <thead>
                                                    <tr>                                                      
                                                        <th>Email</th>
                                                        <th>Full Name</th>
                                                        <th>Gender</th>
                                                        <th>Cadre</th>
                                                        <th>Dept</th> 
                                                        <th>Encounter</th>                                                        
                                                        <th>Action</th>   
                                                                                                   
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                             

                            </div>
                        </div>
                    </div>
                </div>

            <!---------------------- BEGIN OF PATIENT ENCOUNTER MODAL  ------------------------------>
            <div class="modal fade" id="patientEncounterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Patient Encounter Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">    
                        
                                                    
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                            
                                                                <form id="patientform" name="patientform" action="patient_reg.php" method="POST" enctype="multipart/form-data"  class="section general-info" > 
                                                                    <div class="info">                                                                   
                                                                        <div class="row">
                                                                            <div class="col-lg-12 mx-auto">
                                                                                                                                                    
                                                                                    <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                                                        <div class="form" style="width: 100%;">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="date">Date</label>
                                                                                                        <input type="date" class="form-control mb-4" name="date" id="date" placeholder="" required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="time">Time</label>
                                                                                                        <input type="time" class="form-control mb-4" name="time" id="time" required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="visit">Visit</label>
                                                                                                        <select class="form-control mb-4" name="visit" id="visit" name="visit" required>
                                                                                                            <option value="">--Select VisitType--</option>
                                                                                                            <option value="First">First</option>
                                                                                                            <option value="Repeat">Repeat</option>                                                                                                    
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>                                                                         
                                                                                        </div>
                                                                                        <div class="form" style="width: 100%;">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="weight">Weight</label>
                                                                                                        <input type="number" class="form-control mb-4 weight" name="weight" id="weight" readonly required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="height">Height</label>
                                                                                                        <input type="number" class="form-control mb-4 height" name="height" id="height" readonly required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="bmi">BMI</label>
                                                                                                        <input type="number" class="form-control mb-4 bmi" name="bmi" id="bmi" readonly required>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>                                                                         
                                                                                        </div>

                                                                                        <div class="form" style="width: 100%;">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="bp">Blood Pressure (BP)</label>
                                                                                                        <input type="number" class="form-control mb-4" step="0.01" name="bp" id="bp" placeholder="" required >
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="temp">Temperature (Temp)</label>
                                                                                                        <input type="number" class="form-control mb-4" step="0.01" name="temp" id="temp" placeholder="" required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="rr">Respiratory rate (RR)</label>
                                                                                                        <input type="number" class="form-control mb-4" step="0.01" name="rr" id="rr" placeholder=""  required>
                                                                                                    </div>
                                                                                                </div>                                                                                      
                                                                                            </div>
                                                                                        </div> 
                                                                                        <div class="form" style="width: 100%;">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="complaint">Complaint</label>
                                                                                                        <textarea type="text" class="form-control mb-4" name="complaint" id="complaint" placeholder="" required></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="diagnosis">Diagnosis</label>
                                                                                                        <select class="form-control mb-4" name="bmi" id="diagnosis" name="diagnosis" required>
                                                                                                            <option value="">--Select Diagnosis--</option>
                                                                                                            <option value="Hypertension">Hypertension</option>
                                                                                                            <option value="Pneumonia">Pneumonia</option>
                                                                                                            <option value="Malaria">Malaria</option>
                                                                                                            <option value="Diabetes">Diabetes</option>                                                                                                    
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-4">
                                                                                                    <div class="form-group">
                                                                                                        <label for="treatment">Treatment Plan</label>
                                                                                                        <textarea type="text" class="form-control mb-4" name="treatment" id="treatment" placeholder="" required></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>     
                                                                                        <div class="form" style="width: 100%;">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-6">
                                                                                                    <div class="form-group">
                                                                                                        <label for="patient_id">Patient Phone (ID)</label>
                                                                                                        <input type="number" class="form-control mb-4 patient_id" name="patient_id" id="patient_id" readonly  required>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-sm-6">
                                                                                                    <div class="form-group">
                                                                                                        <label for="staff_id">Created By (ID)</label>
                                                                                                        <input type="number" class="form-control mb-4 staff_id" name="staff_id" id="staff_id" readonly required>
                                                                                                    </div>
                                                                                                </div>                                                                                  
                                                                                            </div>                                                                         
                                                                                        </div>

                                                                                    </div>                                                                   
                                                                        
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </form>
                                                            </div>                                                   
                                                    </div>                             
                            

                            
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button id="patientSubmitEncounter" class="btn btn-dark mb-4 mr-2">Create Encounter</button>  
                                <button class="btn btn-primary mb-4 mr-2" data-dismiss="modal" >Close</button>
                            </div>
                    </div>
                </div>
            </div>
            <!---------------------- END OF PATIENT ENCOUNTER MODAL  ------------------------------>
  
            <!---------------------- BEGIN OF PATIENT ENCOUNTER TRANSFER MODAL  ------------------------------>
           

         <!-- Modal -->
<div class="modal fade" id="encounterTransferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm transfer</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg> ... </svg>
                </button> -->
            </div>
            <div class="modal-body">
                <p class="modal-text">que penatibus et  Ut sit amet ullamcorper mi. </p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
         
         
         <!---------------------- END OF ENCOUNTER TRANFER MODAL  ------------------------------>

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

    <!-- THIS LINK TO THE JS File FOR SOME ACTIVITIES ON THIS PAGE -->
    <script src="../myjsfiles/patient-page-activity.js"></script>

  




</body>
</html>