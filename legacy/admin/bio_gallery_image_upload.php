
<?php
$target_dir = "../upload/bio_gallery/img/";

//check required information
if(!isset($_POST['page_bio_gallery_id']) || !isset($_POST['image_language'])){
    include("400.php");
    include("include/html_footer.php");
    die;
}


$page_bio_gallery_id   = $_POST['page_bio_gallery_id'];

$language       = $_POST['image_language'];


$where = array();
$wh['col'] = "page_bio_gallery_id";
$wh['typ'] = "=";
$wh['val'] = $page_bio_gallery_id;
array_push($where, $wh);

$db_array = db_select("page_bio_gallery", $where);

if(count($db_array)>0){
    $data = $db_array[0];
}else{
    include("400.php");
    include("include/html_footer.php");
    die;
}

//delete currently present image if exists
if($language == "de"){
    $image = $data['page_bio_gallery_image_href_de'];
}else{
    $image = $data['page_bio_gallery_image_href_en'];
}

if(is_file($target_dir.$image)){
    unlink($target_dir.$image);
}

//update database, so no image is linked if upload fails
if($language == "de"){
    $data['page_bio_gallery_image_href_de']         = "";
    $data['page_bio_gallery_image_alt_de']          = "";
    $data['page_bio_gallery_image_copy_de']          = "";
    
}else{
    $data['page_bio_gallery_image_href_en']         = "";
    $data['page_bio_gallery_image_alt_en']          = "";
    $data['page_bio_gallery_image_copy_de']          = "";
}


$data['page_bio_gallery_edit_id']    = $_SESSION['admin_user_id'];
$data['page_bio_gallery_edit_ts']    = time();

$where = array();
$wh['col'] = "page_bio_gallery_id";
$wh['typ'] = "=";
$wh['val'] = $_POST['page_bio_gallery_id'];
array_push($where, $wh);

$query		= "Blog-Bild hochladen";
$db_result 	= db_update("page_bio_gallery", $data, $where);


//Start image processing

$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$now = time();
$rand = rand(1,255);
$new_file_name = md5($rand.$now.$rand);

$new_file = $target_dir . $new_file_name. "." . $imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $db_result['result'] = "nok";
        $error_string = "Bei der hochgeladenen Datei handelt es sich nicht um ein Bild.";

        if(isset($db_result['error_string'])){
            $db_result['error_string'] .= "<br>" .$error_string;
        }else{
            $db_result['error_string'] = $error_string;
        }

        $uploadOk = 0;
    }
}



// Check file size
if ($_FILES["image"]["size"] > 5000000) {
    $db_result['result'] = "nok";
    $error_string = "Die Datei überschreitet die maximale Dateigröße von 5 MB";

    if(isset($db_result['error_string'])){
        $db_result['error_string'] .= "<br>" .$error_string;
    }else{
        $db_result['error_string'] = $error_string;
    }
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $db_result['result'] = "nok";
    $error_string =  "Es können nur Dateien der Formate jpg/jpeg, png oder gif hochgeladen werden.";

    if(isset($db_result['error_string'])){
        $db_result['error_string'] .= "<br>" .$error_string;
    }else{
        $db_result['error_string'] = $error_string;
    }
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $new_file)) {


        if($language == "de"){
            $data['page_bio_gallery_image_href_de']         = $new_file_name.".".$imageFileType;
            $data['page_bio_gallery_image_alt_de']          = $_POST['page_bio_gallery_image_alt'];
            $data['page_bio_gallery_image_copy_de']          = $_POST['page_bio_gallery_image_copy'];
            
        }else{
            $data['page_bio_gallery_image_href_en']         = $new_file_name.".".$imageFileType;
            $data['page_bio_gallery_image_alt_en']          = $_POST['page_bio_gallery_image_alt'];
            $data['page_bio_gallery_image_copy_en']          = $_POST['page_bio_gallery_image_copy'];
        }
        
      
        $data['page_bio_gallery_edit_id']    = $_SESSION['admin_user_id'];
        $data['page_bio_gallery_edit_ts']    = time();

        $where = array();
        $wh['col'] = "page_bio_gallery_id";
        $wh['typ'] = "=";
        $wh['val'] = $_POST['page_bio_gallery_id'];
        array_push($where, $wh);

        $query		= "Blog-Bild hochladen";
        $db_result 	= db_update("page_bio_gallery", $data, $where);



    
    } else {

        $error_string = "Es ist ein Fehler beim verschieben des Bildes aufgetreten.";

        if(isset($db_result['error_string'])){
            $db_result['error_string'] .= "<br>" .$error_string;
        }else{
            $db_result['error_string'] = $error_string;
        }

    }
}


$page_bio_gallery_id = htmlspecialchars($_POST['page_bio_gallery_id']);
include("bio_gallery_edit_image.php");

?>
