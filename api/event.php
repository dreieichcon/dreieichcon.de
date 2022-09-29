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

  $return_array = array();

$sql		= "SELECT * FROM event e, event_type t, location l WHERE e.location_id = l.location_id AND e.event_type_id = t.event_type_id ORDER BY e.program_start_ts ASC, l.location_name_de ASC";
                                                        
$pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

$statement	= $pdo->prepare($sql);

//$statement->bindParam(':page_id', $page_id);

$statement->execute();

$blog = array();

while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    foreach ($row as $key => $value){
        $row[$key] = db_parse($value);
    }
    array_push($return_array, $row);
}
    
header('Content-Type: application/json');
  echo json_encode($return_array);

?>