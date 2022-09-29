<?php

    $id = $_GET['program_type_id'];

    $where = array();
    $wh['col'] = "program_type_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Veranstaltungsart löschen";
    $db_result 	= db_delete("program_type", $where);

    
    include("program_type.php");

?>
