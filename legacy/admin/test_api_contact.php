
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Kontaktformular</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Frontend</li>
              <li class="breadcrumb-item active">Contact</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">

<form action="../api/contact.php" method="POST">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">neuen Global anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Name</label>
                                    <input required type="text" name="name"  class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="mail">E-Mail</label>
                                    <input required type="email" name="mail"  class="form-control" placeholder="">
                                </div>
                            </div>
</div>
<div class="row">

                            <div class="col-6">

                                <div class="form-group">
                                    <label class="col-form-label" for="message">Nachricht</label>
                                    <textarea required name="message" id="message" class="form-control" placeholder="" rows="25"></textarea>
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