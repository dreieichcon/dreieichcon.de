<?php

    /*
        Array
        (
            [page_id] => 4
            [page_gallery_order] => 34
            [page_id_link] => 4
            [page_gallery_text_de] => lorem
            [page_gallery_text_en] => upsum
        )
    */

    $data['page_id']                    = $_POST['page_id'];
    $data['page_gallery_order']         = $_POST['page_gallery_order'];
    if(isset($_POST['page_id_link'])&& $_POST['page_id_link']>0){
        $data['page_id_link']               = $_POST['page_id_link'];
    }else{
        $data['page_id_link'] = null;
    }

    
    $data['page_gallery_text_de']       = $_POST['page_gallery_text_de'];
    $data['page_gallery_text_en']       = $_POST['page_gallery_text_en'];

    $data['page_gallery_edit_id']       = $_SESSION['admin_user_id'];
    $data['page_gallery_edit_ts']       = time();

    $query		= "Galerie-Punkt anlegen";
    $db_result 	= db_insert("page_gallery", $data);

    $page_gallery_id = $db_result['last_id'];
    include("gallery_edit_image.php");













?>