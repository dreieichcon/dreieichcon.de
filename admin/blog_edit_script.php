<?php


    $data['page_id']                         = $_POST['page_id'];
    $data['page_blog_order']                 = $_POST['page_blog_order'];
    $data['page_blog_headline_de']           = $_POST['page_blog_headline_de'];
    $data['page_blog_headline_en']           = $_POST['page_blog_headline_en'];

    $data['page_blog_content_de']            = $_POST['page_blog_content_de'];
    $data['page_blog_content_en']            = $_POST['page_blog_content_en'];
    $data['page_blog_content_type_id']       = $_POST['page_blog_content_type_id'];
    
    if(isset($_POST['page_blog_subheadline_de'])){
        $data['page_blog_subheadline_de']        = $_POST['page_blog_subheadline_de'];
    }else{
        $data['page_blog_subheadline_de']        = "";
    }

    if(isset($_POST['page_blog_subheadline_en'])){
        $data['page_blog_subheadline_en']        = $_POST['page_blog_subheadline_en'];
    }else{
        $data['page_blog_subheadline_en']        = "";
    }
    
    $data['page_blog_edit_id']       = $_SESSION['admin_user_id'];
    $data['page_blog_edit_ts']       = time();

    $where = array();
    $wh['col'] = "page_blog_id";
    $wh['typ'] = "=";
    $wh['val'] = $_POST['page_blog_id'];
    array_push($where, $wh);

    $query		= "Blog-Eintrag bearbeiten";
    $db_result 	= db_update("page_blog", $data, $where);

    include("blog.php");





?>