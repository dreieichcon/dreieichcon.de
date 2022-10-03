<?php

if(!isset($event_id)){
    if(isset($_GET['event_id'])){
        $event_id = $_GET['event_id'];
    }else{
        include("400.php");
        include("include/html_footer.php");
        die;
    }
}

    $where = array();
    $wh['col'] = "event_id";
    $wh['typ'] = "=";
    $wh['val'] = $event_id;
    array_push($where, $wh);

    $db_array = db_select("event", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Veranstaltung bearbeiten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Veranstaltung</li>
              <li class="breadcrumb-item"><?php echo $data['event_title_de'];?></li>
              <li class="breadcrumb-item active">Teilnehmer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<section class="content">

<?php include("include/html_result.php"); ?>

<form action="index.php?page=event_edit_script" method="POST">
	<input type="hidden" name="event_id" value="<?php echo $data['event_id'] ;?>">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Veranstaltungsdaten</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">

                    <div class="row">
                      <div class="col-6">
                            
                            <div class="form-group">
                                <label class="col-form-label" for="event_show">Sichtbar</label><br>
                                <?php
                                  $checked = "";
                                  if($data['event_show']== 1){
                                    $checked = "checked";
                                  }
                                ?>
                                <input <?php echo $checked;?> type="checkbox" name="event_show" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="unsichtbar" data-on-text="sichtbar" value="show">
                            </div>
                      </div>
                    </div>

                    <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="event_type_id">Veranstaltungsart</label>
                                    <select required class="form-control" name="event_type_id">
                                    <option disabled  value="0">+++ Art auswählen +++</option>
                                    <?php
                                        $order = array();
                                        $order1['col'] = "event_type_de";
                                        $order1['dir'] = "ASC";

                                        array_push($order, $order1);

                                        $db_array = db_select("event_type", array(), $order);


                                        foreach($db_array as $line){
                                        $id      = $line['event_type_id'];
                                        $label   = $line['event_type_de'];

										$selected ="";
										if($id == $data['event_type_id']){
											$selected = "selected";
										}

                                        echo "<option $selected value='$id'>$label</option>\n";
                                        }

                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="location_id">Veranstaltungsort</label>
                                    <select required class="form-control" name="location_id">
                                    <option disabled  value="0">+++ Ort auswählen +++</option>
                                    <?php
                                        $order = array();
                                        $order1['col'] = "location_name_de";
                                        $order1['dir'] = "ASC";

                                        array_push($order, $order1);

                                        $db_array = db_select("location", array(), $order);


                                        foreach($db_array as $line){
                                        $id      = $line['location_id'];
                                        $label   = $line['location_name_de'];

										$selected ="";
										if($id == $data['location_id']){
											$selected = "selected";
										}

                                        echo "<option $selected value='$id'>$label</option>\n";
                                        }

                                    ?>
                                    </select>
                                </div>
                            </div>

                                

                        </div>

                        <div class="row">
                            <div class="col-3">
                              <div class="form-group">
                                <label class="col-form-label" for="event_start_date">Beginn Datum</label>
                                <input required type="date" name="event_start_date"  class="form-control" placeholder="" value="<?php echo UnixToDateForm($data['event_start_ts']) ;?>" >
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group">
                                <label class="col-form-label" for="event_start_time">Beginn Uhrzeit</label>
                                <input required type="time" name="event_start_time"  class="form-control" placeholder="" value="<?php echo UnixToTimeForm($data['event_start_ts']) ;?>" >
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group">
                                <label class="col-form-label" for="event_end_date">Ende Datum</label>
                                <input required type="date" name="event_end_date"  class="form-control" placeholder="" value="<?php echo UnixToDateForm($data['event_end_ts']) ;?>" >
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group">
                                <label class="col-form-label" for="event_end_time">Ende Uhrzeit</label>
                                <input required type="time" name="event_end_time"  class="form-control" placeholder="" value="<?php echo UnixToTimeForm($data['event_end_ts']) ;?>" >
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_title_de">Titel Deutsch</label>
                                <input required type="text" name="event_title_de"  class="form-control" placeholder="" value="<?php echo $data['event_title_de'] ;?>" >
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_title_en">Titel Englisch</label>
                                <input required type="text" name="event_title_en"  class="form-control" placeholder="" value="<?php echo $data['event_title_en'] ;?>" >
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_description_short_de">Kurz-Beschreibung Deutsch</label>
                                <textarea required name="event_description_short_de" id="event_description_short_de" class="form-control" placeholder=""><?php echo $data['event_description_short_de'] ;?></textarea>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_description_short_en">Kurz-Beschreibung Englisch</label>
                                <textarea required name="event_description_short_en" id="event_description_short_en" class="form-control" placeholder=""><?php echo $data['event_description_short_en'] ;?></textarea>
                              </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_description_de">Text Deutsch</label>
                                <textarea required name="event_description_de" id="event_description_de" class="form-control" placeholder=""><?php echo $data['event_description_de'] ;?></textarea>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_description_en">Text Englisch</label>
                                <textarea required name="event_description_en" id="event_description_en" class="form-control" placeholder=""><?php echo $data['event_description_en'] ;?></textarea>
                              </div>
                            </div>
                        </div>


                    </div>

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Eintrag speichern</button>
                    </div>

                    
            </div>
        
    </div>
</div>


                    
            
</form>



<div class="row">
	<div class="col-8">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Gastgeber (Hosts)</h3>
				
				<div class="card-tools">
				
				</div>
			</div>

			<div class="card-body table-responsive " style="height: auto;">
                <table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Name </th>
								
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                               

                                $sql		= "SELECT * FROM page_bio b, event_host h WHERE h.event_id = :event AND h.page_bio_id = b.page_bio_id ORDER BY page_bio_name_de";
                                                        
                                $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

                                $statement	= $pdo->prepare($sql);

                                $statement->bindParam(':event', $event_id);

                                $statement->execute();

                                $db_array = array();

                                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                                    foreach ($row as $key => $value){
                                        $row[$key] = db_parse($value);
                                    }
                                    array_push($db_array, $row);
                                }
						
							

						
							foreach($db_array as $line){
								
								$event_host_id		    = $line['event_host_id'];
								$event_id			    = $line['event_id'];
								$page_bio_name_de		= $line['page_bio_name_de'];
								$page_bio_name_en		= $line['page_bio_name_en'];
								
								
								$modify_ts   		= UnixToTime($line['event_host_edit_ts']);
								$modify_id   		= db_get_user($line['event_host_edit_id'])['user_full'];

                               

                              
								echo "
									<tr>
										<th>$page_bio_name_de</th>
								
										
										
										<td>$modify_ts<br>$modify_id</td>
										<td>
                     					 <a href='index.php?page=event_host_unlink&event_id=$event_id&link_id=$event_host_id'><span class='fa fa-unlink'></span></a> &nbsp;&nbsp;
										  
                                        </td>
									</tr>
								
								";


							}
								
								
							
							?>
						
						</tbody>
				
				
				</table>
               


			</div>
            <div class="card-footer">
            
                    </a>
            </div>
		</div>
	</div>



	<div class="col-4">
		<div class="card">
			<form action="index.php?page=event_host_link" method="POST">
				<input type="hidden" name="event_id" value="<?php echo $data['event_id'] ;?>" >
				<div class="card-header">
					<h3 class="card-title">neuen verlinken</h3>
					
					<div class="card-tools">
					
					</div>
				</div>

				<div class="card-body" style="height: auto;">
					<div class="form-group">
						<select required class="form-control" name="page_bio_id">
							<option disabled selected value="0">+++ Biografie auswählen +++</option>
							<?php
								$order = array();
								$order1['col'] = "page_bio_name_de";
								$order1['dir'] = "ASC";

								array_push($order, $order1);

								$db_array = db_select("page_bio", array(), $order);


								foreach($db_array as $line){
									$id      = $line['page_bio_id'];
									$label   = $line['page_bio_name_de'];

									echo "<option value='$id'>$label</option>\n";
								}

							?>
						</select>
					</div>
				</div>
			
			
				<div class="card-footer">
				<button type="submit" class="btn btn-primary">Gastgeber verlinken</button>
				</div>
	

			</form>	
		</div>
	</div>
	
