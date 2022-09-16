
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">


<!-- <div class="row">
  <div class="col-12">
    <div class="card bg-danger">
      <div class="card-header">
        <h3 class="card-title">Hinweis</h3>
        <div class="card-tools"></div>
      </div>
      <div class="card-body" style="height: auto;">
      Die Einträge auf dieser Seite stellen die Kern-Konfiguration des Front-Ends dar. Es ist nicht empfohlen, Einträge zu löschen oder Keys zu ändern, sofern nicht auch der Quellcode angepasst wird. Das Ändern der Values stellt kein Problem dar.
      </div>
    </div>
  </div>
</div> -->


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Blog-Einträge verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=blog_add" title="neuen Blogeintrag anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Überschrift </th>
								<th>Art </th>
                                <th>Seite</th>
								<th>Beginn</th>
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                               

                                $sql		= "SELECT * FROM page_blog b, page_blog_content_type t WHERE t.page_blog_content_type_id = b.page_blog_content_type_id ORDER BY b.page_id, b.page_blog_order, b.page_blog_headline_de";
                                                        
                                $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

                                $statement	= $pdo->prepare($sql);

                                //$statement->bindParam(':name', $value);

                                $statement->execute();

                                $db_array = array();

                                while($row = $statement->fetch()){
                                    foreach ($row as $key => $value){
                                        $row[$key] = db_parse($value);
                                    }
                                    array_push($db_array, $row);
                                }
						
							

						
							foreach($db_array as $line){
								
								$page_blog_id		    = $line['page_blog_id'];
								$type				    = $line['page_blog_content_type_label'];
								$page_blog_order		= $line['page_blog_order'];
								$page_blog_headline_de	= $line['page_blog_headline_de'];
								$page_blog_headline_en	= $line['page_blog_headline_en'];
								$page_blog_content_de	= substr($line['page_blog_content_de'],0,250);
								
								
								
								$modify_ts   		= UnixToTime($line['page_blog_edit_ts']);
								$modify_id   		= db_get_user($line['page_blog_edit_id'])['user_full'];

                                $page               = db_get_page($line['page_id'])['page_title_de'];

                              
								echo "
									<tr>
										<th>$page_blog_headline_de<br>$page_blog_headline_en</th>
										<td>$type</td>
										<td>$page</td>
										<td>$page_blog_content_de</td>
										
										
										<td>$modify_ts<br>$modify_id</td>
										<td>
										<a href='index.php?page=blog_edit&blog_id=$page_blog_id'><span class='fa fa-edit'></span></a> &nbsp;&nbsp;
										<a href='index.php?page=blog_image&blog_id=$page_blog_id' title='Bild bearbeiten'><span class='fa fa-image'></span></a> &nbsp;&nbsp;
                                        <a href='index.php?page=blog_delete&blog_id=$page_blog_id' class='text-danger'><span class='fa fa-trash'></span></a></td>
									</tr>
								
								";


							}
								
								
							
							?>
						
						</tbody>
				
				
				</table>
	  
	  
			</div>
		</div>
	</div>
</div>