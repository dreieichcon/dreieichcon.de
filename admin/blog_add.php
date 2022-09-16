
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Blog-Eintrag anlegen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Blog</li>
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

<form action="index.php?page=blog_add_script" method="POST">

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">neuen Blogeintrag anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">

                    <div class="row">
                        <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_content_type_id">Seiten-Typ</label>
                                <select required class="form-control" name="page_blog_content_type_id">
                                <option disabled selected value="0">+++ Seiten-Typ auswählen +++</option>
                                  <?php
                                    $order = array();
                                    $order1['col'] = "page_blog_content_type_label";
                                    $order1['dir'] = "ASC";

                                    array_push($order, $order1);

                                    $db_array = db_select("page_blog_content_type", array(), $order);


                                    foreach($db_array as $line){
                                      $page_id        = $line['page_blog_content_type_id'];
                                      $page_title_de   = $line['page_blog_content_type_label'];

                                      echo "<option value='$page_id'>$page_title_de</option>\n";
                                    }

                                  ?>
                                  </select>
                              </div>
                            </div>
                      </div>
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

                                      echo "<option value='$page_id'>$page_title_de</option>\n";
                                    }

                                  ?>
                                  </select>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_order">Position</label>
                                <input required type="number" name="page_blog_order"  class="form-control" placeholder="">
                              </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_headline_de">Überschrift Deutsch</label>
                                <input required type="text" name="page_blog_headline_de"  class="form-control" placeholder="">
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_headline_en">Überschrift Englisch</label>
                                <input required type="text" name="page_blog_headline_en"  class="form-control" placeholder="">
                              </div>
                            </div>
                        </div>

                        



                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_subheadline_de">Subheadline Deutsch</label>
                                <textarea required name="page_blog_subheadline_de" id="page_blog_subheadline_de" class="form-control" placeholder=""></textarea>
                              </div>
                            </div>

                            <div class="col-6">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_subheadline_en">Subheadline Englisch</label>
                                <textarea required name="page_blog_subheadline_en" id="page_blog_subheadline_en" class="form-control" placeholder=""></textarea>
                              </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_content_de">Inhalt Deutsch</label>
                                <textarea required name="page_blog_content_de" id="page_blog_content_de" class="form-control" placeholder="" rows="25"></textarea>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label class="col-form-label" for="page_blog_content_en">Inhalt Englisch</label>
                                <textarea required name="page_blog_content_en" id="page_blog_content_en" class="form-control" placeholder="" rows="25"></textarea>
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