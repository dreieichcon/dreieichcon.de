
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Programm | Orte</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              
              <li class="breadcrumb-item ">Programm</li>
              <li class="breadcrumb-item active">Veranstaltungsorte</li>
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
				<h3 class="card-title">Veranstaltungsorte verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=location_add" title="neuen Ort anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Name </th>
								<th>Gruppe </th>
								
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                               

                                $sql		= "SELECT * FROM location ORDER BY location_group_de ASC, location_name_de ASC";
                                                        
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

                               
								
								$location_id		       = $line['location_id'];
								$location_name_de	       = $line['location_name_de'];
								$location_name_en          = $line['location_name_en'];
								$location_group_de		   = $line['location_group_de'];
								$location_group_en		   = $line['location_group_en'];
							
							
								
								
								$modify_ts   		       = UnixToTime($line['location_edit_ts']);
								$modify_id   		       = db_get_user($line['location_edit_id'])['user_full'];

                              
								echo "
									<tr>
                                        <td>$location_name_de<br>$location_name_en</td>
                                        <td>$location_group_de<br>$location_group_en</td>
										
										
										
										<td>$modify_ts<br>$modify_id</td>
										<td>
                                            <a href='index.php?page=location_edit&location_id=$location_id'><span class='fa fa-edit'></span></a> 
                                            &nbsp;&nbsp; 
                                            <a href='index.php?page=location_delete&location_id=$location_id' class='text-danger'><span class='fa fa-trash'></span></a>
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


