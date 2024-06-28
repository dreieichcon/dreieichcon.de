<?php
    $target_dir = "../upload/gallery/img/";

    //check required information
    if(!isset($_GET['page_gallery_id']) || !isset($_GET['lang'])){
        include("400.php");
        include("include/html_footer.php");
        die;
    }


    $page_gallery_id   = $_GET['page_gallery_id'];

    $language       = $_GET['lang'];


    $where = array();
    $wh['col'] = "page_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $page_gallery_id;
    array_push($where, $wh);

    $db_array = db_select("page_gallery", $where);

    if(count($db_array)>0){
        $data = $db_array[0];
    }else{
        include("400.php");
        include("include/html_footer.php");
        die;
    }

    //delete currently present image if exists
    if($language == "de"){
        $image = $data['page_gallery_image_href_de'];
    }else{
        $image = $data['page_gallery_image_href_en'];
    }

    if(is_file($target_dir.$image)){
        unlink($target_dir.$image);
    }

    //update database, so no image is linked if upload fails
    if($language == "de"){
        $data['page_gallery_image_href_de']         = "";
        $data['page_gallery_image_alt_de']          = "";
        $data['page_gallery_image_copy_de']          = "";
        
    }else{
        $data['page_gallery_image_href_en']         = "";
        $data['page_gallery_image_alt_en']          = "";
        $data['page_gallery_image_copy_en']          = "";
    }


    $data['page_gallery_edit_id']    = $_SESSION['admin_user_id'];
    $data['page_gallery_edit_ts']    = time();

    $where = array();
    $wh['col'] = "page_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['page_gallery_id'];
    array_push($where, $wh);

    $query		= "Blog-Bild hochladen";
    $db_result 	= db_update("page_gallery", $data, $where);


    $page_gallery_id = htmlspecialchars($_GET['page_gallery_id']);
    include("gallery_edit_image.php");


?>