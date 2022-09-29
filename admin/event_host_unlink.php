<?php


    $event_id = $_GET['event_id'];
    $link_id = $_GET['link_id'];

    $where = array();
    $wh['col'] = "event_host_id";
    $wh['typ'] = "=";
    $wh['val'] = $link_id;
    array_push($where, $wh);

    
    $query		= "Gastgeber trennen";
    $db_result 	= db_delete("event_host", $where);

    
    
    
    
    include("event_edit.php");

?>