<?php

if(!isset($page_blog_id)){
    if(isset($_GET['blog_id'])){
        $page_blog_id = $_GET['blog_id'];
    }else{
        include("400.php");
        include("include/html_footer.php");
        die;
    }
}

    $where = array();
    $wh['col'] = "page_blog_id";
    $wh['typ'] = "=";
    $wh['val'] = $page_blog_id;
    array_push($where, $wh);

    $db_array = db_select("page_blog", $where);

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
            <h1 class="m-0"><?php echo($global_application_name_header);?> Bild bearbeiten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Blog</li>
              <li class="breadcrumb-item"><?php echo $data['page_blog_headline_de'];?></li>
              <li class="breadcrumb-item active">Bilder</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
<section class="content">

<?php include("include/html_result.php"); ?>



<!-- DE -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Sprache: Deutsch</h3>
				
				<div class="card-tools">
				</div>
			</div>

			<div class="card-body table-responsive " style="height: auto;">
				<div class="row">
					<div class="col-4">
						<?php
                            $target_dir = "../upload/blog/img/";
                            $no_icon = $target_dir."noimg.png";
							if($data['page_blog_image_href_de']==""){
								$icon = $no_icon;
							}else{
                                
								$icon = $target_dir . $data['page_blog_image_href_de'];
                                if(!is_file($icon)){
                                    $icon = $no_icon;
                                }
							}

							if($data['page_blog_image_copy_de']!=""){
								$copy = "<br>&copy " . $data['page_blog_image_copy_de'];
							  }else{
								$copy = "";
							  }
							?>
						<img src="<?php echo $icon; ?>" width="100%"><br>
                        <?php echo $data['page_blog_image_alt_de']; echo $copy;?>
					</div>
					
					<div class="col-8" >

						<form action="index.php?page=blog_image_upload" method="POST" enctype="multipart/form-data" id="img_upload_form">
							<input type="hidden" name="page_blog_id" value="<?php echo $data['page_blog_id'];?>">
							<input type="hidden" name="image_language" value="de">
							<p>Nur Bilder im Format jpg, jpeg, gif und png sind erlaubt. Maximal 5MB pro Bild</p>
							<p class="text-danger">Achtung: Ist bereits ein Bild vorhanden, wird dieses automatisch überschrieben.</p>
							

                            <div class="form-group">
                                <label class="col-form-label" for="page_blog_image_alt">Alternativ-Text</label>
                                <input required type="text" name="page_blog_image_alt"  class="form-control" placeholder="">
                              </div>
                            
							  <div class="form-group">
                                <label class="col-form-label" for="page_blog_image_copy">Copyright</label>
                                <input  type="text" name="page_blog_image_copy"  class="form-control" placeholder="">
                              </div>

							<div class="form-group">
								<label for="exampleInputFile">Bild hochladen</label>
								<div class="input-group">
									<div class="custom-file">
										<input required type="file" class="custom-file-input" id="image" name="image">
										
										<label class="custom-file-label" for="image"><i class="fas fa-search"></i> &nbsp;Datei auswählen</label>
									</div>
									
									<div class="input-group-append">
										<!--<span class="input-group-text" onclick="$('#img_upload_form').submit()">Hochladen</span>-->
										<button type="submit" class="input-group-text"><span class='fas fa-upload'></span>&nbsp;hochladen</button>			
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
               


			</div>
            <div class="card-footer">
            <a href="index.php?page=blog_image_delete&lang=de&page_blog_id=<?php echo $data['page_blog_id']; ?>" title="Bild löschen" class="btn btn-danger">
                    Bild löschen
                    <span class="fas fa-trash"> </span>
                    </a>
            </div>
		</div>
	</div>
</div>





<!-- EN -->
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Sprache: Englisch</h3>
				
				<div class="card-tools">
				</div>
			</div>

			<div class="card-body table-responsive " style="height: auto;">
				<div class="row">
					<div class="col-4">
						<?php
                            $target_dir = "../upload/blog/img/";
                            $no_icon = $target_dir."noimg.png";
							if($data['page_blog_image_href_en']==""){
								$icon = $no_icon;
							}else{
                                
								$icon = $target_dir . $data['page_blog_image_href_en'];
                                if(!is_file($icon)){
                                    $icon = $no_icon;
                                }
							}

							if($data['page_blog_image_copy_en']!=""){
								$copy = "<br>&copy " . $data['page_blog_image_copy_en'];
							  }else{
								$copy = "";
							  }
							?>
						<img src="<?php echo $icon; ?>" width="100%"><br>
                        <?php echo $data['page_blog_image_alt_en']; echo $copy?>
					</div>
					
					<div class="col-8" >

						<form action="index.php?page=blog_image_upload" method="POST" enctype="multipart/form-data" id="img_upload_form">
							<input type="hidden" name="page_blog_id" value="<?php echo $data['page_blog_id'];?>">
							<input type="hidden" name="image_language" value="en">
							<p>Nur Bilder im Format jpg, jpeg, gif und png sind erlaubt. Maximal 5MB pro Bild</p>
							<p class="text-danger">Achtung: Ist bereits ein Bild vorhanden, wird dieses automatisch überschrieben.</p>
							

                            <div class="form-group">
                                <label class="col-form-label" for="page_blog_image_alt">Alternativ-Text</label>
                                <input required type="text" name="page_blog_image_alt"  class="form-control" placeholder="">
                              </div>
                            
							  <div class="form-group">
                                <label class="col-form-label" for="page_blog_image_copy">Copyright</label>
                                <input  type="text" name="page_blog_image_copy"  class="form-control" placeholder="">
                              </div>

							<div class="form-group">
								<label for="exampleInputFile">Bild hochladen</label>
								<div class="input-group">
									<div class="custom-file">
										<input required type="file" class="custom-file-input" id="image" name="image">
										
										<label class="custom-file-label" for="image"><i class="fas fa-search"></i> &nbsp;Datei auswählen</label>
									</div>
									
									<div class="input-group-append">
										<!--<span class="input-group-text" onclick="$('#img_upload_form').submit()">Hochladen</span>-->
										<button type="submit" class="input-group-text"><span class='fas fa-upload'></span>&nbsp;hochladen</button>			
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
               


			</div>
            <div class="card-footer">
            <a href="index.php?page=blog_image_delete&lang=de&page_blog_id=<?php echo $data['page_blog_id']; ?>" title="Bild löschen" class="btn btn-danger">
                    Bild löschen
                    <span class="fas fa-trash"> </span>
                    </a>
            </div>
		</div>
	</div>
</div>




