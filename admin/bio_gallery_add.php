
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Galerie-Eintrag anlegen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Galerie</li>
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

<form action="index.php?page=bio_gallery_add_script" method="POST">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">neue Galerie anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">

                    <div class="row">
                        <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_id">Biografie</label>
                                <select required class="form-control" name="page_bio_id">
                                <option disabled selected value="0">+++ Seite auswählen +++</option>
                                  <?php
                                    $order = array();
                                    $order1['col'] = "page_bio_name_de";
                                    $order1['dir'] = "ASC";

                                    array_push($order, $order1);

                                    $db_array = db_select("page_bio", array(), $order);


                                    foreach($db_array as $line){
                                      $page_id      = $line['page_bio_id'];
                                      $page_title_de   = $line['page_bio_name_de'];

                                      echo "<option value='$page_id'>$page_title_de</option>\n";
                                    }

                                  ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_gallery_order">Position</label>
                                <input required type="number" name="page_bio_gallery_order"  class="form-control" placeholder="">
                              </div>
                            </div>

                        </div>

                        
                        
                        
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_gallery_text_de">Text Deutsch</label>
                                <textarea required name="page_bio_gallery_text_de" id="page_bio_gallery_text_de" class="form-control" placeholder=""></textarea>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_gallery_text_en">Text Englisch</label>
                                <textarea required name="page_bio_gallery_text_en" id="page_bio_gallery_text_en" class="form-control" placeholder=""></textarea>
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