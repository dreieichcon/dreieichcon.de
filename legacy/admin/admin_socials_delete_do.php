<?php

    $id = $_GET['id'];

    $where = array();
    $wh['col'] = "social_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Social-Link löschen";
    $db_result 	= db_delete("social", $where);

    
    include("admin_socials.php");

?>