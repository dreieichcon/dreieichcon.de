
<?php
$target_dir = "../upload/event/img/";

//check required information
if(!isset($_GET['event_id']) || !isset($_GET['lang'])){
    include("400.php");
    include("include/html_footer.php");
    die;
}


$event_id   = $_GET['event_id'];

$language       = $_GET['lang'];


$where = array();
$wh['col'] = "event_id";
$wh['typ'] = "=";
$wh['val'] = $event_id;
array_push($where, $wh);

$db_array = db_select("event", $where);

if(count($db_array)>0){
    $data = $db_array[0];
}else{
    include("400.php");
    include("include/html_footer.php");
    die;
}

//delete currently present image if exists
if($language == "de"){
    $image = $data['event_image_href_de'];
}else{
    $image = $data['event_image_href_en'];
}

if(is_file($target_dir.$image)){
    unlink($target_dir.$image);
}

//update database, so no image is linked if upload fails
if($language == "de"){
    $data['event_image_alt_de']         = "";
    $data['event_image_alt_de']          = "";
    $data['event_image_copy_de']          = "";
    
}else{
    $data['event_image_alt_en']         = "";
    $data['event_image_alt_en']          = "";
    $data['event_image_copy_en']          = "";
}


$data['event_edit_id']    = $_SESSION['admin_user_id'];
$data['event_edit_ts']    = time();

$where = array();
$wh['col'] = "event_id";
$wh['typ'] = "=";
$wh['val'] = $_GET['event_id'];
array_push($where, $wh);

$query		= "Event-Bild hochladen";
$db_result 	= db_update("event", $data, $where);



$event_id= htmlspecialchars($_GET['event_id']);
include("event_edit.php");

?>
