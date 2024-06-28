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

$data['event_type_de']        = $_POST['event_type_de'];
$data['event_type_en']        = $_POST['event_type_en'];



$data['event_type_edit_id']            		= $_SESSION['admin_user_id'];
$data['event_type_edit_ts']            		= time();



$where = array();
$wh['col'] = "event_type_id";
$wh['typ'] = "=";
$wh['val'] = $_POST['event_type_id'];
array_push($where, $wh);


$query		= "Veranstaltungsart bearbeiten";
$db_result 	= db_update("event_type", $data, $where);

include("event_type.php");

?>