<?php


    $data['page_id']                         = $_POST['page_id'];
    $data['page_blog_order']                 = $_POST['page_blog_order'];
    $data['page_blog_headline_de']           = $_POST['page_blog_headline_de'];
    $data['page_blog_headline_en']           = $_POST['page_blog_headline_en'];
    $data['page_blog_subheadline_de']        = $_POST['page_blog_subheadline_de'];
    $data['page_blog_subheadline_en']        = $_POST['page_blog_subheadline_en'];
    $data['page_blog_content_de']            = $_POST['page_blog_content_de'];
    $data['page_blog_content_en']            = $_POST['page_blog_content_en'];

    
    $data['page_blog_edit_id']       = $_SESSION['admin_user_id'];
    $data['page_blog_edit_ts']       = time();

    $query		= "Blog-Eintrag anlegen";
    $db_result 	= db_insert("page_blog", $data);

    include("blog.php");





?>