
<?php
include("../functs/all_Util_Function.php");


// FETCHING PATIENT DETAILS BY THE ID (PHONE)
if($_POST['action'] == 'fetch_detail'){
    global $mycon;
    $result = $mycon->query ("SELECT * FROM patient WHERE p_phone = '".$_POST["patient_id"]."'");
    // $result = $mycon->query_result();
    $output = '';
    // $image = new Gmagick();
    // $image->readimageblob($blob);
    // echo '<img src="data:image/png;base64,' .  base64_encode($image->getimageblob())  . '" />';
    foreach($result as $row){
		$output .= '
				<div class="row">
					<div class="col-md-4">
                            <div align="left">
                                <img src="../uploads/'.$row["p_pix"].'" class="img-thumbnail" width="300" />                                       
                                
                            </div>
						</div>
						<div class="col-md-8 text-left">
                            <table class="table table-bordered" style="text-align: left;">
                                <tr>
                                    <th>Phon No.(ID)</th>
                                    <td>'.$row["p_phone"].'</td>
                                </tr>
                                <tr>
                                    <th>Full Name</th>
                                    <td>'.$row["p_name"].' '.$row["p_surname"].'</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>'.$row["p_age"].'</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>'.$row["p_gender"].'</td>
                                </tr>
                                <tr>
                                    <th>Height</th>
                                    <td>'.$row["p_height"].'</td>
                                </tr>
                                <tr>
                                    <th>Weight (Kg)</th>
                                    <td>'.$row["p_weight"].'</td>
                                </tr>
                                <tr>
                                    <th>BMI</th>
                                    <td>'.$row["p_bmi"].'</td>
                                </tr>
                                <tr>
                                    <th>Ward</th>
                                    <td>'.$row["p_ward"].'</td>
                                </tr>
                                <tr>
                                    <th>LGA</th>
                                    <td>'.$row["p_lga"].'</td>
                                </tr>                                                        
                                <tr>
                                    <th>Date Registered</th>
                                    <td>'.$row["p_date_reg"].'</td>
                                </tr> 
                                <tr>
                                    <th>Staff in-charge</th>
                                    <td>'.get_Staff_in_Charge($row["registered_by"]).'</td>
                                </tr>                              
                                

                            </table>
					    </div>
					</div>
				</div>
				';
			}	
            echo $output;	
            exit();		
}

// FILL PATIENT TABLE
if($_POST['action'] == 'fill_table'){
    
    $query = 'SELECT * FROM patient ';

    if($_POST['param'] != ""){
        $query .= 'WHERE (p_gender = "'.$_POST['param'].'" OR p_age = "'.$_POST['param'].'" OR p_bmi = "'.$_POST['param'].'")';
    }

  
            $result = $mycon -> query($query);	
			$filtered_rows = $result->num_rows;		
			$patient = $mycon->query("SELECT * FROM patient");
			$total_rows = $patient->num_rows;		

			$data = array();
            $i = 0;
			while($row = $result -> fetch_array()){ 
				$sub_array = array();
                $sub_array[] = $row['p_phone'];
				$sub_array[] = get_Patient_Fullname($row['p_phone']);				
                $sub_array[] = $row['p_age'];
                $sub_array[] = $row['p_gender'];
                $sub_array[] = $row['p_height'];
                $sub_array[] = $row['p_weight'];
                $sub_array[] = $row['p_bmi'];     
                $sub_array[] = '<button type="button" name="view_detail" class="btn btn-primary btn-sm patientDetails" id="'.$row['p_phone'].'"> View Details</button>';
                $sub_array[] = '<button type="button" name="view_detail" class="btn btn-dark btn-sm patientUpdate" id="'.$row['p_phone'].'"> Update</button>';
                

				$data[] = $sub_array;
			}

			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"		=>	$total_rows,
				"recordsFiltered"	=>	$filtered_rows,
			
				"data"				=>	$data
			);

			echo json_encode($output);

			// <form Method="POST" action="indexb.php"><input type="hidden" name="exam_id_b" value="'.$row['online_exam_id'].'"><button type="submit" name="add_questionm" class="btn btn-info btn-sm add_questionm" id="'.$row['online_exam_id'].'">Add Question bulk  </button></form>';
		exit();
}

