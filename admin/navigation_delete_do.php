<?php

    $id = $_GET['navigation_id'];

    $where = array();
    $wh['col'] = "navigation_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Menüpunkt löschen";
    $db_result 	= db_delete("navigation", $where);

    
    include("navigation.php");

?>