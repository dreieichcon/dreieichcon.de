<?php


$data['global_key']             	    = $_POST['key'];
$data['global_value']	            	= $_POST['value'];



$data['global_edit_id']            		= $_SESSION['admin_user_id'];
$data['global_edit_ts']            		= time();

$where = array();
$wh['col'] = "global_key";
$wh['typ'] = "=";
$wh['val'] = $_POST['key'];
array_push($where, $wh);

$query		= "Global anlegen";
$db_result 	= db_update("global", $data, $where);




include("admin_globals.php");



?>
