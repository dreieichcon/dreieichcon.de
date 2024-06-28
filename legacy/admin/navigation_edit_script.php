<?php

// Array
// (
//     [navigation_id] => 1
//     [navigation_title_de] => Über uns
//     [navigation_title_en] => About us
//     [page_id] => 4
//     [navigation_href] => 
//     [navigation_parent] => 3
//     [navigation_order] => 1
// )


$data['navigation_title_de']        = $_POST['navigation_title_de'];
$data['navigation_title_en']        = $_POST['navigation_title_en'];
$data['navigation_order']           = $_POST['navigation_order'];
$data['navigation_special_page']    = $_POST['navigation_special_page'];

if(isset($_POST['navigation_show']) && $_POST['navigation_show'] == "show"){
    $data['navigation_show']            = 1;
}else{
    $data['navigation_show']            = 0;
}


if(isset($_POST['page_id']) && $_POST['page_id']>0){
    $data['page_id']        = $_POST['page_id'];
}else{
    $data['page_id']        = null;
}

if(isset($_POST['navigation_href']) && $_POST['navigation_href']!= ""){
    $data['navigation_href']        = $_POST['navigation_href'];
}else{
    $data['navigation_href']        = null;
}

if(isset($_POST['navigation_parent']) && $_POST['navigation_parent']>0){
    $data['navigation_parent']        = $_POST['navigation_parent'];
}else{
    $data['navigation_parent']        = null;
}



$data['navigation_edit_id']            		= $_SESSION['admin_user_id'];
$data['navigation_edit_ts']            		= time();

$where = array();
$wh['col'] = "navigation_id";
$wh['typ'] = "=";
$wh['val'] = $_POST['navigation_id'];
array_push($where, $wh);


$query		= "Menüpunkt bearbeiten";
$db_result 	= db_update("navigation", $data, $where);

include("navigation.php");

?>