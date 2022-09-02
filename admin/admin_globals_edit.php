<?php

    $where = array();
    $wh['col'] = "global_key";
    $wh['typ'] = "=";
    $wh['val'] = $_GET['key'];
    array_push($where, $wh);

    $db_array = db_select("global", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Benutzerverwaltung</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Administration</li>
              <li class="breadcrumb-item active">Globals</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">

<form action="index.php?page=admin_globals_edit_script" method="POST">
<input type="hidden" name="old_key"  value="<?php echo $data['global_key'];?>">
<input type="hidden" name="id" value="<?php echo $data['global_id']; ?>">
<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">globales Key-Value-Paar bearbeiten</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="key">Key</label>
                                    <input required type="text" name="key"  class="form-control" placeholder="" value="<?php echo $data['global_key'];?>">
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label class="col-form-label" for="value">Value</label>
                                    <input required type="text" name="value"  class="form-control" placeholder="" value="<?php echo $data['global_value'];?>">
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