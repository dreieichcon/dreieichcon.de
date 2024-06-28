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

$data['location_name_de']        = $_POST['location_name_de'];
$data['location_name_en']        = $_POST['location_name_en'];
$data['location_group_de']       = $_POST['location_group_de'];
$data['location_group_en']       = $_POST['location_group_en'];




$data['location_edit_id']            		= $_SESSION['admin_user_id'];
$data['location_edit_ts']            		= time();


$where = array();
$wh['col'] = "location_id";
$wh['typ'] = "=";
$wh['val'] = $_POST['location_id'];
array_push($where, $wh);


$query		= "Veranstaltungsort bearbeiten";
$db_result 	= db_update("location", $data, $where);

include("location.php");

?>