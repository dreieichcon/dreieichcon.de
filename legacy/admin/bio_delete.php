<?php

    $where = array();
    $wh['col'] = "page_bio_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['bio_id'];
    array_push($where, $wh);

    $db_array = db_select("page_bio", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Biografie von <?php echo $data['page_bio_name_de'];?> löschen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Biografien</li>
              <li class="breadcrumb-item active"><?php echo $data['page_bio_name_de'];?></li>
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
$key = $data['page_bio_name_de'];

$id  = $data['page_bio_id'];

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

					<a href="index.php?page=bio_delete_do&bio_id=<?php echo $id; ?>" title="Biografie löschen" class="btn btn-danger">
                    ja, Biografie löschen
                    <span class="fas fa-arrow-circle-right"> </span>
                    </a>
                </div>
			</div>
		</div>
	</div>