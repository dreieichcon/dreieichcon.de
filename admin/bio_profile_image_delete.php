<?php

    $target_dir = "../upload/bio_profile/img/";

    //check required information
    if(!isset($_GET['page_bio_id']) || !isset($_GET['lang'])){
        include("400.php");
        include("include/html_footer.php");
        die;
    }


    $page_bio_id   = $_GET['page_bio_id'];

    $language       = $_GET['lang'];


    $where = array();
    $wh['col'] = "page_bio_id";
    $wh['typ'] = "=";
    $wh['val'] = $page_bio_id;
    array_push($where, $wh);

    $db_array = db_select("page_bio", $where);

    if(count($db_array)>0){
        $data = $db_array[0];
    }else{
        include("400.php");
        include("include/html_footer.php");
        die;
    }

    //delete currently present image if exists
    if($language == "de"){
        $image = $data['page_bio_image_de'];
    }else{
        $image = $data['page_bio_image_en'];
    }

    if(is_file($target_dir.$image)){
        unlink($target_dir.$image);
    }

    //update database, so no image is linked if upload fails
    if($language == "de"){
        $data['page_bio_image_de']              = "";
        $data['page_bio_image_alt_de']          = "";
        $data['page_bio_image_copy_de']          = "";
        
    }else{
        $data['page_bio_image_en']              = "";
        $data['page_bio_image_alt_en']          = "";
        $data['page_bio_image_copy_en']          = "";
    }


    $data['page_bio_edit_id']    = $_SESSION['admin_user_id'];
    $data['page_bio_edit_ts']    = time();

    $where = array();
    $wh['col'] = "page_bio_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['page_bio_id'];
    array_push($where, $wh);

    $query		= "Profil-Bild entfernen";
    $db_result 	= db_update("page_bio", $data, $where);


    $page_blog_id = htmlspecialchars($_GET['page_bio_id']);
    include("bio_profile.php");


?>