</div>


<!--

###################################################################################################################
###################################################################################################################
###################################################################################################################
###################################################################################################################
###################################################################################################################

                        -->


						<div class="row">
	<div class="col-8">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Gäste</h3>
				
				<div class="card-tools">
				
				</div>
			</div>

			<div class="card-body table-responsive " style="height: auto;">
                <table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Name </th>
								
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                               

                                $sql		= "SELECT * FROM page_bio b, event_participant h WHERE h.event_id = :event AND h.page_bio_id = b.page_bio_id ORDER BY page_bio_name_de";
                                                        
                                $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

                                $statement	= $pdo->prepare($sql);

                                $statement->bindParam(':event', $event_id);

                                $statement->execute();

                                $db_array = array();

                                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                                    foreach ($row as $key => $value){
                                        $row[$key] = db_parse($value);
                                    }
                                    array_push($db_array, $row);
                                }
						
							

						
							foreach($db_array as $line){
								
								$event_participant_id		    = $line['event_participant_id'];
								$event_id			    = $line['event_id'];
								$page_bio_name_de		= $line['page_bio_name_de'];
								$page_bio_name_en		= $line['page_bio_name_en'];
								
								
								$modify_ts   		= UnixToTime($line['event_participant_edit_ts']);
								$modify_id   		= db_get_user($line['event_participant_edit_id'])['user_full'];

                               

                              
								echo "
									<tr>
										<th>$page_bio_name_de</th>
								
										
										
										<td>$modify_ts<br>$modify_id</td>
										<td>
                     					 <a href='index.php?page=event_participant_unlink&event_id=$event_id&link_id=$event_participant_id'><span class='fa fa-unlink'></span></a> &nbsp;&nbsp;
										  
                                        </td>
									</tr>
								
								";


							}
								
								
							
							?>
						
						</tbody>
				
				
				</table>
               


			</div>
            <div class="card-footer">
            
                    </a>
            </div>
		</div>
	</div>



	<div class="col-4">
		<div class="card">
			<form action="index.php?page=event_participant_link" method="POST">
				<input type="hidden" name="event_id" value="<?php echo $data['event_id'] ;?>" >
				<div class="card-header">
					<h3 class="card-title">neuen verlinken</h3>
					
					<div class="card-tools">
					
					</div>
				</div>

				<div class="card-body" style="height: auto;">
					<div class="form-group">
						<select required class="form-control" name="page_bio_id">
							<option disabled selected value="0">+++ Biografie auswählen +++</option>
							<?php
								$order = array();
								$order1['col'] = "page_bio_name_de";
								$order1['dir'] = "ASC";

								array_push($order, $order1);

								$db_array = db_select("page_bio", array(), $order);


								foreach($db_array as $line){
									$id      = $line['page_bio_id'];
									$label   = $line['page_bio_name_de'];

									echo "<option value='$id'>$label</option>\n";
								}

							?>
						</select>
					</div>
				</div>
			
			
				<div class="card-footer">
				<button type="submit" class="btn btn-primary">Teilnehmer verlinken</button>
				</div>
	

			</form>	
		</div>
	</div>
	
