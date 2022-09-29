<?php


    $data['event_id']            = $_POST['event_id'];
    $data['page_bio_id']         = $_POST['page_bio_id'];

    $data['event_host_edit_id']               = $_SESSION['admin_user_id'];
    $data['event_host_edit_ts']            	 = time();


    $query		= "Gastgeber verlinken";
    $db_result 	= db_insert("event_host", $data);
    
    $event_id = $_POST['event_id'];
    
    
    
    include("event_edit.php");

?>