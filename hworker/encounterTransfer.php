
<?php
include("../functs/all_Util_Function.php");


// FETCHING PATIENT DETAILS BY THE ID (PHONE)
if($_POST['action'] == 'fetch_enc_id'){
    global $mycon;
    $result = $mycon->query ("SELECT DISTINCT(encid) FROM encountertb WHERE encpatid = '".$_POST["patient_id"]."'");
    // $result = $mycon->query_result();
    $row = $result -> fetch_array();

    echo  $row['encid']; 
    exit();
  }

  if($_POST['action'] == 'enc_transfer'){
    global $mycon;
    $encfile_id = $_POST['encfile_id'];
    $transfer_from_id = $_POST['transfer_from_id'];
    $transfer_to_id = $_POST['transfer_to_id'];
    $transferdate = date('Y-m-d');

    $sql_query = "INSERT INTO enctranmsfer(`id`,`transferencounter`,`transferfrom`,`transferto`,`transferdate`,`encstatus`) 
		VALUES (NULL,'$encfile_id', '$transfer_from_id', '$transfer_to_id', '$transferdate', '0')";
		if (!$mycon->query($sql_query)){
			echo "error: values where not inserted incorrectly.";
			echo 'dberror';
			
		}else {			
			echo "success";
			
		}

    exit();
  }else{
      echo 'error';
  }






    

?>