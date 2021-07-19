<?php
ob_start();
session_start();
session_destroy();
// session_start();
include("config.php");

//echo "success";
//exit();

if(isset($_POST['emailusername']) AND isset($_POST['password'])){ 


$emailusername = $_POST['emailusername'];
$pass = $_POST['password'];

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


$row = $result->fetch_array(MYSQLI_ASSOC);
// printf("%s (%s)\n", $row["Name"], $row["CountryCode"]);

	if($result->num_rows > 0){
		if(pass_veri($pass, $row['hw_password'])){
			session_start();
			$_SESSION['hw_id'] = $row['hw_id'];
			$_SESSION['hw_email'] = $row['hw_email'];
			// printf("Error: %s\n", $mycon->error);
			echo "success";
		}else{
			echo "fail";
		}
		
	}



  exit();

}else{
  echo "error";
}
?>