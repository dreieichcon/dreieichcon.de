
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Programm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              
              <li class="breadcrumb-item active">Programm</li>
              
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
				<h3 class="card-title">Veranstaltungen verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=event_add" title="neue Veranstaltung anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Jahr </th>
								<th>Titel </th>
								<th>Ort </th>
								<th>Zeiten </th>
								
								
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                               

                                $sql		= "SELECT * FROM event e, event_type t, location l WHERE l.location_id = e.location_id AND t.event_type_id = e.event_type_id ORDER BY event_year DESC, event_start_ts ASC, location_name_de ASC, event_type_de ASC";
                                                        
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

                               
								
								$event_id		                = $line['event_id'];
								$event_title_de	                = $line['event_title_de'];
								$event_start                    = UnixToEventTime($line['event_start_ts']);
								$event_end                      = UnixToEventTime($line['event_end_ts']);
								$event_description_de           = $line['event_description_de'];
								$event_type_de                  = $line['event_type_de'];
								$location_name_de               = $line['location_name_de'];
								$event_show               = $line['event_show'];
								$event_year               = $line['event_year'];

							
							
								
								
								$modify_ts   		       = UnixToTime($line['event_edit_ts']);
								$modify_id   		       = db_get_user($line['event_edit_id'])['user_full'];


                $active = "";
                if($event_show != 1){
                  $active = "class='deactivated'";
                }

								echo "
									<tr $active>
                  <th>$event_year</th>
                                        <th>$event_title_de<br>($event_type_de)</th>
                                        <td>$location_name_de</td>
                                        <td>$event_start<br>$event_end</td>
                                        
										
										
										
										<td>$modify_ts<br>$modify_id</td>
										<td>
                                            <a href='index.php?page=event_edit&event_id=$event_id'><span class='fa fa-edit'></span></a> 
                                            &nbsp;&nbsp; 
                                            <a href='index.php?page=event_delete&event_id=$event_id' class='text-danger'><span class='fa fa-trash'></span></a>
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


