<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="app/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="app/assets/dist/img/thinkitlogo.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= (isset($_SESSION['user']))? $_SESSION['user']->username:"ThinkIT" ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <?php
                    if(isset($_SESSION['user'])):
                ?>
                <?php if($_SESSION['user']->role_id == 1): ?>
                <li class="nav-item">
                    <a href="index.php?page=ships" class="nav-link">
                        <i class="nav-icon fas fa-plane-departure"></i>
                        <p>
                            Ships
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=ranks" class="nav-link">
                        <i class="fab fa-hackerrank"></i>
                        <p>
                            Ranks
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=crewmembers" class="nav-link">
                        <i class="fas fa-user-friends"></i>
                        <p>
                            Crew
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=notifications" class="nav-link">
                        <i class="fas fa-file-alt"></i>
                        <p>
                            Notifications
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=users" class="nav-link">
                        <i class="fas fa-user-cog"></i>
                        <p>
                            Users and roles
                        </p>
                    </a>
                </li>
                <?php endif;?>
                <li class="nav-item">
                    <a href="index.php?page=logout" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Log out
                        </p>
                    </a>
                </li>
                <?php
                    else:
                ?>
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="fas fa-sign-in-alt"></i>
                        <p>
                            Auth
                           <span class="right badge badge-danger">Login/Reg</span>
                        </p>
                    </a>
                </li>
                <?php
                    endif;
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
