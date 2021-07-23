<?php
ob_start();
session_start();
session_destroy();
// session_start();
include("config.php");


// VALIDATE HEALTH WORKERS LOGIN
if(isset($_POST['emailusername']) && isset($_POST['password']) && $_POST['usertype'] == "healthworker"){ 

	$emailusername = $_POST['emailusername'];
	$pass = $_POST['password'];
	// var_dump($emailusername);
	function pass_veri($password, $hash){		
	if (password_verify($password, $hash)) {
		return true;// Success!				
		}
		else {
		return false;// Invalid credentials
		}
	}
	// var_dump($emailusername);s
	$query = "SELECT * FROM healthworkertb WHERE ( hw_id='$emailusername' OR hw_email='$emailusername' )";
	$result = $mycon -> query($query);

	$row = $result->fetch_array();
		if(pass_veri($pass, $row['hw_password'])){
				session_start();
				$_SESSION['hw_id'] = $row['hw_id'];
				$_SESSION['hw_email'] = $row['hw_email'];
				$_SESSION['hw_password'] = $row['hw_password'];
				// printf("Error: %s\n", $mycon->error);
				echo "success";
			}else{
				echo "fail";
		}
		

 	exit();

}


// VALIDATE PATIENT LOGIN
if(isset($_POST['username']) && isset($_POST['password']) && $_POST['usertype'] == "patient" ){ 

	$emailusername = $_POST['username'];
	$pass = $_POST['password'];
	// var_dump($emailusername);
	function pass_veri($password, $hash){		
	if (password_verify($password, $hash)) {
		return true;// Success!				
		}
		else {
		return false;// Invalid credentials
		}
	}
	$query = "SELECT * FROM patient WHERE p_phone='$emailusername'";
	$result = $mycon -> query($query);

	$row = $result->fetch_array();
		if(pass_veri($pass, $row['p_password'])){
				session_start();
				$_SESSION['p_id'] = $row['p_phone'];
				$_SESSION['p_password'] = $row['p_password'];
				// printf("Error: %s\n", $mycon->error);
				echo "success";
			}else{
				echo "fail";
		}
		

 	exit();

}else{
  echo "error";
}



?>

<!-- if (!$mycon->query($sql_query)){
			//echo "error: values where not inserted incorrectly.";
			printf("Error: %s\n", $mycon->error);
			header("Location:../register.php?msg='error'");
		}else {			
			echo "inserted";

			header("Location: ../index.php?msg='success'");
		} -->