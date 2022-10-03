<?php


/*
Array
(
    [event_type_id] => 1
    [location_id] => 2
    [event_start_date] => 2022-11-19
    [event_start_time] => 14:00
    [event_end_date] => 2022-11-19
    [event_end_time] => 15:00
    [event_title_de] => Eine Lesung 
    [event_title_en] => A Reading
    [event_description_de] => Lorem ipsum
    [event_description_en] => dolor sit amet
)
*/




    $data['event_type_id']               = $_POST['event_type_id'];
    $data['location_id']                 = $_POST['location_id'];
    $data['event_title_de']              = $_POST['event_title_de'];
    $data['event_title_en']              = $_POST['event_title_en'];
    $data['event_description_de']        = $_POST['event_description_de'];
    $data['event_description_en']        = $_POST['event_description_en'];
    $data['event_description_short_de']  = $_POST['event_description_short_de'];
    $data['event_description_short_en']  = $_POST['event_description_short_en'];
  
    $data['event_start_ts']              = FormTimeToUnix($_POST['event_start_date']. " " . $_POST['event_start_time']);
    $data['event_end_ts']                = FormTimeToUnix($_POST['event_end_date'].   " " . $_POST['event_end_time']);

    if(isset($_POST['event_show']) && $_POST['event_show'] == "show"){
        $data['event_show']            = 1;
    }else{
        $data['event_show']            = 0;
    }
    

    
    $data['event_edit_id']               = $_SESSION['admin_user_id'];
    $data['event_edit_ts']            	 = time();

    $where = array();
    $wh['col'] = "event_id";
    $wh['typ'] = "=";
    $wh['val'] = $_POST['event_id'];
    array_push($where, $wh);


    $query		= "Veranstaltung bearbeiten";
    $db_result 	= db_update("event", $data, $where);
    
    
    $event_id = $_POST['event_id'];
    
    
    
    include("event_edit.php");
?>