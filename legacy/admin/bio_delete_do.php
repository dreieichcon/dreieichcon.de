<?php

    $id = $_GET['bio_id'];

    $where = array();
    $wh['col'] = "page_bio_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Biografie löschen";
    $db_result 	= db_delete("page_bio", $where);

    
    include("bio.php");

?>