</div>






<!--

###################################################################################################################
###################################################################################################################
###################################################################################################################
###################################################################################################################
###################################################################################################################

                        -->

<!--

###################################################################################################################
###################################################################################################################
###################################################################################################################
###################################################################################################################
###################################################################################################################

                        -->



<!-- DE -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Sprache: Deutsch</h3>
				
				<div class="card-tools">
				</div>
			</div>

			<div class="card-body table-responsive " style="height: auto;">
				<div class="row">
					<div class="col-4">
						<?php
                            $target_dir = "../upload/event/img/";
                            $no_icon = $target_dir."noimg.png";
							if($data['event_image_href_de']==""){
								$icon = $no_icon;
							}else{
                                
								$icon = $target_dir . $data['event_image_href_de'];
                                if(!is_file($icon)){
                                    $icon = $no_icon;
                                }
							}

              if($data['event_image_copy_de']!=""){
                $copy = "<br>&copy " . $data['event_image_copy_de'];
              }else{
                $copy = "";
              }
							?>
						<img src="<?php echo $icon; ?>" width="100%"><br>
                        <?php echo $data['event_image_alt_de'];
                        
                        echo $copy?>
					</div>
					
					<div class="col-8" >

						<form action="index.php?page=event_image_upload" method="POST" enctype="multipart/form-data" id="img_upload_form">
							<input type="hidden" name="event_id" value="<?php echo $data['event_id'];?>">
							<input type="hidden" name="image_language" value="de">
							<p>Nur Bilder im Format jpg, jpeg, gif und png sind erlaubt. Maximal 5MB pro Bild</p>
							<p class="text-danger">Achtung: Ist bereits ein Bild vorhanden, wird dieses automatisch überschrieben.</p>
							

                            <div class="form-group">
                                <label class="col-form-label" for="event_image_alt">Alternativ-Text</label>
                                <input required type="text" name="event_image_alt"  class="form-control" placeholder="">
                              </div>

                              <div class="form-group">
                                <label class="col-form-label" for="event_image_copy">Copyright</label>
                                <input  type="text" name="event_image_copy"  class="form-control" placeholder="">
                              </div>
                            

							<div class="form-group">
								<label for="exampleInputFile">Bild hochladen</label>
								<div class="input-group">
									<div class="custom-file">
										<input required type="file" class="custom-file-input" id="image" name="image">
										
										<label class="custom-file-label" for="image"><i class="fas fa-search"></i> &nbsp;Datei auswählen</label>
									</div>
									
									<div class="input-group-append">
										<!--<span class="input-group-text" onclick="$('#img_upload_form').submit()">Hochladen</span>-->
										<button type="submit" class="input-group-text"><span class='fas fa-upload'></span>&nbsp;hochladen</button>			
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
               


			</div>
            <div class="card-footer">
            <a href="index.php?page=event_image_delete&lang=de&event_id=<?php echo $data['event_id']; ?>" title="Bild löschen" class="btn btn-danger">
                    Bild löschen
                    <span class="fas fa-trash"> </span>
                    </a>
            </div>
		</div>
	</div>
