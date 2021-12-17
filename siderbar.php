        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas"></i>
                </div>
                <div class="sidebar-brand-text mx-3">pentesting lab</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Vulnerablities
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesql"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>SQL Injection</span>
                </a>
                <div id="collapsesql" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="sqli_1.php">SQL Injection (GET/Select)</a>
                        <a class="collapse-item" href="sqli_2.php">SQL Injection (POST/Select)</a>
                        <a class="collapse-item" href="sqli_3.php">SQL Injection - Blind - Time-Based</a>
                        <a class="collapse-item" href="sqli_4.php">SQL Injection - Authentication Bypass</a>
                    </div>
                </div>
                
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsehtml"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>HTML Injection</span>
                </a>
                <div id="collapsehtml" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="htmli_get.php">Reflected(GET Method)</a>
                        <a class="collapse-item" href="htmli_post.php">Reflected(POST Method)</a>
                        <a class="collapse-item" href="htmli_stored.php">Stored(Blog)</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseosc"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>OS Command Injection</span>
                </a>
                <div id="collapseosc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="os_cmd_i.php">Reflected(GET and POST)</a>
                        <a class="collapse-item" href="os_cmd_iblind.php">Blind(GET and POST)</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsephpc"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>PHP Code Injection</span>
                </a>
                <div id="collapsephpc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="phpi.php">Reflected(GET)</a>
                    </div>
                </div>
            </li>


     
            <!-- Divider -->
            <hr class="sidebar-divider">

        

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
 

        <!-- End of Sidebar -->