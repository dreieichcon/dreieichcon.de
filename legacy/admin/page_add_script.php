<?php

// Array
// (
//     [page_title_de] => Testseite 1
//     [page_title_en] => Testpage 1
//     [page_type_id] => 1
// )


$data['page_title_de']      = $_POST['page_title_de'];
$data['page_title_en']      = $_POST['page_title_en'];
$data['page_type_id']       = $_POST['page_type_id'];


$data['page_edit_id']       = $_SESSION['admin_user_id'];
$data['page_edit_ts']       = time();


$query		= "Seite anlegen";
$db_result 	= db_insert("page", $data);

include("page.php");


?>