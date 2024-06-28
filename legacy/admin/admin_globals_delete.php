
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Benutzerverwaltung</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Administration</li>
              <li class="breadcrumb-item active">Globals</li>
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

    $where = array();
    $wh['col'] = "global_key";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['key'];
    array_push($where, $wh);

    $db_array = db_select("global", $where);

if(count($db_array)>0){
    $data = $db_array[0];
}else{
    include("999.php");
    include("include/html_footer.php");
    die;
}

$key = $data['global_key'];
$val = $data['global_value'];

?>

	
	<div class="row">
        <div class="col-12">
            <div class="card bg-warning">
            	<div class="card-header  bg-black">
					<h3 class="card-title ">ACHTUNG</h3>
				</div>
				<div class="card-body">
					
						
						<p>Wird dieses Key-Value-Paar (KVP) gelöscht, kann es sein, dass die Webseite nicht mehr ordnungsgemäß funktioniert. Sind Sie sich sicher, dass Sie das KVP löschen wollen?</p>
						
                        <div class="row">
                            <div class="col-6">
                                <u>Key</u><br><?php echo $key;?>
                            </div>

                            <div class="col-6">
                                <u>Value</u><br><?php echo $val;?>
                            </div>
                        </div>

					
				</div>
                <div class="card-footer">
                
                    <a href="index.php?page=admin_globals" title="Abbrechen" class="btn btn-success">
                        <span class="fas fa-arrow-circle-left"> </span>
                        &nbsp; nein, zurück zur Übersicht!
                    </a>
					
                    &nbsp;&nbsp;&nbsp;&nbsp;

					<a href="index.php?page=admin_globals_delete_do&key=<?php echo $key; ?>" title="KVP löschen" class="btn btn-danger">
                    ja, KVP löschen
                    <span class="fas fa-arrow-circle-right"> </span>
                    </a>
                </div>
			</div>
		</div>
	</div>