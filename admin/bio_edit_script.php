<?php

    $data['page_id']                = $_POST['page_id'];
    $data['page_bio_name_de']       = $_POST['page_title_de'];
    $data['page_bio_name_en']       = $_POST['page_title_en'];
    $data['page_bio_short_bio_de']  = $_POST['page_bio_short_bio_de'];
    $data['page_bio_short_bio_en']  = $_POST['page_bio_short_bio_en'];
    $data['page_bio_content_de']    = $_POST['page_bio_content_de'];
    $data['page_bio_content_en']    = $_POST['page_bio_content_en'];

        if(isset($_POST['page_bio_visible']) && $_POST['page_bio_visible'] == "show"){
            $data['page_bio_visible']            = 1;
        }else{
            $data['page_bio_visible']            = 0;
        }



    $data['page_bio_edit_id']       = $_SESSION['admin_user_id'];
    $data['page_bio_edit_ts']       = time();

    $where = array();
    $wh['col'] = "page_bio_id";
    $wh['typ'] = "=";
    $wh['val'] = $_POST['page_bio_id'];;
    array_push($where, $wh);

    $query		= "Biografie von ".$data['page_bio_name_de']." bearbeiten";
    $db_result 	= db_update("page_bio", $data, $where);

    include("bio.php");


