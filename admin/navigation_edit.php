<?php

    $where = array();
    $wh['col'] = "navigation_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['navigation_id'];
    array_push($where, $wh);

    $db_array = db_select("navigation", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Menüpunkt <?php echo $data['navigation_title_de'];?> bearbeiten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Menüpunkt</li>
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

<form action="index.php?page=navigation_edit_script" method="POST">
    <input type="hidden" name="navigation_id" value="<?php echo $data['navigation_id']; ?>">

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
                                <label class="col-form-label" for="navigation_title_de">Bezeichung Deutsch</label>
                                <input required type="text" name="navigation_title_de"  class="form-control" placeholder="" value="<?php echo $data['navigation_title_de'] ;?>" >
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="navigation_title_en">Bezeichnung Englisch</label>
                                <input required type="text" name="navigation_title_en"  class="form-control" placeholder="" value="<?php echo $data['navigation_title_en'] ;?>" >
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_id">Verweise auf Seite</label>
                                <select class="form-control" name="page_id">
                                  <option value="0">keine Seite</option>
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
                                        if($data['page_id'] == $page_id){
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
                                <label class="col-form-label" for="navigation_href">Externer Link</label>
                                <input type="text" name="navigation_href"  class="form-control" placeholder="" value="<?php echo $data['navigation_href'] ;?>" >
                              </div>
                            </div>

                           
                        </div>


                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="navigation_parent">Übergeordnetes Element</label>
                                <select class="form-control" name="navigation_parent">
                                <option value="0">kein Übergeordnetes Element</option>
                                  <?php
                                    $order = array();
                                    $order1['col'] = "navigation_order";
                                    $order1['dir'] = "ASC";

                                    array_push($order, $order1);

                                    $db_array = db_select("navigation", array(), $order);


                                    foreach($db_array as $line){
                                      $navigation_id      = $line['navigation_id'];
                                      $navigation_title_de   = $line['navigation_title_de'];

                                      $selected = "";
                                      if($data['navigation_parent'] == $navigation_id){
                                          $selected = "selected";
                                      }

                                      echo "<option $selected value='$navigation_id'>$navigation_title_de</option>\n";
                                    }

                                  ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-6">
                                <u>Hinweise:</u><br>
                                Interne Links werden über externe Bevorzugt.<br>
                                Wird kein Übergeordnetes Element gewählt, erscheint der Menüpunkt in der obersten Ebene
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="navigation_order">Reihenfolge</label>
                                <input required type="text" name="navigation_order"  class="form-control" placeholder="" value="<?php echo $data['navigation_order'] ;?>" >
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