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

	  <?php

		class nav_item{
			public $label;
			public $page;
			public $icon;
			public $headline;


			function __construct($label, $page, $icon, $headline=false){
				$this->label 		= $label;
				$this->page 		= $page;
				$this->icon 		= $icon;
				$this->headline 	= $headline;
			}

			function get_nav_item(){
				$return_string = "";

				if($this->headline){
					$return_string =  "<li class='nav-header'>SEITENINHALT</li>";
				}else{
					$page   = $this->page;
					$lable  = $this->label;
					$icon   = $this->icon;

					$return_string = "
						<li class='nav-item'>
							<a href='index.php?page=$page' class='nav-link'>
								<i class='nav-icon $icon'></i>
								<p>
									$lable 
								</p>
							</a>
						</li>
					";
				}

				return $return_string;
			}
		}//end class

		$navigation = array();

		array_push($navigation, new nav_item("SEITENINHALT", "", "", true));
		array_push($navigation, new nav_item("Seiten", "page", "far fa-file"));
		array_push($navigation, new nav_item("Menüband", "navigation", "fas fa-list"));
		array_push($navigation, new nav_item("Blog-Einträge", "blog", "fas fa-blog"));
		array_push($navigation, new nav_item("Biografien", "bio", "fas fa-user"));
		array_push($navigation, new nav_item("Galerien", "gallery", "fas fa-image"));

		array_push($navigation, new nav_item("PROGRAMM", "", "", true));
		array_push($navigation, new nav_item("Orte", "location", "far fa-compass"));
		array_push($navigation, new nav_item("Typen", "program_type", "fas fa-list"));
		array_push($navigation, new nav_item("Programm", "program", "fas fa-calendar"));

		array_push($navigation, new nav_item("ADMINISTRATION", "", "", true));
		array_push($navigation, new nav_item("Benutzer", "admin_user", "fas fa-user"));
		array_push($navigation, new nav_item("Globals", "globals", "fas fa-globe-europe"));
		array_push($navigation, new nav_item("Social-Links", "admin_socials", "fas fa-icons"));
		array_push($navigation, new nav_item("Icon-Liste", "admin_icon_list", "fas fa-icons"));

		

		


	?>
	  
	
	  
<?php //<span class="right badge badge-danger">New</span> ?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
		<li class='nav-header'> </li>
		<?php
			foreach($navigation as $nav){
				echo $nav->get_nav_item();
			}

		?>
		
	


				
         


		
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>