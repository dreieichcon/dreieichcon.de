<?php

    $id = $_GET['page_id'];

    $where = array();
    $wh['col'] = "page_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Seite löschen";
    $db_result 	= db_delete("page", $where);

    
    include("page.php");

?>