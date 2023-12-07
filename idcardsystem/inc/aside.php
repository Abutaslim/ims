<aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li <?php  if ( $page=='dashboard'){ echo 'class="nav-item menu-open "';} else{echo 'class="nav-item"'; }?>>
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li >
                  <a href="./dashboard.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./changepass.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change Password</p>
                  </a>
                </li>
                
              </ul>
            </li>
            <li <?php  if ( $page=='director'){ echo 'class="nav-item menu-open "';} else{echo 'class="nav-item"'; }?> >
              <a href="#" class="nav-link active bg-yellow">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Student 
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./students_list.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Studets List</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./change_picture.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Change of Picture</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./agencies.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Agencies</p>
                  </a>
                </li>
              </ul>
            </li>
            <li <?php  if ( $page=='coordinator'){ echo 'class="nav-item menu-open "';} else{echo 'class="nav-item"'; }?>>
              <a href="#" class="nav-link active bg-green">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                 Reports
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./generate_students_statistics.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Students Statistics</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./generate_id_card_printed.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ID Card Printed</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="./generate_id_card_not_printed.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ID Card not Printed</p>
                  </a>
                </li>
               
              </ul>
            </li>
         
            <li <?php  if ( $page=='report'){ echo 'class="nav-item menu-open "';} else{echo 'class="nav-item"'; }?>>
              <a href="#" class="nav-link active bg-brown">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Print
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./id_card_program.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Print by Program</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./id_card_reg.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Print by Reg.</p>
                  </a>
                </li>
                
              </ul>
            </li>
            
          
           
        
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Forms
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Advanced Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Editors</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/validation.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Validation</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Tables
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Tables</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DataTables</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/jsgrid.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>jsGrid</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">Features</li>
            
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Gallery
                </p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Mailbox
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inbox</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Compose</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/read-mail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Read</p>
                  </a>
                </li>
              </ul>
            </li>
            
            
          
            
            
            
          
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
