<?php

if(!isset($page_bio_gallery_id)){
    if(isset($_GET['page_bio_gallery_id'])){
        $page_bio_gallery_id = $_GET['page_bio_gallery_id'];
    }else{
        include("400.php");
        include("include/html_footer.php");
        die;
    }
}

    $where = array();
    $wh['col'] = "page_bio_gallery_id";
    $wh['typ'] = "=";
    $wh['val'] = $page_bio_gallery_id;
    array_push($where, $wh);

    $db_array = db_select("page_bio_gallery", $where);

if(count($db_array)>0){
    $data = $db_array[0];
}else{
    include("999.php");
    include("include/html_footer.php");
    die;
}

$target_dir = "../upload/bio_gallery/img/";

?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Bilder bearbeiten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              <li class="breadcrumb-item">Gallerie</li>
              <li class="breadcrumb-item"><?php echo $data['page_bio_gallery_text_de'];?></li>
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
                           
                            $no_icon = $target_dir."noimg.png";
							if($data['page_bio_gallery_image_href_de']==""){
								$icon = $no_icon;
							}else{
                                
								$icon = $target_dir . $data['page_bio_gallery_image_href_de'];
                                if(!is_file($icon)){
                                    $icon = $no_icon;
                                }
							}
							?>
						<img src="<?php echo $icon; ?>" width="100%"><br>
                        <?php echo $data['page_bio_gallery_image_alt_de']; ?>
					</div>
					
					<div class="col-8" >

						<form action="index.php?page=bio_gallery_image_upload" method="POST" enctype="multipart/form-data" id="img_upload_form">
							<input type="hidden" name="page_bio_gallery_id" value="<?php echo $data['page_bio_gallery_id'];?>">
							<input type="hidden" name="image_language" value="de">
							<p>Nur Bilder im Format jpg, jpeg, gif und png sind erlaubt. Maximal 5MB pro Bild</p>
							<p class="text-danger">Achtung: Ist bereits ein Bild vorhanden, wird dieses automatisch überschrieben.</p>
							

                            <div class="form-group">
                                <label class="col-form-label" for="page_bio_gallery_image_alt">Alternativ-Text</label>
                                <input required type="text" name="page_bio_gallery_image_alt"  class="form-control" placeholder="">
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
            <a href="index.php?page=bio_gallery_image_delete&lang=de&page_bio_gallery_id=<?php echo $data['page_bio_gallery_id']; ?>" title="Bild löschen" class="btn btn-danger">
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
                           
                            $no_icon = $target_dir."noimg.png";
							if($data['page_bio_gallery_image_href_en']==""){
								$icon = $no_icon;
							}else{
                                
								$icon = $target_dir . $data['page_bio_gallery_image_href_en'];
                                if(!is_file($icon)){
                                    $icon = $no_icon;
                                }
							}
							?>
						<img src="<?php echo $icon; ?>" width="100%"><br>
                        <?php echo $data['page_bio_gallery_image_alt_en']; ?>
					</div>
					
					<div class="col-8" >

						<form action="index.php?page=bio_gallery_image_upload" method="POST" enctype="multipart/form-data" id="img_upload_form">
							<input type="hidden" name="page_bio_gallery_id" value="<?php echo $data['page_bio_gallery_id'];?>">
							<input type="hidden" name="image_language" value="en">
							<p>Nur Bilder im Format jpg, jpeg, gif und png sind erlaubt. Maximal 5MB pro Bild</p>
							<p class="text-danger">Achtung: Ist bereits ein Bild vorhanden, wird dieses automatisch überschrieben.</p>
							

                            <div class="form-group">
                                <label class="col-form-label" for="page_bio_gallery_image_alt">Alternativ-Text</label>
                                <input required type="text" name="page_bio_gallery_image_alt"  class="form-control" placeholder="">
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
            <a href="index.php?page=bio_gallery_image_delete&lang=en&page_bio_gallery_id=<?php echo $data['page_bio_gallery_id']; ?>" title="Bild löschen" class="btn btn-danger">
                    Bild löschen
                    <span class="fas fa-trash"> </span>
                    </a>
            </div>
		</div>
	</div>
</div>






