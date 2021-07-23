<?php 
    session_start();
    if(isset($_SESSION['hw_id'])){
        include_once "../../functs/config.php";
        $outgoing_id = $_SESSION['hw_id'];
        $incoming_id = $mycon->real_escape_string($_POST['incoming_id']);
        $output = "";
        // $sql = "SELECT * FROM chat LEFT JOIN healthworkertb ON healthworkertb.hw_id = chat.outgoing_msg_id";
   $sql = "SELECT * FROM chat LEFT JOIN healthworkertb ON healthworkertb.hw_id = chat.outgoing_msg_id
   WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
   OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

        $query = $mycon->query($sql);
        // printf("Error: %s\n", $mycon->error);
        // $checkid->num_rows > 0
        if( $query->num_rows > 0){
            while($row = $query -> fetch_array()){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                    <p>'. $row['hw_sname'] .'</p>
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>