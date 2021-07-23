<?php
ob_start();

    include("include_parts/head.php");

    if(isset($_GET['msg']) && $_GET['msg'] != ''){
        echo $_GET['msg'];
        $msg = '';
        if($_GET['msg'] == "emptyfields"){
            $msg .= '<div class="alert alert-danger alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> No Field can be empty.</h4>'
            .'</div> ';
        }else if($_GET['msg'] == 'imagesize'){
            $msg .= '<div class="alert alert-danger alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> Image too big!.</h4>'
            .'</div> ';
        }else if($_GET['msg'] == 'errordb'){
            $msg .= '<div class="alert alert-danger alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> Database Error. Consult Admin!.</h4>'
            .'</div> ';
        }else if($_GET['msg'] == 'dberror'){
            $msg .= '<div class="alert alert-danger alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> DB error!.</h4>'
            .'</div> ';
        }else if($_GET['msg'] == 'invalidimage'){
            $msg .= '<div class="alert alert-danger alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> Invalid image!.</h4>'
            .'</div> ';
        }else if($_GET['msg'] == 'success'){
            $msg .= '<div class="alert alert-success alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> Patient record saved sussfully!. Continue register more.</h4>'
            .'</div> ';
            
        }else if($_GET['msg'] == 'phoneexist'){
            $msg .= '<div class="alert alert-danger alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> Phone number already exists!.</h4>'
            .'</div> ';
        }else{
            $msg .= '<div class="alert alert-danger alert-dismissible">'
            .'<button type="button" class="close mb-4 mr-2" data-dismiss="alert" aria-hidden="true">&times;</button>'
            .'<h4><i class="icon fa fa-success"></i> Unknown Issue!.</h4>'
            .'</div> ';
        }

    }else{
        $msg = '';
    }
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - User Account Settings</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="../plugins/dropify/dropify.min.css">
    <link href="../assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
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
                    
                <div class="account-settings-container">

                    <div class="account-content">
                                                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                     
                                                        <div class="row">
                                                            <div class="col-md-12" style="float:none; margin-left:auto; margin-right:auto;">
                                                                <?php echo  $msg; ?>
                                                                <span class="statusMsg"></span>
                                                            </div>
                                                        </div>
                                                        
                                                            <form id="patientform" name="patientform" action="patient_reg.php" method="POST" enctype="multipart/form-data"  class="section general-info" > 
                                                                <div class="info">
                                                                    <h6 class="">Information</h6>
                                                                    <div class="row">
                                                                        <div class="col-lg-11 mx-auto">
                                                                            <div class="row">
                                                                                <div class="col-xl-2 col-lg-12 col-md-4">                                                                                    
                                                                                    <input type="hidden" class="form-control mb-4" name="registered_by" id="registered_by" value="<?php echo $hw_id ?>" placeholder="" required>                   
                                                                                    <label>Passport</label>                                                                                    
                                                                                    <input type="file" class="form-control" id="profile-img" name="image" required>
                                                                                    <canvas id="snapshot" width=150 height=150></canvas>
                                                                                    <span type="badge" class="badge badge-info" id="takePicture">Take a Picture</span>
                                                                                    <!-- <img src="" id="profile-img-tag"  height="100px" class="img-responsive" style="height: 100px !important" /> -->
                                                                                    <!-- <div class="invalid-feedback">
                                                                                        Please upload your passport
                                                                                    </div>      -->
                                                                                                                                                                                                                                          
                                                                                </div>
                                                                                <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="name">Phone Number</label>
                                                                                                    <input type="number" class="form-control mb-4" name="phone" id="phone" placeholder="" required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="surname">Default Password</label>
                                                                                                    <input type="text" class="form-control mb-4" name="password" id="password" readonly required>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>                                                                         
                                                                                    </div>
                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="name">Name</label>
                                                                                                    <input type="text" class="form-control mb-4" name="fname" id="fname" placeholder="" required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="surname">Surname</label>
                                                                                                    <input type="text" class="form-control mb-4" name="surname" id="surname" placeholder="" required>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>                                                                         
                                                                                    </div>

                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">Age</label>
                                                                                                    <input type="number" class="form-control mb-4" name="age" id="age" placeholder="" required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="fullName">Gender</label>
                                                                                                    <select class="form-control mb-4" name="gender" id="gender" name="gender" required>
                                                                                                        <option></option>
                                                                                                        <option value="M">Male</option>
                                                                                                        <option value="F">Female</option>                                                                                                    
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">Height (cm)</label>
                                                                                                    <input type="number" class="form-control mb-4" step="0.01" name="height" id="height" placeholder="" required >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">Weight (kg)</label>
                                                                                                    <input type="number" class="form-control mb-4" step="0.01" name="weight" id="weight" placeholder="" required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">BMI</label>
                                                                                                    <input type="text" class="form-control mb-4" step="0.01" name="bmi" id="bmi" placeholder="" readonly required>
                                                                                                </div>
                                                                                            </div>                                                                                      
                                                                                        </div>
                                                                                    </div> 
                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">State</label>
                                                                                                    <select class="form-control mb-4" name="state" id="state" placeholder="" required>
                                                                                                    <option></option>
                                                                                                        <option value="Abuja">Abuja</option>
                                                                                                        <option value="Abia">Abia</option>
                                                                                                        <option value="Adamawa">Adamawa</option>
                                                                                                        <option value="AkwaIbom">Akwa-Ibom</option>
                                                                                                        <option value="Anambra">Anambra</option>
                                                                                                        <option value="Bauchi">Bauchi</option>
                                                                                                        <option value="Bayelsa">Bayelsa</option>
                                                                                                        <option value="Benue">Benue</option>
                                                                                                        <option value="Borno">Borno</option>
                                                                                                        <option value="Cross-River">Cross River</option>
                                                                                                        <option value="Delta">Delta</option>
                                                                                                        <option value="Ebonyi">Ebonyi</option>
                                                                                                        <option value="Edo">Edo</option>
                                                                                                        <option value="Ekiti">Ekiti</option>
                                                                                                        <option value="Enugu">Enugu</option>
                                                                                                        <option value="Gombe">Gombe</option>
                                                                                                        <option value="Imo">Imo</option>
                                                                                                        <option value="Jigawa">Jigawa</option>
                                                                                                        <option value="Kaduna">Kaduna</option>
                                                                                                        <option value="Kano">Kano</option>                                                                                                                                                                                                              
                                                                                                    </select>                                                                                                  
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">LGA</label>
                                                                                                    <select class="form-control mb-4" name="lga" id="lga" placeholder="" required>
                                                                                                        <option></option>
                                                                                                                                                                                                                                                                         
                                                                                                    </select>
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">Ward</label>
                                                                                                    <select class="form-control mb-4" name="ward" id="ward" placeholder="" required>
                                                                                                        <option></option>
                                                                                                        <option value="01">01</option>
                                                                                                        <option value="02">02</option>
                                                                                                        <option value="03">03</option>
                                                                                                        <option value="04">04</option> 
                                                                                                        <option value="05">05</option>
                                                                                                        <option value="06">06</option>                                                                                                     
                                                                                                        <option value="07">07</option>
                                                                                                        <option value="08">08</option> 
                                                                                                        <option value="09">09</option>
                                                                                                        <option value="10">10</option> 
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>     
                                                                                    
                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">                                                                                           
                                                                                            <div class="col-sm-12">
                                                                                                <div class="form-group">
                                                                                                <span class="statusMsg"></span>
                                                                                                <button id="patientRegSubmit###" class="btn btn-dark btn-block mb-4 mr-2">Register Patient</button>                                                                                                </div>
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
                    </div>
                 <!------------------CAMERA MODAL TO POPUP BY CLICKING ----------------------------->
                             <div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg"  role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Take a Profile picture</h5>
                                                </div>
                                                <div class="modal-body">
                                                     <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-12">                                                            
                                                                <video id="video" width="300" height="300" autoplay playsinline style="display:block;"> </video>                                                                                    
                                                                <button class="btn btn-primary" onclick="openCamera()"> Open Camera</button>
                                                                <button class="btn btn-primary" id="capture">Capture!</button>                                                      

                                                            </div>                                                   
                                                    </div>  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="" class="btn btn-success" onclick='closeCamera()'>Close Camera</button>
                                                    <button class="btn btn-dark"  data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close Box</button>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>         
         
         <!---------------------- END OF CAMERA MODAL TO POPUP BY CLICKING   ------------------------------>


                    <div class="account-settings-footer">
                        
                    <?php include('include_parts/footer.php'); ?>
                    </div>
                </div>

                </div>
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

    <!-- THIS LINK TO THE JS File FOR SOME ACTIVITIES ON THIS PAGE -->
    <!-- <script src="../myjsfiles/patientform-val.js"></script> -->
    <script src="../myjsfiles/patient-page-activity.js"></script>

    <!-- <script>
        var player = document.getElementById('player');
        var snapshotCanvas = document.getElementById('snapshot');
        var captureButton = document.getElementById('capture');

        var handleSuccess = function(stream) {
            // Attach the video stream to the video element and autoplay.
            player.srcObject = stream;
        };

        captureButton.addEventListener('click', function() {
            var context = snapshot.getContext('2d');
            // Draw the video frame to the canvas.
            context.drawImage(player, 0, 0, snapshotCanvas.width,
                snapshotCanvas.height);
            console.log(context.canvas.toDataURL());
        });

        navigator.mediaDevices.getUserMedia({video: true})
            .then(handleSuccess);
    </script>
     -->
     <script>
        // var player = document.getElementById('player');
        // var snapshotCanvas = document.getElementById('snapshot');
        // var captureButton = document.getElementById('capture');

        const videoElem = document.getElementById('video');
        const captureButton = document.getElementById('capture');
        var snapshotCanvas = document.getElementById('snapshot');
        const errorElem = document.getElementById('error');
        var profileimg = document.getElementById('profile-img');
        let receivedMediaStream = null;
  
        //Declare the MediaStreamConstraints object
        const constraints = {
            // audio: true
            video: true
        }
  
        function openCamera() {
            //Ask the User for the access of the device camera and microphone
            navigator.mediaDevices.getUserMedia(constraints)
                .then(mediaStream => {
                    // The received mediaStream contains both the 
                    // video and audio media data
  
                    //Add the mediaStream directly to the source of the video element
                    // using the srcObject attribute
                    videoElem.srcObject = mediaStream;
  
                    // make the received mediaStream available globally
                    receivedMediaStream = mediaStream;
  
                }).catch(err => {
                    // handling the error if any
                    console.log(err);
                    // errorElem.innerHTML = err;
                    // errorElem.style.display = "block";
                });
  
        }
        const closeCamera = () => {
            if (!receivedMediaStream) {
                // errorElem.innerHTML = "Camera is already closed!";
                // errorElem.style.display = "block";
            } else {
                receivedMediaStream.getTracks().forEach(mediaTrack => {
                    mediaTrack.stop();
                });
                // errorElem.innerHTML = "Camera closed successfully!"
                // errorElem.style.display = "block";
            }
        }

        captureButton.addEventListener('click', function() {
            // let file = null;
            let container = new DataTransfer();
            var context = snapshot.getContext('2d');
            // Draw the video frame to the canvas.
            context.drawImage(videoElem, 0, 0, snapshotCanvas.width,
                snapshotCanvas.height);
            // console.log(context.canvas.toDataURL("'image/jpeg'"));
            
            let blob = context.canvas.toBlob(function(blob) {                
                let file = new File([blob], "img"+(new Date()).getMilliseconds()+".jpg",{type:"image/jpeg", lastModified:new Date().getTime()});
                container.items.add(file);
                // console.log(file);
                // profileimg.value = container.files;
                profileimg.files = container.files;
            console.log(profileimg.files);
            });
            
     });
            


    
    </script>

    <script>
        $(document).ready(function() {
            $('#takePicture').click(function(){
                $('#cameraModal').modal('show');
            })
            
        });
     </script>
</body>
</html>