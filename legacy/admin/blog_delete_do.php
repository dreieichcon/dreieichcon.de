<?php

    $id = $_GET['blog_id'];

    $where = array();
    $wh['col'] = "page_blog_id";
    $wh['typ'] = "=";
    $wh['val'] = $id;
    array_push($where, $wh);

    
    $query		= "Blog löschen";
    $db_result 	= db_delete("page_blog", $where);

    
    include("blog.php");

?>