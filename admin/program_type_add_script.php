<?php

// Array
// (
//     [location_name_de] => Clubraum C4
//     [location_name_en] => Clubroom C4
//     [location_group_de] => Clubräume
//     [location_group_en] => Clubrooms
// )

    $data['program_type_de']        = $_POST['program_type_de'];
    $data['program_type_en']        = $_POST['program_type_en'];
  
    
    
    $data['program_type_edit_id']            		= $_SESSION['admin_user_id'];
    $data['program_type_edit_ts']            		= time();


    $query		= "Veranstaltungsart anlegen";
    $db_result 	= db_insert("program_type", $data);
    
    
    
    
    include("program_type.php");
    
    
    

?>