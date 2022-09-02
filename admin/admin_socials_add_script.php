<?php


$data['social_platform']             	    = $_POST['platform'];
$data['social_href']	            	= $_POST['href'];
$data['social_icon']	            	= $_POST['icon'];
$data['social_order']	            	= $_POST['order'];



$data['social_edit_id']            		= $_SESSION['admin_user_id'];
$data['social_edit_ts']            		= time();


$query		= "Social anlegen";
$db_result 	= db_insert("social", $data);




include("admin_socials.php");



?>
