<?php

//check information
//   if(!isset($_GET['page_id'])){
//       http_response_code(400);
//       die;
//   }

//   $page_id = $_GET['page_id'];

//load librarys
  include("../admin/include/functions.php");
  include("../admin/include/db_connect.php");
  include("../admin/include/db_querys.php");
  include("../admin/include/times.php");


  function get_participants($event_id){
    global $pdo_connection;
    
    $pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
 
 
    $sql		= "SELECT * FROM page_bio b, event_participant h WHERE h.page_bio_id = b.page_bio_id AND h.event_id = :event ORDER BY page_bio_name_de";
                                                        
    $statement	= $pdo->prepare($sql);

    $statement->bindParam(':event', $event_id);

    $statement->execute();

    $db_array = array();

    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        foreach ($row as $key => $value){
            $row[$key] = db_parse($value);
        }
        array_push($db_array, $row);
    }
    return $db_array;
  }


  function get_hosts($event_id){
    global $pdo_connection;
    
    $pdo = new PDO($pdo_connection['mysql'], $pdo_connection['user'], $pdo_connection['pwd']);
 
 
    $sql		= "SELECT * FROM page_bio b, event_host h WHERE h.page_bio_id = b.page_bio_id AND h.event_id = :event ORDER BY page_bio_name_de";
                                                        
    $statement	= $pdo->prepare($sql);

    $statement->bindParam(':event', $event_id);

    $statement->execute();

    $db_array = array();

    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        foreach ($row as $key => $value){
            $row[$key] = db_parse($value);
        }
        array_push($db_array, $row);
    }
    return $db_array;
  }


  $return_array = array();

$sql		= "SELECT * FROM event e, event_type t, location l WHERE e.location_id = l.location_id AND e.event_type_id = t.event_type_id AND e.event_show = 1 ORDER BY e.event_start_ts ASC, l.location_name_de ASC";
                                                        
$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

$statement	= $pdo->prepare($sql);

//$statement->bindParam(':page_id', $page_id);

$statement->execute();

$blog = array();

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    foreach ($row as $key => $value){
        $row[$key] = db_parse($value);
    }

    $row['participants'] = get_participants($row['event_id']);
    $row['hosts']        = get_hosts($row['event_id']);

    array_push($return_array, $row);
}
    if(isset($_GET['debug'])){
      echo"<pre>";
      print_r($return_array);
      echo"</pre>";
    }else{
      header('Content-Type: application/json');
      echo json_encode($return_array);
    }


?>