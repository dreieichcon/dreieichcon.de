<?php

// Array
// (
//     [navigation_title_de] => Über uns
//     [navigation_title_en] => About us
//     [page_id] => 4
//     [navigation_href] => extern.dreieichcon.de
//     [navigation_parent] => 0
//     [navigation_order] => 2
// )

    $data['navigation_title_de']        = $_POST['navigation_title_de'];
    $data['navigation_title_en']        = $_POST['navigation_title_en'];
    $data['navigation_special_page']    = $_POST['navigation_special_page'];
    $data['navigation_order']           = $_POST['navigation_order'];
    
    if(isset($_POST['page_id']) && $_POST['page_id']>0){
        $data['page_id']        = $_POST['page_id'];
    }

    if(isset($_POST['navigation_href']) && $_POST['navigation_href']!= ""){
        $data['navigation_href']        = $_POST['navigation_href'];
    }

    if(isset($_POST['navigation_parent']) && $_POST['navigation_parent']>0){
        $data['navigation_parent']        = $_POST['navigation_parent'];
    }

    
    
    $data['navigation_edit_id']            		= $_SESSION['admin_user_id'];
    $data['navigation_edit_ts']            		= time();


    $query		= "Menüpunkt anlegen";
    $db_result 	= db_insert("navigation", $data);
    
    
    
    
    include("navigation.php");
    
    
    

?>