<?php

    $id = $_GET['bio_gallery_id'];

    $where = array();
    $wh['col'] = "page_bio_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Biografie-Galerie löschen";
    $db_result 	= db_delete("page_bio_gallery", $where);

    $page_bio_id = htmlspecialchars($_GET['bio_id']);
    include("bio_gallery.php");

?>