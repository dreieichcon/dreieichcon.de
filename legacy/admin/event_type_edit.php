<?php

    $where = array();
    $wh['col'] = "event_type_id";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['event_type_id'];
    array_push($where, $wh);

    $db_array = db_select("event_type", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Programm | Arten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              
              <li class="breadcrumb-item ">Programm</li>
              <li class="breadcrumb-item active">Arten</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>




<!-- Main content -->
<section class="content">

<form action="index.php?page=event_type_edit_script" method="POST">
<input type="hidden" name="event_type_id" value="<?php echo $data['event_type_id'] ;?>" >
<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">neue Veranstaltungsart anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_type_de">Bezeichung Deutsch</label>
                                <input required type="text" name="event_type_de"  class="form-control" placeholder="" value="<?php echo $data['event_type_de'] ;?>" >
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="event_type_en">Bezeichnung Englisch</label>
                                <input required type="text" name="event_type_en"  class="form-control" placeholder="" value="<?php echo $data['event_type_en'] ;?>" >
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