<?php

    $where = array();
    $wh['col'] = "event_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['event_id'];
    array_push($where, $wh);

    $db_array = db_select("event", $where);

if(count($db_array)>0){
    $data = $db_array[0];
}else{
    include("999.php");
    include("include/html_footer.php");
    die;
}

?>



<?php

$event_id = $data['event_id'];
$target_dir = "../upload/event/img/";


//delete images
$image = $data['event_image_href_de'];
if(is_file($target_dir.$image)){
    unlink($target_dir.$image);
}

$image = $data['event_image_href_en'];
if(is_file($target_dir.$image)){
    unlink($target_dir.$image);
}

//unlink hosts


$where = array();
$wh['col'] = "event_id";
$wh['typ'] = "=";
$wh['val'] = $event_id;
array_push($where, $wh);

$db_result 	= db_delete("event_host", $where);


//unlink participants
$where = array();
$wh['col'] = "event_id";
$wh['typ'] = "=";
$wh['val'] = $event_id;
array_push($where, $wh);

$db_result 	= db_delete("event_participant", $where);


//delete event
$where = array();
$wh['col'] = "event_id";
$wh['typ'] = "=";
$wh['val'] = $event_id;
array_push($where, $wh);

$query      = "Veranstaltung löschen";
$db_result 	= db_delete("event", $where);

include("event.php");



?>