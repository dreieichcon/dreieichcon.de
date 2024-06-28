<?php


$data['social_platform']             	    = $_POST['platform'];
$data['social_href']	            	= $_POST['href'];
$data['social_icon']	            	= $_POST['icon'];
$data['social_order']	            	= $_POST['order'];



$data['social_edit_id']            		= $_SESSION['admin_user_id'];
$data['social_edit_ts']            		= time();


$where = array();
$wh['col'] = "social_id";
$wh['typ'] = "=";
$wh['val'] = $_POST['id'];
array_push($where, $wh);

$query		= "Social-Link bearbeiten";
$db_result 	= db_update("social", $data, $where);




include("admin_socials.php");



?>
