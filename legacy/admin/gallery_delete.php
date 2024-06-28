<?php

    $where = array();
    $wh['col'] = "page_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['gallery_id'];
    array_push($where, $wh);

    $db_array = db_select("page_gallery", $where);
;

if(count($db_array)>0){
    $data = $db_array[0];
}else{
    include("999.php");
    include("include/html_footer.php");
    die;
}

?>




    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Galerie-Eintrag löschen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Galerie</li>
              <li class="breadcrumb-item active">löschen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">

<!-- Main content -->
<section class="content">

<?php
$key = $data['page_gallery_text_de'];

$id  = $data['page_gallery_id'];

?>

	
	<div class="row">
        <div class="col-12">
            <div class="card bg-warning">
            	<div class="card-header  bg-black">
					<h3 class="card-title ">ACHTUNG</h3>
				</div>
				<div class="card-body">
					
						
						<p>Diese Aktion kann nicht rückgängig gemacht werden. Fortfahren?</p>
						
                        <div class="row">
                            <div class="col-6">
                                <u>Seite</u><br><?php echo $key;?>
                            </div>

                            
                        </div>

					
				</div>
                <div class="card-footer">
                
                    <a href="index.php?page=page" title="Abbrechen" class="btn btn-success">
                        <span class="fas fa-arrow-circle-left"> </span>
                        &nbsp; nein, zurück zur Übersicht!
                    </a>
					
                    &nbsp;&nbsp;&nbsp;&nbsp;

					<a href="index.php?page=gallery_delete_do&gallery_id=<?php echo $id; ?>" title="Blog-Eintrag löschen" class="btn btn-danger">
                    ja, Galerie-Eintrag löschen
                    <span class="fas fa-arrow-circle-right"> </span>
                    </a>
                </div>
			</div>
		</div>
	</div>