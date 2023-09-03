
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Biografien</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              
              <li class="breadcrumb-item active">Bios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">


<!-- <div class="row">
  <div class="col-12">
    <div class="card bg-danger">
      <div class="card-header">
        <h3 class="card-title">Hinweis</h3>
        <div class="card-tools"></div>
      </div>
      <div class="card-body" style="height: auto;">
      Die Einträge auf dieser Seite stellen die Kern-Konfiguration des Front-Ends dar. Es ist nicht empfohlen, Einträge zu löschen oder Keys zu ändern, sofern nicht auch der Quellcode angepasst wird. Das Ändern der Values stellt kein Problem dar.
      </div>
    </div>
  </div>
</div> -->


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Biograifen verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=bio_add" title="neue Biografie anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Name </th>
								<th>Seite</th>
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                               

                                $sql		= "SELECT * FROM page_bio ORDER BY page_bio_name_de";
                                                        
                                $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

                                $statement	= $pdo->prepare($sql);

                                //$statement->bindParam(':name', $value);

                                $statement->execute();

                                $db_array = array();

                                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                                    foreach ($row as $key => $value){
                                        $row[$key] = db_parse($value);
                                    }
                                    array_push($db_array, $row);
                                }
						
							

						
							foreach($db_array as $line){
								
								$page_bio_id		    = $line['page_bio_id'];
								$page_bio_name_de		= $line['page_bio_name_de'];
								$page_bio_name_en		= $line['page_bio_name_en'];

                                $visible                = $line['page_bio_visible'];


								
								$modify_ts   		= UnixToTime($line['page_bio_edit_ts']);
								$modify_id   		= db_get_user($line['page_bio_edit_id'])['user_full'];

                                $page               = db_get_page($line['page_id'])['page_title_de'];

                                if($visible != 1){
                                    $active = "class='deactivated'";
                                }

                              
								echo "
									<tr $active>
										<th>$page_bio_name_de<br>$page_bio_name_en</th>
										<td>$page</td>
										
										
										<td>$modify_ts<br>$modify_id</td>
										<td>
                      <a href='index.php?page=bio_edit&bio_id=$page_bio_id'><span class='fa fa-edit'></span></a> &nbsp;&nbsp;
										  <a href='index.php?page=bio_profile&page_bio_id=$page_bio_id' titel='Profilbild'><span class='fa fa-id-badge'></span></a> &nbsp;&nbsp;
										  <a href='index.php?page=bio_gallery&page_bio_id=$page_bio_id'><span class='fa fa-image'></span></a> &nbsp;&nbsp;
                      <a href='index.php?page=bio_delete&bio_id=$page_bio_id' class='text-danger'><span class='fa fa-trash'></span></a>
                                        
                                        </td>
									</tr>
								
								";


							}
								
								
							
							?>
						
						</tbody>
				
				
				</table>
	  
	  
			</div>
		</div>
	</div>
</div>

