

<?php

    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        
        $output .= '<a href="RQ1.php?user_id='. $row['unique_id'].'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                    </div>
                    </div>
                    <button><i">+</i></button>
                    </a>';
    }
?>
<!-- <div class="actions">
                        if($is_already_friends){
                            echo <a href="functions.php?action=unfriend_req&id='.$user_data->id.'" class="req_actionBtn unfriend">Unfriend</a>;
                        }
                        elseif($check_req_sender){
                            echo <a href="functions.php?action=cancel_req&id='.$user_data->id.'" class="req_actionBtn cancleRequest">Cancel Request</a>;
                        }
                        elseif($check_req_receiver){
                            echo <a href="functions.php?action=ignore_req&id='.$user_data->id.'" class="req_actionBtn ignoreRequest">Ignore</a>&nbsp;
                            <a href="functions.php?action=accept_req&id='.$user_data->id.'" class="req_actionBtn acceptRequest">Accept</a>;
                        }
                        else{
                            echo <a href="functions.php?action=send_req&id='.$user_data->id.'" class="req_actionBtn sendRequest">Send Request</a>;
                        }
                    </div> -->