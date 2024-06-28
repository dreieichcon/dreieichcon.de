<?php

    $where = array();
    $wh['col'] = "location_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['location_id'];
    array_push($where, $wh);

    $db_array = db_select("location", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Veranstaltungsort <?php echo $data['location_name_de']; ?> löschen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Veranstaltungsorte</li>
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

<?php
$key = $data['location_name_de'];

$id  = $data['location_id'];

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
                                <u>Veranstaltungsort</u><br><?php echo $key;?>
                            </div>

                            
                        </div>

					
				</div>
                <div class="card-footer">
                
                    <a href="index.php?page=location" title="Abbrechen" class="btn btn-success">
                        <span class="fas fa-arrow-circle-left"> </span>
                        &nbsp; nein, zurück zur Übersicht!
                    </a>
					
                    &nbsp;&nbsp;&nbsp;&nbsp;

					<a href="index.php?page=location_delete_do&location_id=<?php echo $id; ?>" title="Menüpunkt löschen" class="btn btn-danger">
                    ja, Veranstaltungsort löschen
                    <span class="fas fa-arrow-circle-right"> </span>
                    </a>
                </div>
			</div>
		</div>
	</div>