<?php

    /*
        Array
        (
            [page_id] => 4
            [page_bio_gallery_order] => 34
            [page_id_link] => 4
            [page_bio_gallery_text_de] => lorem
            [page_bio_gallery_text_en] => upsum
        )
    */

    $data['page_bio_id']                    = $_POST['page_bio_id'];
    $data['page_bio_gallery_order']         = $_POST['page_bio_gallery_order'];
    
    $data['page_bio_gallery_text_de']       = $_POST['page_bio_gallery_text_de'];
    $data['page_bio_gallery_text_en']       = $_POST['page_bio_gallery_text_en'];

    $data['page_bio_gallery_edit_id']       = $_SESSION['admin_user_id'];
    $data['page_bio_gallery_edit_ts']       = time();

    $where = array();
    $wh['col'] = "page_bio_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $_POST['page_bio_gallery_id'];
    array_push($where, $wh);

    $query		= "Galerie-Punkt anlegen";
    $db_result 	= db_update("page_bio_gallery", $data, $where);

    $page_bio_id = $_POST['page_bio_id'];
    include("bio_gallery.php");













?>