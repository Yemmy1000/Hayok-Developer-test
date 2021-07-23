<?php 
    session_start();
    include_once "../../functs/config.php";
    if(isset($_SESSION['hw_id'])){
         
        $outgoing_id = $_SESSION['hw_id'];
        
        $incoming_id = $mycon->real_escape_string($_POST['incoming_id']);
        $message = $mycon->real_escape_string($_POST['message']);
        // if (!$mycon->query($sql_query)){
        if(!empty($message)){
            $sql = $mycon->query("INSERT INTO chat (msg_id, incoming_msg_id, outgoing_msg_id, msg)
            VALUES (NULL, {$incoming_id}, {$outgoing_id}, '{$message}')");


            // $sql = mysqli_query($conn, "INSERT INTO chat (msg_id, incoming_msg_id, outgoing_msg_id, msg)
            //                             VALUES (NULL, {$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }


    
?>