<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/hls-rounded-log.png')); ?>" alt="" height="70">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/hls-rounded-log.png')); ?>" alt="" height="70">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo e(URL::asset('assets/images/hls-rounded-log.png')); ?>" alt="" height="70">
            </span>
            <span class="logo-lg">
                <img src="<?php echo e(URL::asset('assets/images/hls-rounded-log.png')); ?>" alt="" height="70">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span><?php echo app('translator')->get('translation.menu'); ?></span></li>
                <li class="nav-item">
                    
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="dashboard-analytics" class="nav-link"><?php echo app('translator')->get('translation.analytics'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crm" class="nav-link"><?php echo app('translator')->get('translation.crm'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="index" class="nav-link"><?php echo app('translator')->get('translation.ecommerce'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-crypto" class="nav-link"><?php echo app('translator')->get('translation.crypto'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects" class="nav-link"><?php echo app('translator')->get('translation.projects'); ?></a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft" class="nav-link" data-key="t-nft"> <?php echo app('translator')->get('translation.nft'); ?> <span class="badge badge-pill bg-danger" data-key="t-new"><?php echo app('translator')->get('translation.new'); ?></span></a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <!-- Orders -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="bx bx-layer"></i> <span><?php echo app('translator')->get('translation.orders'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/order_list" class="nav-link"><?php echo app('translator')->get('Order List'); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Company -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps10" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps10">
                        <i class="bx bx-building"></i> <span><?php echo app('translator')->get('Company'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps10">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/get_company" class="nav-link"><?php echo app('translator')->get('Company List'); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts11" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts11">
                        <i class="bx bx-user"></i> <span>Drivers</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts11">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/get_drivers" class="nav-link" id="driversListLink">Drivers List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="bx bx-user"></i> <span>Users</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/get_users" class="nav-link" id="usersListLink">Users List</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAudit" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAudit">
                        <i class="bx bx-building"></i> <span><?php echo app('translator')->get('Audit Trails'); ?></span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAudit">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="/apis_call" class="nav-link"><?php echo app('translator')->get('APIs Call'); ?></a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Get the current URL
    var currentUrl = window.location.href;

    $('.menu-dropdown .nav-link').each(function() {
        var linkUrl = $(this).attr('href');
        if (currentUrl.indexOf(linkUrl) != -1) {
            // Expand the submenu item
            $(this).attr('aria-expanded', 'true');
            $(this).closest('.menu-dropdown').addClass('show');
            $(this).addClass('active');
        }
    });
</script>
<?php /**PATH F:\CANADA-New\PWA_ADMIN_PANEL\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>