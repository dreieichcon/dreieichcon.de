
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


<div class="row">
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
</div>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Globals verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=admin_globals_add" title="neues Global anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Key</th>
								<th>Value</th>
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							

						
							$order = array();
							$order1['col'] = "global_key";
							$order1['dir'] = "ASC";
							
							array_push($order, $order1);
							
							$db_array = db_select("global", array(), $order);

						
							foreach($db_array as $line){
								
								$global_id		    	= $line['global_id'];
								$global_key		 	    = $line['global_key'];
								$global_value 			= $line['global_value'];
								
								$admin_user_modify_ts 		= UnixToTime($line['global_edit_ts']);
								$admin_user_modify_id 		= db_get_user($line['global_edit_id'])['user_full'];

                                $admin_user_icon           = "";
                                
                                
                               

                                $convention_list        = "";
								echo "
									<tr>
										<th>$global_key</th>
										<td>$global_value</td>
										
										
										<td>$admin_user_modify_ts<br>$admin_user_modify_id</td>
										<td><a href='index.php?page=admin_globals_edit&key=$global_key'><span class='fa fa-edit'></span></a> &nbsp;&nbsp; <a href='index.php?page=admin_globals_delete&key=$global_key' class='text-danger'><span class='fa fa-trash'></span></a></td>
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