                                    <div class="modal fade" id="addNewPatientModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                      <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myExtraLargeModalLabel">Add New Patient</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align:left !important;">
                                            
                                                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                            <form id="general-info" action="patient_reg.php" class="section general-info">
                                                                <div class="info">
                                                                    <h6 class="">Information</h6>
                                                                    <div class="row">
                                                                        <div class="col-lg-11 mx-auto">
                                                                            <div class="row">
                                                                                <div class="col-xl-2 col-lg-12 col-md-4">                              
                                                                                    <label>Passport</label>
                                                                                    <input type="file" class="form-control" id="profile-img" name="image" required>
                                                                                    <img src="" id="profile-img-tag"  height="100px" class="img-responsive" style="height: 100px !important" />
                                                                                    <div class="invalid-feedback">
                                                                                    Please upload your passport
                                                                                    </div>                                                                        
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
                                                                                                    <input type="text" class="form-control mb-4" name="password" id="password" disabled required>
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
                                                                                                        <option value="Male">Male</option>
                                                                                                        <option value="Female">Female</option>                                                                                                    
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">Height (Kg)</label>
                                                                                                    <input type="number" class="form-control mb-4" name="height" id="height" placeholder="" required >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">Weight (cm)</label>
                                                                                                    <input type="number" class="form-control mb-4" name="weight" id="weight" placeholder="" required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-4">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">BMI</label>
                                                                                                    <input type="text" class="form-control mb-4" name="bmi" id="bmi" placeholder="" disabled required>
                                                                                                </div>
                                                                                            </div>                                                                                      
                                                                                        </div>
                                                                                    </div> 
                                                                                    <div class="form" style="width: 100%;">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">Ward</label>
                                                                                                    <input type="text" class="form-control mb-4" name="ward" id="ward" placeholder="" required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-sm-6">
                                                                                                <div class="form-group">
                                                                                                    <label for="age">LGA</label>
                                                                                                    <input type="text" class="form-control mb-4" name="lga" id="lga" placeholder="" required>
                                                                                                </div>
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



                                            <div class="modal-footer">
                                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                <button type="button" id="save_patient" class="btn btn-dark">Save</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                