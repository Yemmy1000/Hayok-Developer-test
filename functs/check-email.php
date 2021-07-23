<?php

/* check if email is already registered */

//connect to db using mysqli
include("config.php");

if (!empty($_POST['email'])){   
    global $mycon; 
    $email = $mycon->real_escape_string($_POST['email']);
    $query = "SELECT hw_email FROM healthworkertb WHERE hw_email = '{$email}' LIMIT 1";

    $checkmail = $mycon->query($query);
	if($checkmail->num_rows == 0)
    {
        // $mycon->close();
        echo "true";  //good to register
    }
    else
    {
        echo "false"; //already registered
    }
}
else
{
    echo "false"; //invalid post var
}






?>