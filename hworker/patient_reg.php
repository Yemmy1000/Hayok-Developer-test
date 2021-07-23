<?php 
ini_set('display_errors','on');
include("../functs/config.php");

if(isset($_POST['phone']) || isset($_POST['fname']) || isset($_POST['gender'])){ 

	$p_img = $_FILES["image"]["name"];
    $tmp = $_FILES["image"]["tmp_name"] ;
	$errorimg = $_FILES["image"]["error"] ;	
	$p_phone = $mycon->real_escape_string($_POST['phone']);
	$p_password = $mycon->real_escape_string($_POST['password']);
	$p_fname = $mycon->real_escape_string($_POST['fname']);
	$p_sname = $mycon->real_escape_string($_POST['surname']);
	$p_gender = $mycon->real_escape_string($_POST['gender']);
	$p_age = $mycon->real_escape_string($_POST['age']);
	$p_height = $mycon->real_escape_string($_POST['height']);
	$p_weight = $mycon->real_escape_string($_POST['weight']);
	$p_bmi = $mycon->real_escape_string($_POST['bmi']);
	$p_ward = $mycon->real_escape_string($_POST['ward']);
	$p_lga = $mycon->real_escape_string($_POST['lga']);
	$registered_by = $mycon->real_escape_string($_POST['registered_by']);
	// var_dump($hw_email);
	$p_pwd_hash = password_hash($p_password, PASSWORD_DEFAULT);

	function check_p_exist($p_phone){
		global $mycon;
		$query = "select p_phone from healthworkertb where p_phone='$p_phone'";
		$checkid = $mycon->query($query);
		if($checkid->num_rows > 0)
		{
			header("Location:patientNew-page.php?msg=phoneexist");
		}
		
	}
	

	$healthwk_id = check_p_exist($p_phone);
	$date_reg = date("Y-m-d H:i:s");
	$msg = '';


    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    $path = '../uploads/'; // upload directory

    if(!empty($_FILES['image'])){
        $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

        $final_image = rand(1000,1000000).$img;
		if($_FILES['image']['size'] > 100000){
			header("Location:patientNew-page.php?msg=imagesize");
			exit(); 
		}


        if(in_array($ext, $valid_extensions))  { 
            $path = $path.strtolower($final_image); 

            if(move_uploaded_file($tmp,$path)) {
				$insert = $mycon->query("INSERT INTO patient (p_phone, p_password, `p_name`,`p_surname`, `p_age`, `p_gender`, `p_height`, `p_weight`, `p_bmi`, `p_ward`, `p_lga`, `p_pix`, `p_date_reg`, `registered_by`, `p_set`, `p_status`) VALUES ('".
				$p_phone."','".$p_pwd_hash."','".$p_fname."', '".$p_sname."', '".$p_age."', '".$p_gender."', '".$p_height."', '".$p_weight."', '".$p_bmi."', '".$p_ward."', '".$p_lga."', '".$final_image."', '".$date_reg."', '".$registered_by."', '1', '0')") ; 
				if($insert){ 
					header("Location:patientNew-page.php?msg=success");
				}else {			
					// echo "inserted";		
				header("Location:patientNew-page.php?msg=dberror");
				}

            }else{
				// echo 'imagenotuploaded';
				header("Location:patientNew-page.php?msg=imagenotuploaded");
            }
        } else  {
			header("Location:patientNew-page.php?msg=invalidimage");
            // echo 'invalidimage';
        }
    } else  {
		
		header("Location:patientNew-page.php?msg=unknownissue");
        }


}

 



?>