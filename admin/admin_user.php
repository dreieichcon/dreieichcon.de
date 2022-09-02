
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
              <li class="breadcrumb-item active">Benutzer</li>
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
				<h3 class="card-title">Benutzer verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=admin_user_add" title="neuen Benutzer anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Benutzer</th>
								<th>Conventions</th>
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "admin_user_active";
							$order1['dir'] = "DESC";
							
							//array_push($order, $order1);

                            $order1['col'] = "admin_user_name";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("adminuser", array(), $order);

						
							foreach($db_array as $line){
								
								$admin_user_id		    	= $line['admin_user_id'];
								$admin_user_name		 	= $line['admin_user_name'];
								$admin_user_mail 			= $line['admin_user_mail'];
								$admin_user_active	 		= $line['admin_user_active'];
								$admin_user_admin 			= $line['admin_user_admin'];
								$admin_user_modify_ts 		= UnixToTime($line['admin_user_modify_ts']);
								$admin_user_modify_id 		= db_get_user($line['admin_user_modify_id'])['user_full'];

                                $admin_user_icon           = "";
                                
                                
                                if($admin_user_admin == 1){
                                    $admin_user_icon .= "<i class='fas fa-screwdriver'></i>";
                                }

                                if($admin_user_active == 0){
                                    $admin_user_icon .= "<i class='fas fa-user-slash'></i>";
                                }

                                $convention_list        = "";
								echo "
									<tr>
										<th>$admin_user_name &nbsp; $admin_user_icon<br><a href='mailto:$admin_user_mail'>$admin_user_mail <i class='fas fa-at'></i></a></th>
										<td>$convention_list</td>
										
										
										<td>$admin_user_modify_ts<br>$admin_user_modify_id</td>
										<td><a href='index.php?page=z_department_edit&admin_user_id=$admin_user_id'><span class='fa fa-edit'></span></a></td>
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