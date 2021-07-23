<?php
include("../functs/all_Util_Function.php");


    if($_POST['action'] == 'fill_hwokerslist_table'){
        $patient_id = $_POST['patient_id'];
        $query = "SELECT * FROM healthworkertb";

            $result = $mycon -> query($query);	
            $filtered_rows = $result->num_rows;		
            $patient = $mycon->query("SELECT * FROM patient");
            $total_rows = $patient->num_rows;		

            $data = array();
            $i = 0;
            $enc_btn_visible = '';
            while($row = $result -> fetch_array()){ 

               // check if encounter exist and then set visible May Show Details Or Reminder Later
                if(get_Encounter_Availability($row['hw_id'],  $patient_id) > 0){
                    $enc_btn_visible = 'display:block';
                }else{
                    $enc_btn_visible = 'display:none';
                }

                
                $sub_array = array();
                $sub_array[] = $row['hw_email'];
                $sub_array[] = get_HWorker_Fullname($row['hw_id']);				
                $sub_array[] = $row['hw_gender'];
                $sub_array[] = $row['hw_cadre'];
                $sub_array[] = $row['hw_dept'];
                $sub_array[] = '<span name="view_detail" style="'.$enc_btn_visible.'" class="btn btn-secondary badge-pills btn-sm '.$row['hw_id'].'" id="viewEncounter">Sure!</span>';
            //     $sub_array[] = '<span name="view_detail" class="btn btn-dark badge-pills btn-sm '.$row['p_phone'].'" id="noOfEncounter">'.get_No_of_Encounter($row['p_phone']).'</span>';
            //     $sub_array[] = '<span name="view_detail" class="btn btn-primary badge-pills btn-sm bbbbbbb '.$row['p_phone'].'" id="transferEncounter">Ready to transfer</span>';                    
                $sub_array[] = '<span class="badge badge-pills badge-success openChat" id="'.$row['hw_id'].'"> &nbsp; Chat &nbsp;</span>';

                

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