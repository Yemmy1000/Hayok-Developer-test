<?Php
include "config.php";

// include "../../touch/notefunct.php";

function get_Patient_Profile_Pix($val){
    global $mycon;
    $res='';
    $select_data =  $mycon -> query("SELECT p_pix FROM patient WHERE p_phone ='".$val."' ");
    // $row=mysqli_fetch_array($select_data);
    $row = $select_data -> fetch_array();
    
    return $row["p_pix"];
}

function get_Patient_Age_List(){
    global $mycon;
    $result = $mycon -> query("SELECT DISTINCT (p_age) FROM patient") ;
    $catoption = '<option value="">Select Age</option>';
    while($row = $result -> fetch_array()){ 
        $catoption .= '<option value="'.$row['p_age'].'">'.$row['p_age'].'</option>';
    }

   return $catoption;
}

function get_Patient_Age_Analysis_y(){
    global $mycon;
    $result = $mycon -> query("SELECT p_age, COUNT(p_age) AS count FROM patient GROUP BY p_age") ;
    // $catoption = '<option value="">Select Age</option>';
    while($row = $result -> fetch_array()){ 

        $dataPoints[] = $row['count'];
    }

   return $dataPoints;
}

function get_Patient_Age_Analysis_x(){
    global $mycon;
    $result = $mycon -> query("SELECT p_age, COUNT(p_age) AS count FROM patient GROUP BY p_age") ;
    // $catoption = '<option value="">Select Age</option>';
    while($row = $result -> fetch_array()){ 

        $dataPoints[] = $row['p_age'];
    }

   return $dataPoints;
}



function get_Patient_BMi_List(){
    global $mycon;
    $result = $mycon -> query("SELECT DISTINCT (p_bmi) FROM patient") ;
    $catoption = '';
    while($row = $result -> fetch_array()){ 
        $catoption .= '<option value="'.$row['p_bmi'].'">'.$row['p_bmi'].'</option>';
    }

   return $catoption;
}

function get_Patient_Fullname($val){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_phone ='".$val."' ");
    // $row=mysqli_fetch_array($select_data);
    $row = $select_data -> fetch_array();
    $fn = $row['p_name'];
    $ln = $row['p_surname'];

   $full_name = $fn." ".$ln;
   return $full_name;
}

function get_Patient_Profile_info($val){
    global $mycon;
    $profile = "";
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_phone ='".$val."' ");
    $row = $select_data -> fetch_array();
    $profile .= '<tr><td> Name </td><td>:  '.$row['p_name'].'</td></tr>'.
    '<tr><td> Surname</td><td>:  '.$row['p_surname'].'</td></tr>'.
    '<tr><td> Age</td><td> :  '.$row['p_age'].'</td></tr>'.
    '<tr><td> Gender</td><td> :  '.$row['p_gender'].'</td></tr>'.
    '<tr><td> Height</td><td> :  '.$row['p_height'].'</td></tr>'.
    '<tr><td> Weight</td><td> :  '.$row['p_weight'].'</td></tr>'.
    '<tr><td> BMI</td><td> :  '.$row['p_bmi'].'</td></tr>'.
    '<tr><td> Ward</td><td>:  '.$row['p_ward'].'</td></tr>'.
    '<tr><td> LGA</td><td> :  '.$row['p_lga'].'</td></tr>'.
    '<tr><td> Date Reg.</td><td>: '.$row['p_date_reg'].'</td></tr>';
    
   return $profile;
}


function get_Staff_in_Charge($val){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM healthworkertb WHERE hw_id ='".$val."' ");
    // $row=mysqli_fetch_array($select_data);
    $row = $select_data -> fetch_array();
    $fn = $row['hw_name'];
    $ln = $row['hw_sname'];
    $full_name = $fn." ".$ln;
   return $full_name;
}

function get_HW_NameID_List(){
    global $mycon;
    $result = $mycon -> query("SELECT * FROM healthworkertb") ;
    $catoption = '';
    while($row = $result -> fetch_array()){ 
        $catoption .= '<option value="'.$row['hw_id'].'">'.get_Staff_in_Charge($row['hw_id']).'</option>';
    }

   return $catoption;
}

function get_HWorker_Fullname(){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM healthworkertb");
    $row = $select_data -> fetch_array();
    $fn = $row['hw_name'];
    $ln = $row['hw_sname'];
    $full_name = $fn." ".$ln;
   return $full_name;
}


function get_No_of_Encounter($val){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM encountertb WHERE encpatid ='".$val."' ");
    $total_rows = $select_data->num_rows;

   return $total_rows;
}

function get_Total_HWorker_No(){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM healthworkertb ");
    $total_rows = $select_data->num_rows;

   return $total_rows;
}

function get_Total_Female_Patient(){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_gender ='F' ");
    $total_rows = $select_data->num_rows;

   return $total_rows;
}

function get_Total_Male_Patient(){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_gender ='M' ");
    $total_rows = $select_data->num_rows;

   return $total_rows;
}

function get_Total_Patient(){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM patient ");
    $total_rows = $select_data->num_rows;

   return $total_rows;
}

function get_Gender_yLabel(){
    global $mycon;
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_gender ='M' ");
    $m_num = $select_data->num_rows;
    $select_data =  $mycon -> query("SELECT * FROM patient WHERE p_gender ='F' ");
    $f_num = $select_data->num_rows;
    $xl = [$m_num, $f_num];

   return $xl;
}


function get_Gender_xLabel(){
    $lb = ["Male", "Female"];
   return $lb;
}

function get_Encounter_Availability($hw_id,  $patient_id){
    global $mycon;
    // $total_rows = '';
    $select_data =  $mycon -> query("SELECT * FROM enctranmsfer WHERE transferto = '".$hw_id."' ");
    if($select_data->num_rows > 0){
        return true;
        exit();
    }else{
        $select_data =  $mycon -> query("SELECT * FROM enctranmsfer WHERE transferto = '".$hw_id."' ");
        if($select_data->num_rows > 0){
            return true;
        exit();
        }
    }

   return false;
}



function talk(){
    echo "say";
}

?> 