// FILL PATIENT FOR ENCOUNTER TABLE
if($_POST['action'] == 'fill_encounter_table'){

    $query = "SELECT * FROM patient";
    
            $result = $mycon -> query($query);	
			$filtered_rows = $result->num_rows;		
			$patient = $mycon->query("SELECT * FROM patient");
			$total_rows = $patient->num_rows;		

			$data = array();
            $i = 0;
            // $transfer_btn_visible = '';
			while($row = $result -> fetch_array()){ 

                // check if encounter exist and then set transfer visibility
                if(get_No_of_Encounter($row['p_phone']) > 0){
                    $transfer_btn_visible = 'display:block';
                }else{
                    $transfer_btn_visible= 'display:none';
                }

                $sub_array = array();
                $sub_array[] = '<div class="usr-img-frame! rounded-circle"><img src="../uploads/'.$row["p_pix"].'" class="img-thumbnail" width="50" /></div>';
                $sub_array[] = $row['p_phone'];
				$sub_array[] = get_Patient_Fullname($row['p_phone']);				
                $sub_array[] = $row['p_age'];
                $sub_array[] = '<span name="view_detail" class="btn btn-secondary badge-pills btn-sm createEncounter" id="'.$row['p_phone'].'">Create</span>';
                $sub_array[] = '<span name="view_detail" class="btn btn-dark badge-pills btn-sm '.$row['p_phone'].'" id="noOfEncounter">'.get_No_of_Encounter($row['p_phone']).'</span>';
                $sub_array[] = '<span name="view_detail" style="'.$transfer_btn_visible.'" class="btn btn-danger badge-pills btn-sm transferEncounter" id="'.$row['p_phone'].'">Transfer</span>';                    
                $sub_array[] = '<button type="button" name="view_detail" class="btn btn-primary btn-sm '.$row['p_phone'].'" id="patientDetails"> View Details</button>'.'&nbsp;  '.
               '<span class="badge badge-pills badge-success '.$row['p_phone'].'" id="openChat"> &nbsp; Chat &nbsp;</span>'.
                '<input type="hidden" name="p_weight" class="p_weight" value= "'.$row['p_weight'].'"  />'.
               '<input type="hidden" name="p_height" class="p_height" value= "'.$row['p_height'].'"  />'.
                '<input type="hidden" name="p_bmi" class="p_bmi" value= "'.$row['p_bmi'].'"  />';
                

				$data[] = $sub_array;
			}

			$output = array(
				"draw"				=>	intval($_POST["draw"]),
				"recordsTotal"		=>	$total_rows,
				"recordsFiltered"	=>	$filtered_rows,
			
				"data"				=>	$data
			);

			echo json_encode($output);

			// <form Method="POST" action="indexb.php"><input type="hidden" name="exam_id_b" value="'.$row['online_exam_id'].'"><button type="submit" name="add_questionm" class="btn btn-info btn-sm add_questionm" id="'.$row['online_exam_id'].'">Add Question bulk  </button></form>';
		
}

// SUBMIT PATIENT ENCOUNTER INFO
if($_POST['action'] == 'create_encounter'){
    $idate = $mycon->real_escape_string($_POST['idate']);
	$itime = $mycon->real_escape_string($_POST['itime']);
	$visit = $mycon->real_escape_string($_POST['visit']);
	$weight = $mycon->real_escape_string($_POST['weight']);
	$height = $mycon->real_escape_string($_POST['height']);
	$bmi = $mycon->real_escape_string($_POST['bmi']);
	$bp = $mycon->real_escape_string($_POST['bp']);
    $temp = $mycon->real_escape_string($_POST['temp']);
    $rr = $mycon->real_escape_string($_POST['rr']);
    $complaint = $mycon->real_escape_string($_POST['complaint']);
    $diagnosis = $mycon->real_escape_string($_POST['diagnosis']);
    $treatment = $mycon->real_escape_string($_POST['treatment']);
    $patient_id = $mycon->real_escape_string($_POST['patient_id']);
    $staff_id = $mycon->real_escape_string($_POST['staff_id']);
    
    
	// Ensure Encounter ID is Unique
	function enc_id(){
		global $mycon;
		$encypt1=uniqid(rand(0, date("his")).rand(10, 500), true);
		$usid1=str_replace(".", "", $encypt1);
		$check_id = substr($usid1, 0, 7);
		$query = "select encid from encountertb where encid='$check_id'";
		$checkid = $mycon->query($query);
		if($checkid->num_rows > 0)
		{
			enc_id();
		}
		else
			return $check_id;
	}
	
	
	$enc_id = enc_id();
    
		$sql_query = "INSERT INTO encountertb(`encid`,`encpatid`,`encdate`,`enctime`,`encvisit`,`encweight`,`encheight`,`encbmi`,`encbp`,`enctemp`,`encrr`,`enccomplaint`,`encdiagnosis`,`enctreatment`,`enchwid`,`encstatus`) 
		VALUES ('$enc_id','$patient_id', '$idate', '$itime', '$visit', '$weight',	'$height',	'$bmi', '$bp',	'$temp', '$rr', '$complaint', '$diagnosis', '$treatment', '$staff_id', '0')";
		if (!$mycon->query($sql_query)){
			//echo "error: values where not inserted incorrectly.";
			echo 'dberror';
			
		}else {			
			echo "success";
			
		}

}






    

?>