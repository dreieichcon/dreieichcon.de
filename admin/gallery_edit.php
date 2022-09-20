<?php

    $where = array();
    $wh['col'] = "page_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['gallery_id'];
    array_push($where, $wh);

    $db_array = db_select("page_gallery", $where);
;

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Galerie-Eintrag bearbeiten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Galerie</li>
              <li class="breadcrumb-item active">bearbeiten</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">

<form action="index.php?page=gallery_edit_script" method="POST">
<input type="hidden" name="page_gallery_id" value="<?php echo $data['page_gallery_id'] ;?>" >
<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Galerie bearbeiten</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">

                    <div class="row">
                        <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_id">Seite</label>
                                <select required class="form-control" name="page_id">
                                <option disabled value="0">+++ Seite auswählen +++</option>
                                  <?php
                                    $order = array();
                                    $order1['col'] = "page_title_de";
                                    $order1['dir'] = "ASC";

                                    array_push($order, $order1);

                                    $db_array = db_select("page", array(), $order);


                                    foreach($db_array as $line){
                                      $page_id      = $line['page_id'];
                                      $page_title_de   = $line['page_title_de'];

                                      $selected = "";
                                      if($page_id == $data['page_id']){
                                        $selected = "selected";
                                      }

                                      echo "<option $selected value='$page_id'>$page_title_de</option>\n";
                                    }

                                  ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_gallery_order">Position</label>
                                <input required type="number" name="page_gallery_order"  class="form-control" placeholder="" value="<?php echo $data['page_gallery_order'] ;?>" >
                              </div>
                            </div>

                        </div>

                        <div class="row">
                        <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_id_link">Zielseite</label>
                                <select class="form-control" name="page_id_link">
                                <option value="0">+++ Seite auswählen +++</option>
                                  <?php
                                    $order = array();
                                    $order1['col'] = "page_title_de";
                                    $order1['dir'] = "ASC";

                                    array_push($order, $order1);

                                    $db_array = db_select("page", array(), $order);


                                    foreach($db_array as $line){
                                      $page_id      = $line['page_id'];
                                      $page_title_de   = $line['page_title_de'];

                                      
                                      $selected = "";
                                      if($page_id == $data['page_id_link']){
                                        $selected = "selected";
                                      }

                                      echo "<option $selected value='$page_id'>$page_title_de</option>\n";
                                    }

                                  ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_gallery_href">Externer Link</label>
                                <input type="text" name="page_gallery_href"  class="form-control" placeholder="" value="<?php echo $data['page_gallery_href'];?>">
                              </div>
                            </div>
                            
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_gallery_text_de">Text Deutsch</label>
                                <textarea required name="page_gallery_text_de" id="page_gallery_text_de" class="form-control" placeholder=""><?php echo $data['page_gallery_text_de']; ?></textarea>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_gallery_text_en">Text Englisch</label>
                                <textarea required name="page_gallery_text_en" id="page_gallery_text_en" class="form-control" placeholder=""><?php echo $data['page_gallery_text_en']; ?></textarea>
                              </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-6">
                              <u>Hinweis:</u><br>
                              Die Bilder werden erst im nächsten Schritt hochgeladen
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