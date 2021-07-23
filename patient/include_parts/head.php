<?php

session_start();
include("../functs/config.php");

if(isset($_SESSION['p_id']) && $_SESSION['p_password'] != ""){
	$p_id = $_SESSION['p_id'];
    
	$query = "SELECT * FROM patient WHERE  p_phone = '$p_id'";
	$result = $mycon -> query($query);
	
	$row = $result->fetch_array();
	// printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);

		if($result->num_rows > 0){
			$p_id = $row['p_phone'];
			$p_name = $row['p_name'];
			$p_surname = $row['p_surname'];	

		}else{
			echo "<script language='javascript'>window.location.href='../patient_login.php';</script>";
			exit;
			
		}

}else{
	echo "<script language='javascript'>window.location.href='../patient_login.php';</script>";
	exit;
    //echo "hello";
}

?>