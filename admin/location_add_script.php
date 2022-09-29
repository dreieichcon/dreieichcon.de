<?php

// Array
// (
//     [location_name_de] => Clubraum C4
//     [location_name_en] => Clubroom C4
//     [location_group_de] => Clubräume
//     [location_group_en] => Clubrooms
// )

    $data['location_name_de']        = $_POST['location_name_de'];
    $data['location_name_en']        = $_POST['location_name_en'];
    $data['location_group_de']       = $_POST['location_group_de'];
    $data['location_group_en']       = $_POST['location_group_en'];
    

    
    
    $data['location_edit_id']            		= $_SESSION['admin_user_id'];
    $data['location_edit_ts']            		= time();


    $query		= "Veranstaltungsort anlegen";
    $db_result 	= db_insert("location", $data);
    
    
    
    
    include("location.php");
    
    
    

?>