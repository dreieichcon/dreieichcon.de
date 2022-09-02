<?php


$data['global_key']             	    = $_POST['key'];
$data['global_value']	            	= $_POST['value'];



$data['global_edit_id']            		= $_SESSION['admin_user_id'];
$data['global_edit_ts']            		= time();


$query		= "Global anlegen";
$db_result 	= db_insert("global", $data);




include("admin_globals.php");



?>
