
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
              <li class="breadcrumb-item active">Socials</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">

<form action="index.php?page=admin_socials_add_script" method="POST">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">neuen Social-Link anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="platform">Platform</label>
                                    <input required type="text" name="platform"  class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label class="col-form-label" for="href">HREF</label>
                                    <input required type="url" name="href"  class="form-control" placeholder="">
                                </div>	
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="icon">icon</label>
                                    <input required type="text" name="icon"  class="form-control" placeholder="">
                                </div>
                            </div>

                            <div class="col-6">

                                <div class="form-group">
                                    <label class="col-form-label" for="order">Reihenfolge</label>
                                    <input required type="number" name="order"  class="form-control" placeholder="">
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