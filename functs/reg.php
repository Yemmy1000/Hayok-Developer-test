<?php
ini_set('display_errors','off');
session_destroy();
session_start();
include("config.php");

if ( ($_POST['email']!="") && ($_POST['password']!="")){
	// sleep(11);
	//var_dump($_POST['email']);
	
	$hw_email = $mycon->real_escape_string($_POST['email']);
	$hw_password = $mycon->real_escape_string($_POST['password']);
	$hw_name = $mycon->real_escape_string($_POST['firstname']);
	$hw_sname = $mycon->real_escape_string($_POST['surname']);
	$hw_gender = $mycon->real_escape_string($_POST['gender']);
	$hw_age = $mycon->real_escape_string($_POST['age']);
	$hw_cadre = $mycon->real_escape_string($_POST['cadre']);
	$hw_dept = $mycon->real_escape_string($_POST['dept']);
	// var_dump($hw_email);
	$hw_pass_hash = password_hash($hw_password, PASSWORD_DEFAULT);

	//echo "hw_email";
	// Check if user_id already exits in healthworker table
	function hw_id(){
		global $mycon;
		$encypt1=uniqid(rand(0, date("his")).rand(10, 500), true);
		$usid1=str_replace(".", "", $encypt1);
		$check_id = substr($usid1, 0, 7);
		$query = "select hw_id from healthworkertb where hw_id='$check_id'";
		$checkid = $mycon->query($query);
		if($checkid->num_rows > 0)
		{
			hw_id();
		}
		else
			return $check_id;
	}
	
	
	
	$healthwk_id = hw_id();
	$date_reg = date('Y-m-d');

		$sql_query = "INSERT INTO healthworkertb(`id`,`hw_id`,`hw_email`, `hw_password`, `hw_name`, `hw_sname`, `hw_gender`, `hw_age`, `hw_cadre`, `hw_dept`, `date_reg`, `status`) 
		VALUES (NULL,'$healthwk_id', '$hw_email', '$hw_pass_hash', '$hw_name', '$hw_sname',	'$hw_gender',	'$hw_age', '$hw_cadre',	'$hw_dept', '$date_reg', '0')";
		if (!$mycon->query($sql_query)){
			//echo "error: values where not inserted incorrectly.";
			printf("Error: %s\n", $mycon->error);
			header("Location:../register.php?msg='error'");
		}else {			
			echo "inserted";

			header("Location: ../index.php?msg='success'");
		}


}else{
    header("Location:../register.php?msg='dataerror'");
}

?>