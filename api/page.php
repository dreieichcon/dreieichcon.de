<?php
if(!isset($_GET['page_id'])){
    http_response_code(400);
    die;
}

  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");

  $return_array = array();
  $where = array();
  $wh['col'] = "page_id";
  $wh['typ'] = "=";
  $wh['val'] = $_GET['page_id'];
  array_push($where, $wh);

  $db_array = db_select("page", $where);

  if(count($db_array)>0){
    $return_array = $db_array[0];
  }else{
    http_response_code(404);
    die;
  }
    
  $page_content = array();

  $where = array();
  $wh['col'] = "page_id";
  $wh['typ'] = "=";
  $wh['val'] = $_GET['page_id'];
  array_push($where, $wh);

  $bios = db_select("page_bio", $where);

  $page_content['bio'] = $bios;



  $return_array['page_content'] = $page_content;

  header('Content-Type: application/json');
  echo json_encode($return_array);

  ?>