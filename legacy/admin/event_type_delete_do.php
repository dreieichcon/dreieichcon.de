<?php

    $id = $_GET['event_type_id'];

    $where = array();
    $wh['col'] = "event_type_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Veranstaltungsart löschen";
    $db_result 	= db_delete("event_type", $where);

    
    include("event_type.php");

?>
