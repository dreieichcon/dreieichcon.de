<?php

  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");

  $return_array = get_childs("NULL");

        

    function get_childs($navigation_id){
      
        $where = array();
        $wh['col'] = "navigation_parent";
        $wh['typ'] = "=";
        $wh['val'] = $navigation_id;
        array_push($where, $wh);

        $order = array();
        $or['col'] = "navigation_order";
        $or['dir'] = "ASC";
        array_push($order, $or);
        
        $db_array = db_select("navigation", $where, $order);

        $local_array = array();
        foreach($db_array as $line){
            $childs = get_childs($line['navigation_id']);
            if(count($childs)> 0){
               $line['childs'] = $childs;
            }
            array_push($local_array, $line);
        }
        return $local_array;

    }
   header('Content-Type: application/json');
    echo json_encode($return_array);

  ?>