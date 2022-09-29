
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Veranstaltung anlegen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Veranstaltung</li>
              <li class="breadcrumb-item active">anlegen</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">

<form action="index.php?page=event_add_script" method="POST">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">neue Veranstaltung anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">

                    <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="event_type_id">Vernstaltungsart</label>
                                    <select required class="form-control" name="event_type_id">
                                    <option disabled selected value="0">+++ Art auswählen +++</option>
                                    <?php
                                        $order = array();
                                        $order1['col'] = "event_type_de";
                                        $order1['dir'] = "ASC";

                                        array_push($order, $order1);

                                        $db_array = db_select("event_type", array(), $order);


                                        foreach($db_array as $line){
                                        $id      = $line['event_type_id'];
                                        $label   = $line['event_type_de'];

                                        echo "<option value='$id'>$label</option>\n";
                                        }

                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="location_id">Veranstaltungsort</label>
                                    <select required class="form-control" name="location_id">
                                    <option disabled selected value="0">+++ Ort auswählen +++</option>
                                    <?php
                                        $order = array();
                                        $order1['col'] = "location_name_de";
                                        $order1['dir'] = "ASC";

                                        array_push($order, $order1);

                                        $db_array = db_select("location", array(), $order);


                                        foreach($db_array as $line){
                                        $id      = $line['location_id'];
                                        $label   = $line['location_name_de'];

                                        echo "<option value='$id'>$label</option>\n";
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
                                <input required type="date" name="event_start_date"  class="form-control" placeholder="">
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group">
                                <label class="col-form-label" for="event_start_time">Beginn Uhrzeit</label>
                                <input required type="time" name="event_start_time"  class="form-control" placeholder="">
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group">
                                <label class="col-form-label" for="event_end_date">Ende Datum</label>
                                <input required type="date" name="event_end_date"  class="form-control" placeholder="">
                              </div>
                            </div>

                            <div class="col-3">
                              <div class="form-group">
                                <label class="col-form-label" for="event_end_time">Ende Uhrzeit</label>
                                <input required type="time" name="event_end_time"  class="form-control" placeholder="">
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_title_de">Titel Deutsch</label>
                                <input required type="text" name="event_title_de"  class="form-control" placeholder="">
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_title_en">Titel Englisch</label>
                                <input required type="text" name="event_title_en"  class="form-control" placeholder="">
                              </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_description_de">Text Deutsch</label>
                                <textarea required name="event_description_de" id="event_description_de" class="form-control" placeholder=""></textarea>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_description_en">Text Englisch</label>
                                <textarea required name="event_description_en" id="event_description_en" class="form-control" placeholder=""></textarea>
                              </div>
                            </div>
                        </div>


                        <div class="row">
                        <div class="col-12">
                              <u>Hinweis:</u><br>
                              Im nächsten Schritt können Bilder sowie Teilnehmer (Host und Guests) hinterlegt werden
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