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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Biografie von <?php echo $data['page_bio_name_de'];?> bearbeiten</h1>
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

<form action="index.php?page=bio_edit_script" method="POST">
<input type="hidden" name="page_bio_id" value="<?php echo $data['page_bio_id']; ?>">
<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $data['page_bio_name_de'];?> bearbeiten</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">

                    <div class="row">
                        <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_id">Seite</label>
                                <select required class="form-control" name="page_id">
                                <option disabled selected value="0">+++ Seite auswählen +++</option>
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
                            <div class='form-group'>
                                <label class='col-form-label' for='con_convention_rpg_publish'>Sichtbar</label><br>
                                <?php
                                $checked = "";
                                if($data['page_bio_visible']== 1){
                                    $checked = "checked";
                                }
                                ?>
                                <input <?php echo $checked;?>
                                        type='checkbox'
                                        name='page_bio_visible'
                                        data-bootstrap-switch data-off-color='danger'
                                        data-on-color='success'
                                        data-off-text='unsichtbar'
                                        data-on-text='sichtbar'
                                        value='show'
                                >
                            </div>
                        </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_title_de">Name Deutsch</label>
                                <input required type="text" name="page_title_de"  class="form-control" placeholder="" value="<?php echo $data['page_bio_name_de'] ;?>" >
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_title_en">Name Englisch</label>
                                <input required type="text" name="page_title_en"  class="form-control" placeholder="" value="<?php echo $data['page_bio_name_en'] ;?>" >
                              </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_short_bio_de">Kurzbiografie Deutsch</label>
                                <textarea required name="page_bio_short_bio_de" id="page_bio_short_bio_de" class="form-control" placeholder=""><?php echo $data['page_bio_short_bio_de'];?></textarea>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_short_bio_en">Kurzbiografie Englisch</label>
                                <textarea required name="page_bio_short_bio_en" id="page_bio_short_bio_en" class="form-control" placeholder=""><?php echo $data['page_bio_short_bio_en'];?></textarea>
                              </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_content_de">Biografie Deutsch</label>
                                <textarea required name="page_bio_content_de" id="page_bio_content_de" class="form-control" placeholder="" rows="25"><?php echo $data['page_bio_content_de'];?></textarea>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label class="col-form-label" for="page_bio_content_en">Biografie Englisch</label>
                                <textarea required name="page_bio_content_en" id="page_bio_content_en" class="form-control" placeholder="" rows="25"><?php echo $data['page_bio_content_en'];?></textarea>
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