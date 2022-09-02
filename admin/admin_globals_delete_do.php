<?php

    $key = $_GET['key'];

    $where = array();
    $wh['col'] = "global_key";
    $wh['typ'] = "=";
    $wh['val'] = $key;
    array_push($where, $wh);

    $key = htmlspecialchars($key);
    $query		= "Global $key löschen";
    $db_result 	= db_delete("global", $where);

    
    include("admin_globals.php");

?>