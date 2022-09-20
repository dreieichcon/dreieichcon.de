<?php

  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");

  $return_array = get_childs("NULL");

        

    function get_childs($navigation_id){

      global $pdo_connection;
      $pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);

    if($navigation_id == "NULL"){
      $sql = "SELECT * FROM navigation WHERE navigation_parent is NULL AND navigation_show = 1 ORDER BY navigation_order";
    }else{
      $sql = "SELECT * FROM navigation WHERE navigation_parent = $navigation_id AND navigation_show = 1 ORDER BY navigation_order";
    }
   

      $statement	= $pdo->prepare($sql);

   //   $statement->bindParam(':parent', $navigation_id);

      $statement->execute();

      $db_array = array();

      while($row = $statement->fetch(PDO::FETCH_ASSOC)){
          foreach ($row as $key => $value){
              $row[$key] = db_parse($value);
          }
          array_push($db_array, $row);
      }
      
       

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