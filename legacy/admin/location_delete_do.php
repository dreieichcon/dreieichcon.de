<?php

    $id = $_GET['location_id'];

    $where = array();
    $wh['col'] = "location_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Veranstaltungsort löschen";
    $db_result 	= db_delete("location", $where);

    
    include("location.php");

?>