</div>





<!-- EN -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Sprache: Deutsch</h3>
				
				<div class="card-tools">
				</div>
			</div>

			<div class="card-body table-responsive " style="height: auto;">
				<div class="row">
					<div class="col-4">
						<?php
                            $target_dir = "../upload/event/img/";
                            $no_icon = $target_dir."noimg.png";
							if($data['event_image_href_en']==""){
								$icon = $no_icon;
							}else{
                                
								$icon = $target_dir . $data['event_image_href_en'];
                                if(!is_file($icon)){
                                    $icon = $no_icon;
                                }
							}

              if($data['event_image_copy_en']!=""){
                $copy = "<br>&copy " . $data['event_image_copy_en'];
              }else{
                $copy = "";
              }
							?>
						<img src="<?php echo $icon; ?>" width="100%"><br>
                        <?php echo $data['event_image_alt_en'];
                        
                        echo $copy?>
					</div>
					
					<div class="col-8" >

						<form action="index.php?page=event_image_upload" method="POST" enctype="multipart/form-data" id="img_upload_form">
							<input type="hidden" name="event_id" value="<?php echo $data['event_id'];?>">
							<input type="hidden" name="image_language" value="en">
							<p>Nur Bilder im Format jpg, jpeg, gif und png sind erlaubt. Maximal 5MB pro Bild</p>
							<p class="text-danger">Achtung: Ist bereits ein Bild vorhanden, wird dieses automatisch überschrieben.</p>
							

                            <div class="form-group">
                                <label class="col-form-label" for="event_image_alt">Alternativ-Text</label>
                                <input required type="text" name="event_image_alt"  class="form-control" placeholder="">
                              </div>

                              <div class="form-group">
                                <label class="col-form-label" for="event_image_copy">Copyright</label>
                                <input  type="text" name="event_image_copy"  class="form-control" placeholder="">
                              </div>
                            

							<div class="form-group">
								<label for="exampleInputFile">Bild hochladen</label>
								<div class="input-group">
									<div class="custom-file">
										<input required type="file" class="custom-file-input" id="image" name="image">
										
										<label class="custom-file-label" for="image"><i class="fas fa-search"></i> &nbsp;Datei auswählen</label>
									</div>
									
									<div class="input-group-append">
										<!--<span class="input-group-text" onclick="$('#img_upload_form').submit()">Hochladen</span>-->
										<button type="submit" class="input-group-text"><span class='fas fa-upload'></span>&nbsp;hochladen</button>			
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
               


			</div>
            <div class="card-footer">
            <a href="index.php?page=event_image_delete&lang=en&event_id=<?php echo $data['event_id']; ?>" title="Bild löschen" class="btn btn-danger">
                    Bild löschen
                    <span class="fas fa-trash"> </span>
                    </a>
            </div>
		</div>
	</div>
</div>
