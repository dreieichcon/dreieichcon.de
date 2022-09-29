<?php

// Array
// (
//     [location_name_de] => Clubraum C4
//     [location_name_en] => Clubroom C4
//     [location_group_de] => Clubräume
//     [location_group_en] => Clubrooms
// )

    $data['event_type_de']        = $_POST['event_type_de'];
    $data['event_type_en']        = $_POST['event_type_en'];
  
    
    
    $data['event_type_edit_id']            		= $_SESSION['admin_user_id'];
    $data['event_type_edit_ts']            		= time();


    $query		= "Veranstaltungsart anlegen";
    $db_result 	= db_insert("event_type", $data);
    
    
    
    
    include("event_type.php");
    
    
    

?>