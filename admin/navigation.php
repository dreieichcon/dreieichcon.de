
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo($global_application_name_header);?> Navigation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Startseite</a></li>
              
              <li class="breadcrumb-item active">Menüband anpassen</li>
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
				<h3 class="card-title">Baum-Ansicht (nur deutsch)</h3>

				<div class="card-tools">
					
				</div>
			</div>
				
			<div class="card-body " style="height: auto;">
            <pre class="text-white"><?php
                    //get all top elements
                        get_childs(0, 0);

                        function get_childs($navigation_id, $depth){
                            $where = array();
                            $wh['col'] = "navigation_parent";
                            $wh['typ'] = "=";
                            $wh['val'] = $navigation_id;
                            array_push($where, $wh);

                            $order = array();
                            $or['col'] = "navigation_order";
                            $or['dir'] = "ASC";
                            array_push($order, $or);
                            
                            $db_array = db_select("navigation", $where, $order);
                            foreach($db_array as $line){
                                $title = $line['navigation_title_de'];
                                $id    = $line['navigation_id'];
                                
                                for($i = 0; $i<$depth;$i++){
                                    echo "  ";
                                }
                                echo"+ $title\n";
                                get_childs($id, $depth +1);
                            }
    
                        }

                ?>
                </pre>
            </div>
        </div>
    </div>
</div>


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Einträge verwalten</h3>

				<div class="card-tools">
					<a href="index.php?page=navigation_add" title="neue Seite anlegen" class="btn btn-primary"><span class="fa fa-plus-circle"> </span> neu</a>
				</div>
			</div>
				
			<div class="card-body table-responsive p-0" style="height: auto;">
				<table class="table table-head-fixed">
					<thead>
							<tr>
								<th>Sortierung </th>
								<th>Menüpunkt </th>
								<th>Verweis auf </th>
								<th>Parent</th>
								
								
								<th>letzte Änderung</th>
								<th>Aktionen</th>
								
							</tr>
						</thead>
						
						<tbody >
							<?php
							
                               

                                $sql		= "SELECT * FROM navigation ORDER BY navigation_order";
                                                        
                                $pdo 		= new PDO($pdo_mysql, $pdo_db_user, $pdo_db_pwd);

                                $statement	= $pdo->prepare($sql);

                                //$statement->bindParam(':name', $value);

                                $statement->execute();

                                $db_array = array();

                                while($row = $statement->fetch(PDO::FETCH_ASSOC)){
                                    foreach ($row as $key => $value){
                                        $row[$key] = db_parse($value);
                                    }
                                    array_push($db_array, $row);
                                }
						
							

						
							foreach($db_array as $line){

                $page = "";
								
								$navigation_id		         = $line['navigation_id'];
								$navigation_title_de	     = $line['navigation_title_de'];
								$navigation_title_en       = $line['navigation_title_en'];
								$page_id		               = $line['page_id'];
								$navigation_href		       = $line['navigation_href'];
								$navigation_parent		     = $line['navigation_parent'];
								$navigation_special_page	 = $line['navigation_special_page'];
								$navigation_show	         = $line['navigation_show'];
							
								$navigation_order 	       = $line['navigation_order'];
								
								$modify_ts   		           = UnixToTime($line['navigation_edit_ts']);
								$modify_id   		           = db_get_user($line['navigation_edit_id'])['user_full'];

                if($page_id >0){
                    $page = "Intern: ".db_get_page($page_id)['page_title_de'];
                }else{
                    if($navigation_href != ""){
                      $page = "Extern: " .$navigation_href;
                    }
                }

                if($navigation_parent > 0){
                    $parent = db_get_navigation($navigation_parent)['navigation_title_de'];    
                }else{
                    $parent = "";
                }

                if($navigation_special_page != ""){
                  if($page!=""){
                    $page = "<span class='text-warning'>Special-Page: $navigation_special_page</span><br>$page";
                  }else{
                    $page = "<span class='text-warning'>Special-Page: $navigation_special_page</span>";
                  }
                  
                }

                $active = "";
                if($navigation_show != 1){
                  $active = "class='deactivated'";
                }
                              
								echo "
									<tr $active>
                    <td>$navigation_order</td>
										<th>$navigation_title_de<br>$navigation_title_en</th>
										<td>$page</td>
										<td>$parent</td>
										
										
										<td>$modify_ts<br>$modify_id</td>
										<td>
                      <a href='index.php?page=navigation_edit&navigation_id=$navigation_id'><span class='fa fa-edit'></span></a> 
                      &nbsp;&nbsp; <a href='index.php?page=navigation_delete&navigation_id=$navigation_id' class='text-danger'><span class='fa fa-trash'></span></a>
                    </td>
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


