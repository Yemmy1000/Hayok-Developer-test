<?php 
ob_start();
include "../../cfg/config.php";
include("../includes/header.php");
include("userfunct.php");

// sleep(5);
$img = $_FILES["image"]["name"];
$tmp = $_FILES["image"]["tmp_name"] ;
$errorimg = $_FILES["image"]["error"] ;
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$bg = $_POST['bg'];
$pno = $_POST['pno'];

$rel = $_POST['rel'];
$email = $_POST['mail'];
$class = $_POST['class'];
$bio = $_POST['bio'];
$update = $_POST['update'];


$date = date('Y-m-d H:i:s');


if ($fn =='' || $ln == '' || $gender == '' || $dob == '' ||  $bg == '' || $rel == '' || $ln == ''){
    echo 'emptyfields';
    exit();
}


// $sql = "INSERT INTO all_profile(`id`,`fn` ) VALUES (NULL,'$fn')";
// mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect)."qqq".$sql);
// echo "go";

// exit();

if ($update ==""){

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = '../uploads/'; // upload directory

if(!empty($_FILES['image']))
{

$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
if($_FILES['image']['size'] > 100000){
echo "imagesizer";
exit();
}

// echo $_FILES['image']['size'];
// exit;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 





if(move_uploaded_file($tmp,$path)) 
{
// echo "<img class='mr-3 rounded ' style='border:2px solid #000; width:200px;' src='$path' />";


//include database configuration file
// include_once 'db.php';

//insert form data in the database
// mysql_query("update user_registration set valid_id_img='$final_image' where user_id='$userid'") or die (mysql_error());
if ($user_prof_stat == 1){
}
else{
$sql = "INSERT INTO all_profile(`id`, `user_id`,`ts`,`fn`, `ln`, `gender`, `class`, `religion`, `email`, `pno`, `bio`, `dob`, `profile_pic`,`bloodgroup`,  `reg_date`, `prof_stat`) 
VALUES (NULL,'$user_id','0', '$fn', '$ln','$gender','$user_class','$rel','$email', '$pno','$bio', '$dob', '$final_image','$bg', '$date', '1')";
mysqli_query($connect, $sql) or die("database error:". mysqli_error($connect)."qqq".$sql);

$sql= "UPDATE stud SET stud_prof_stat='2' WHERE stud_id='$user_id' ";
mysqli_query($connect, $sql);
echo "go";
//echo $insert?'ok':'err';
}
}
else{
    echo 'imagenotuploaded';
}
} 
else 
{
echo 'invalidimage';
}
}
else 
{
echo 'empty';
}
}
else{
    $upuser =$_SESSION['stud_id'];
    $sql= "UPDATE all_profile SET ln='$ln', fn='$fn',gender='$gender', religion='$rel', email='$email', pno='$pno', bio='$bio', ln='$ln' WHERE user_id='$upuser' ";
mysqli_query($connect, $sql);
// echo $upuser;



$icon ='  <div class="activity-icon bg-primary text-white">
<i class="fas fa-user-check"></i>
</div>';
$link = "biodata.php";

     $acti = ' Biodata Updated ';
save_activity($icon, $link, $acti, $upuser);
    echo "update";
}


// if($errorimg > 0){

//    die('<div class="alert alert-danger" role="alert"> An error occurred while uploading the file </div>');

// }


// if($myFile['size'] > 500000){

//    die('<div class="alert alert-danger" role="alert"> File is too big </div>');

// }
?>