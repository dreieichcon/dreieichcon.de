
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
              <li class="breadcrumb-item active">Social</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include("include/html_result.php"); ?>



<!-- Main content -->
<section class="content">





<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Socials verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=admin_socials_add" title="neuen Social-Link anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Sortierung</th>
								<th>Plattform</th>
								<th>Adresse</th>
								<th>Icon</th>
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "social_order";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("social", array(), $order);

						
							foreach($db_array as $line){
								
								$social_id		    	= $line['social_id'];
								$social_platform	    = $line['social_platform'];
								$social_href 			= $line['social_href'];
								$social_icon 			= $line['social_icon'];
								$social_order 			= $line['social_order'];
								
								
								$social_edit_ts 		= UnixToTime($line['social_edit_ts']);
								$social_edit_id 		= db_get_user($line['social_edit_id'])['user_full'];

                               
								echo "
									<tr>
										<td>$social_order</td>
										<th>$social_platform</th>
										<td>$social_href</td>
										<td><center><img src='../$social_icon' height='64px'></center><br>$social_icon</td>
										
										
										<td>$social_edit_ts<br>$social_edit_id</td>
										<td><a href='index.php?page=admin_socials_edit&id=$social_id&platform=$social_platform'><span class='fa fa-edit'></span></a> &nbsp;&nbsp; <a href='index.php?page=admin_socials_delete&id=$social_id&platform=$social_platform' class='text-danger'><span class='fa fa-trash'></span></a></td>
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