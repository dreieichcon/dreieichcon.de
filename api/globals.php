<?php

  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");



    $order = array();
    $order1['col'] = "global_key";
    $order1['dir'] = "ASC";

    array_push($order, $order1);

    $db_array = db_select("global", array(), $order);

    $return_array = array();
    
    foreach($db_array as $line){
        $key = $line['global_key'];
        $val = $line['global_value'];
        
        $return_array[$key] = $val;
    }

    header('Content-Type: application/json');
    echo json_encode($return_array);

    ?>