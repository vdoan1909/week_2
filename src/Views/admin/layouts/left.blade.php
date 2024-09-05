<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ $_ENV['BASE_URL'] }}admin" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ $_ENV['BASE_URL'] }}assets/admin/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $_ENV['BASE_URL'] }}assets/admin/images/logo-dark.png" alt="" height="17">
            </span>
        </a>

        <!-- Light Logo-->
        <a href="{{ $_ENV['BASE_URL'] }}admin" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ $_ENV['BASE_URL'] }}assets/admin/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ $_ENV['BASE_URL'] }}assets/admin/images/logo-light.png" alt="" height="17">
            </span>
        </a>

        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i class="ri-dashboard-2-line"></i>Dashboards
                    </a>
                </li>

                <li class="menu-title">
                    <i class="ri-more-fill"></i>
                    <span data-key="t-pages">Page</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#catalogue" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="catalogue">
                        <i class="ri-braces-line"></i>
                        <span data-key="t-base-ui">Catalogue</span>
                    </a>

                    <div class="collapse menu-dropdown mega-dropdown-menu" id="catalogue">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ $_ENV['BASE_URL'] }}admin/catalogue" class="nav-link"
                                            data-key="t-list-catalogue">List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ $_ENV['BASE_URL'] }}admin/catalogue/create" class="nav-link"
                                            data-key="t-create-catalogue">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#product" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="product">
                        <i class="ri-soundcloud-fill"></i>
                        <span data-key="t-base-ui">Product</span>
                    </a>

                    <div class="collapse menu-dropdown mega-dropdown-menu" id="product">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ $_ENV['BASE_URL'] }}admin/product" class="nav-link"
                                            data-key="t-list-product">List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ $_ENV['BASE_URL'] }}admin/product/create" class="nav-link"
                                            data-key="t-create-product">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
