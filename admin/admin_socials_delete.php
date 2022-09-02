
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
    $wh['col'] = "social_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['id'];
    array_push($where, $wh);

    $db_array = db_select("social", $where);

if(count($db_array)>0){
    $data = $db_array[0];
}else{
    include("999.php");
    include("include/html_footer.php");
    die;
}

$key = $data['social_platform'];
$val = $data['social_href'];
$id  = $_GET['id'];

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
                                <u>Platform</u><br><?php echo $key;?>
                            </div>

                            <div class="col-6">
                                <u>HREF</u><br><?php echo $val;?>
                            </div>
                        </div>

					
				</div>
                <div class="card-footer">
                
                    <a href="index.php?page=admin_socials" title="Abbrechen" class="btn btn-success">
                        <span class="fas fa-arrow-circle-left"> </span>
                        &nbsp; nein, zurück zur Übersicht!
                    </a>
					
                    &nbsp;&nbsp;&nbsp;&nbsp;

					<a href="index.php?page=admin_socials_delete_do&id=<?php echo $id; ?>" title="Link löschen" class="btn btn-danger">
                    ja, Link löschen
                    <span class="fas fa-arrow-circle-right"> </span>
                    </a>
                </div>
			</div>
		</div>
	</div>