<?php


    $data['event_id']            = $_POST['event_id'];
    $data['page_bio_id']         = $_POST['page_bio_id'];

    $data['event_participant_edit_id']               = $_SESSION['admin_user_id'];
    $data['event_participant_edit_ts']            	 = time();


    $query		= "Teilnehmer verlinken";
    $db_result 	= db_insert("event_participant", $data);
    
    $event_id = $_POST['event_id'];
    
    
    
    include("event_edit.php");

?>