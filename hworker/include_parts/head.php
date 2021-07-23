<?php

session_start();
include("../functs/config.php");

if(isset($_SESSION['hw_id']) && $_SESSION['hw_email'] != ""){
	$hw_id = $_SESSION['hw_id'];
	$hw_email = $_SESSION['hw_email'];
    
	$query = "SELECT * FROM healthworkertb WHERE ( hw_id = '$hw_id' OR hw_email = '$hw_email' )";
	$result = $mycon -> query($query);
	
	$row = $result->fetch_array();
	// printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);

		if($result->num_rows > 0){
			// $_SESSION['hw_id'] = $row['hw_id'];
			// $_SESSION['hw_email'] = $row['hw_email'];
			// $_SESSION['hw_password'] = $row['hw_password'];
			$hw_id = $row['hw_id'];
			$hw_email = $row['hw_email'];	
			$hw_name = $row['hw_name'];
			$hw_sname = $row['hw_sname'];	
			$hw_gender = $row['hw_gender'];
			$hw_age = $row['hw_age'];
			$hw_cadre = $row['hw_cadre'];
			$hw_dept = $row['hw_dept'];
			$date_reg = $row['date_reg'];	
			
		}else{
			echo "<script language='javascript'>window.location.href='../';</script>";
			exit;
			
		}

}else{
	echo "<script language='javascript'>window.location.href='../';</script>";
	exit;
    //echo "hello";
}

?>