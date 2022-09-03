<?php

    $data['page_id']                = $_POST['page_id'];
    $data['page_bio_name_de']       = $_POST['page_title_de'];
    $data['page_bio_name_en']       = $_POST['page_title_en'];
    $data['page_bio_short_bio_de']  = $_POST['page_bio_short_bio_de'];
    $data['page_bio_short_bio_en']  = $_POST['page_bio_short_bio_en'];
    $data['page_bio_content_de']    = $_POST['page_bio_content_de'];
    $data['page_bio_content_en']    = $_POST['page_bio_content_en'];
    
    $data['page_bio_edit_id']       = $_SESSION['admin_user_id'];
    $data['page_bio_edit_ts']       = time();

    $query		= "Biografie anlegen";
    $db_result 	= db_insert("page_bio", $data);

    include("bio.php");



?>