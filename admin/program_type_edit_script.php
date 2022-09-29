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

$data['program_type_de']        = $_POST['program_type_de'];
$data['program_type_en']        = $_POST['program_type_en'];



$data['program_type_edit_id']            		= $_SESSION['admin_user_id'];
$data['program_type_edit_ts']            		= time();



$where = array();
$wh['col'] = "program_type_id";
$wh['typ'] = "=";
$wh['val'] = $_POST['program_type_id'];
array_push($where, $wh);


$query		= "Veranstaltungsart bearbeiten";
$db_result 	= db_update("program_type", $data, $where);

include("program_type.php");

?>