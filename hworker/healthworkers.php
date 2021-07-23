<?php

include("../functs/all_Util_Function.php");

if($_POST['action'] == 'fill_table'){
    $query = '';
    if($_POST['age'] == "" && $_POST['gender'] != ""){
        $query .= 'SELECT * FROM healthworkertb WHERE hw_gender = "'.$_POST['gender'].'"';
    }

    else if($_POST['age'] != "" && $_POST['gender'] = ""){
        $query .= 'SELECT * FROM healthworkertb WHERE hw_age = "'.$_POST['age'].'"';
    }else if($_POST['gender'] != "" &&  $_POST['age'] != ""){
        $query .= 'SELECT * FROM healthworkertb WHERE hw_gender = "'.$_POST['gender'].'" AND hw_age = "'.$_POST['age'].'"';
    }else if($_POST['gender'] = "" &&  $_POST['age'] = ""){
        $query .= "SELECT * FROM healthworkertb";
    }
    else{
        $query .= "SELECT * FROM healthworkertb";
    }
            $result = $mycon -> query($query);	
			$filtered_rows = $result->num_rows;		
			$patient = $mycon->query("SELECT * FROM healthworkertb");
			$total_rows = $patient->num_rows;		

			$data = array();
            $i = 0;
			while($row = $result -> fetch_array()){ 
				$sub_array = array();
                $sub_array[] = $row['hw_email'];
				$sub_array[] = get_Patient_Fullname($row['hw_id']);				
                $sub_array[] = $row['hw_age'];
                $sub_array[] = $row['hw_gender'];
                $sub_array[] = $row['hw_cadre'];
                $sub_array[] = $row['hw_dept'];
                $sub_array[] = '<button type="button" name="view_detail" class="btn btn-primary btn-sm patientDetails" id="'.$row['hw_id'].'"> View Details</button>';
                

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





?>