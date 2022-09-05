<?php

    $id = $_GET['gallery_id'];

    $where = array();
    $wh['col'] = "page_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Blog löschen";
    $db_result 	= db_delete("page_gallery", $where);

    
    include("gallery.php");

?>