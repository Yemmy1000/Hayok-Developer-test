<?php

ob_start();
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
include("config.php");

//echo "hellioooo";
$value1 = $_GET['action'];

//$value1;

if($value1!='')
{
$value = $_GET['action'];	
}
else
{
$value = $_POST['action'];
}


switch($value)
{
    case "UserRegistration":			
    _UserRegistration();
    break;
    
      
    case "loginuser":
    _LoginUserCode();
    break;
    
  
    
    }


    

    function _UserRegistration(){
        global $mxDb;
        global $connect;
        $date=date('Y-m-d');
        $check=$_POST['checkbox'];
        $password=$_POST['password'];
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $mobile=$_POST['mobile'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $position=$_POST['position'];
        $sex=$_POST['sex'];
        echo "hello";
      $d_id = userid();

    //  $user_id = "";

    //  echo "hellob";
    /*
        echo "helloaaa";
    
        mysql_query("INSERT INTO 'doctors' ('id', 'd_id', 'd_pass', 'd_fn', 'd_ln', 'd_email', 'd_check', 'mobile', 'regdate') VALUES 
        (NULL, '$username', '$password', '$firstname', '$lastname','$email', '$check','$mobile', '$date')") or die(mysql_error());
echo "hello";

header("Location:register.php?msg=Registration Completed");
exit();
    
    */
if ($position=='doc'){
    $d_id = userid();

            $save =   mysqli_query($connect, "INSERT INTO `doctors` (`id`, `d_id`, `d_pass`, `d_fn`, `d_ln`, `d_email`, `d_sex`, `regdate`, `mobile`, `position`, `status`) VALUES 
            (NULL, '$d_id', '$password', '$firstname', '$lastname','$email','$sex', '$date','$mobile', '$position', 'Pending')") or die(mysqli_error($connect));
        
    }

elseif($position=='patient'){
    $d_id = useridb();

    $save =   mysqli_query($connect, "INSERT INTO `patients` (`id`, `p_id`, `p_pass`, `p_fn`, `p_ln`, `p_email`, `p_sex`, `regdate`, `mobile`, `status`) VALUES 
    (NULL, '$d_id', '$password', '$firstname', '$lastname','$email', '$sex', '$date','$mobile', 0)") or die(mysqli_error($connect));

    $address_save =   mysqli_query($connect, "INSERT INTO `p_address` (`id`, `p_id`, `house_no`, `street_name`, `town`, `city`, `country`, `geo_location`, `ip_address`) VALUES 
    (NULL, '$d_id', '', '', '','', '','', '')") or die(mysqli_error($connect));

}

elseif($position=='admin'){
   
    $a_id = adminid();                       
 
    $save =   mysqli_query($connect, "INSERT INTO `administrators` (`id`, `a_id`, `a_pass`, `a_fn`, `a_ln`, `a_email`, `a_sex`, `regdate`, `mobile`, `status`) VALUES 
    (NULL, '$a_id', '$password', '$firstname', '$lastname','$email', '$sex', '$date','$mobile', 'Approved')") or die(mysqli_error($connect));
      
    }
	

    if($save){
        header("Location: ../register.php?msg=Success");
    // header("Location:index.html");
        exit();
        }
    else{
        header("Location:../register.php?msg=Error");
        exit();

        }
   }



    function userid()
    {
        global $connect;
   // $table_name='doctors';
    $encypt1=uniqid(rand(100000000, 999999999), true);
    $usid1=str_replace(".", "", $encypt1);
    $pre_userid = substr($usid1, 0, 7);
    $checkid=mysqli_query($connect, "select d_id from doctors where d_id='$pre_userid'") or die(mysqli_error($connect));
    if(mysqli_num_rows($checkid)>0)
    {
    userid();
    }
    else
    return $pre_userid;
    }

    function useridb()
    {
        global $connect;
   // $table_name='patients';
    $encypt1=uniqid(rand(100000000,999999999), true);
    $usid1=str_replace(".", "", $encypt1);
    $pre_userid = substr($usid1, 0, 7);
    $checkid=mysqli_query($connect, "select p_id from patients where p_id='$pre_userid'") or die(mysqli_error($connect));
    if(mysqli_num_rows($checkid)>0)
    {
        useridb();
    }
    else
    return $pre_userid;
    }

    

    function adminid()
    {
        global $connect;
   // $table_name='doctors';
    $encypt2=uniqid(rand(100000000, 999999999), true);
    $usid2=str_replace(".", "", $encypt2);
    $pre_userid2 = substr($usid2, 0, 7);
    $checkid2=mysqli_query($connect, "select d_id from doctors where d_id='$pre_userid2'") or die(mysqli_error($connect));
    if(mysqli_num_rows($checkid2)>0)
    {
    userid();
    }
    else
    return $pre_userid2;
    }




    function _LoginUserCode(){
        global $mxDb;
        global $connect;
         @$username = mysqli_real_escape_string($connect, $_POST['username']);
         @$password = mysqli_real_escape_string($connect, $_POST['password']);
         @$position = mysqli_real_escape_string($connect, $_POST['position']);
       //         @$url = mysqli_real_escape_string($connect, $_POST['url']);
    
          
         if($username!='' && $password!='' )
         {
            if(strlen($username) && strlen($password))
            {
                if ($position =='doc'){
                    $query=mysqli_query($connect, "select * from doctors where ((status='0') && ((d_email = '$username' || d_id='$username' ) && d_pass = '$password'))") or die(mysqli_error($connect));
                    $result=mysqli_fetch_array($query);
                    $num=mysqli_num_rows($query);
                    $fired = 'doc';                    
                   }

                elseif ($position =='patient'){
                    $query=mysqli_query($connect, "select * from patients where ((p_email = '$username' || p_id='$username' ) && p_pass = '$password')") or die(mysqli_error($connect));
                    $result=mysqli_fetch_array($query);
                    $num=mysqli_num_rows($query);
                    
                }

                elseif ($position =='admin'){
                    $query=mysqli_query($connect, "select * from administrators where (((a_email = '$username' || a_id='$username' ) && a_pass = '$password' ))") or die(mysqli_error($connect));
                    $result=mysqli_fetch_array($query);
                    $num=mysqli_num_rows($query);
                }
                       
                
                
                        if($num==1)
                        { 
                            session_start();

                           if($position =='doc'){

                            $user_id = $result['d_id'];
                            $_SESSION['userpanel_user_id'] = $user_id;


                           }

                           elseif($position =='patient'){

                            $user_id = $result['p_id'];
                            $_SESSION['userpanel_user_id'] = $user_id;
                            $checkLocation = mysqli_query($connect, "select house_no, street_name, town, city, country from p_address where p_id='$username'") or die(mysqli_error($connect));
                            $location_result = mysqli_fetch_array($checkLocation);
                            $num = mysqli_num_rows($query);  
                                if($result['street_name'] == "" || $result['town'] == "" || $result['city'] == "" || $result['country'] == "" || $result['p_id']){
                                   ?>
                                    <script type="text/javascript">
                                    window.location.href='../patient/editprofile.php';
                                    </script> 
                                <?php
                                }                         

                           }

                           elseif($position =='admin'){ 

                            $user_id = $result['a_id'];
                            $_SESSION['userpanel_user_id'] = $user_id;

                           }
                            
                           // $patient_id=$result['p_id'];
                           // $admin_id=$result['a_id'];
                            //$_SESSION['SD_User_Name']=$result['username'];

                            //$p_user_id=$result['p_id'];
                            //$_SESSION['SD_User_Name']=$result['username'];
                            //session_start();
                           // $_SESSION['userpanel_user_id'] = $p_user_id;
    
                            /* store the visitor info in table code start here*/
                            /*
                            $guest_ip = $_SERVER['REMOTE_ADDR'];
                            $_SESSION['currency'] = 'N';
                            $_SESSION['rates'] = 1;
    
    
                               $fo=$result['d_fn']." ".$result['d_ln'];
                            mysqli_query($connect, "insert into visitor values (NULL,'$user_id','".$result['username']."','$fo','$guest_ip',CURRENT_TIMESTAMP)");
                            /* store the visitor info in table code ends here*/	
    
                        
                            
                                 ?>
                                 <?php
                                 if ($position =='doc'){
                                     ?>
                                <script type="text/javascript">
                             window.location.href='../doctor/';
                             </script> 
                          <?php
                                 }
                            elseif ($position =='patient'){
                            ?>

                    
                            <?php
                                 }
                                 elseif($position =='admin'){
                                 ?>
                                 <script type="text/javascript">
                             window.location.href='../admin/';
                             </script> 
                               
                               <?php
                                 }
                               ?>
                             <?php
                           
    
                        }
                        else
                        {
                            header("location:../login.php?msg=wrong");
                           }
                 } 
        }
        
    }
	
	

?>