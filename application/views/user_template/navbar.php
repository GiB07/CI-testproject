<link href="<?= base_url('assets/css/navbar.css'); ?>" rel="stylesheet">

<body class="skin-default-dark fixed-layout">

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">GET INKED!</p>
    </div>
</div>

<div id="main-wrapper">

    <header class="topbar">

        <nav class="modern-navbar">

            <a class="navbar-brand" href="<?= base_url('users/dashboard'); ?>">

                <div class="brand-logo">
                    <i class="fas fa-paint-brush"></i>
                </div>

                <div class="brand-text">
                    <h3 class="brand-title">
                        GET INKED!
                    </h3>

                    <span class="brand-subtitle">
                        Tattoo Studio
                    </span>
                </div>

            </a>

            <div class="nav-right">

                <div class="dropdown">

                    <a href="javascript:void(0);"
                        class="user-menu dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">

                        <i class="fa fa-user"></i>

                    </a>

                    <div class="dropdown-menu dropdown-menu-right">

                        <a class="dropdown-item"
                           href="<?= base_url('users/dashboard'); ?>">

                            <i class="fa fa-home mr-2"></i>
                            Dashboard

                        </a>

                        <a class="dropdown-item"
                           href="<?= base_url('hut_reserve'); ?>">

                            <i class="fa fa-calendar mr-2"></i>
                            Reservations

                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-danger"
                           href="<?= base_url('users/user_logout'); ?>">

                            <i class="fa fa-sign-out mr-2"></i>
                            Logout

                        </a>

                    </div>

                </div>

            </div>

        </nav>

    </header>