<?php

  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");


  $data['contact_form_name']         = $_POST['name'];
  $data['contact_form_mail']         = $_POST['mail'];
  $data['contact_form_message']      = $_POST['message'];
  $data['contact_form_ts']           = time();
  
  $data['contact_form_edit_ts']      = 0;
  $data['contact_form_edit_id']      = time();

  $db_result 	= db_insert("contact_form", $data);

  header('Content-Type: application/json');
  echo json_encode($db_result);

?>