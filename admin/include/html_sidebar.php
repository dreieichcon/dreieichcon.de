  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="assets/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $global_application_name; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
	  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        
        </div>
        <div class="info">
         
			<?php
				if(isset($_SESSION['admin_user_id'])){
					$name 		= $_SESSION['admin_user_name'];
					
					
					echo "Hallo, $name";
					echo"<a href='index.php?page=user_edit_self' title='Benutzerkonto bearbeiten' class='d-block'>Konto bearbeiten</a>
					";
					
				}else{
					echo" <a href='login.php' class='d-block'>Anmelden</a>";
				}
				
				
				
		  ?>
		  
        </div>
      </div>
	  
	
	  
<?php //<span class="right badge badge-danger">New</span> ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
		<li class='nav-header'> </li>
			<li class='nav-header'>SEITENINHALT</li>
	
				<li class='nav-item'>
					<a href='index.php?page=page' class='nav-link'>
					<i class="nav-icon far fa-file"></i>
					<p>
						Seiten anlegen / bearbeiten
					</p>
					</a>
				</li>


			
				<li class='nav-header'>ADMINISTRATION</li>
					
					<li class='nav-item'>
						<a href='index.php?page=admin_user' class='nav-link'>
						  <i class='nav-icon fa fa-user'></i>
						  <p>
							Benutzer
						  </p>
						</a>
					</li>

					<li class='nav-item'>
						<a href='index.php?page=admin_globals' class='nav-link'>
						  <i class='nav-icon fa fa-globe-europe'></i>
						  <p>
							Globals
						  </p>
						</a>
					</li>

					<li class='nav-item'>
						<a href='index.php?page=admin_socials' class='nav-link'>
						<i class="nav-icon fas fa-icons"></i>
						  <p>
							Social-Links
						  </p>
						</a>
					</li>

					<li class='nav-item'>
						<a href='index.php?page=admin_icon_list' class='nav-link'>
						<i class="nav-icon fas fa-icons"></i>
						  <p>
							Icon-Liste
						  </p>
						</a>
					</li>

				
         


		
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>