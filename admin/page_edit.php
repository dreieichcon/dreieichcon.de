<?php

    $where = array();
    $wh['col'] = "page_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['page_id'];
    array_push($where, $wh);

    $db_array = db_select("page", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Seite <?php echo $data['page_title_de']; ?> bearbeiten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Seiten</li>
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

<form action="index.php?page=page_edit_script" method="POST">
<input type="hidden" name="page_id" value="<?php echo $data['page_id'];?>">
<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">neue Seite anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_title_de">Seitentitel Deutsch</label>
                                <input required type="text" name="page_title_de"  class="form-control" placeholder="" value="<?php echo $data['page_title_de']; ?>">
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_title_en">Seitentitel Englisch</label>
                                <input required type="text" name="page_title_en"  class="form-control" placeholder="" value="<?php echo $data['page_title_en']; ?>">
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_type_id">Seiten-Typ</label>
                                <select required class="form-control" name="page_type_id">
                                  <option disabled >+++bitte Seitentyp auswählen+++</option>
                                  <?php
                                    $order = array();
                                    $order1['col'] = "page_type";
                                    $order1['dir'] = "ASC";

                                    array_push($order, $order1);

                                    $db_array = db_select("page_type", array(), $order);


                                    foreach($db_array as $line){
                                      $page_type      = $line['page_type'];
                                      $page_type_id   = $line['page_type_id'];
                                    
                                      if($page_type_id == $data['page_type_id']){
                                        $selected = "selected";
                                      }else{
                                        $selected = "";
                                      }
                                      echo "<option $selected value='$page_type_id'>$page_type</option>\n";
                                    }

                                  ?>
                                  </select>
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