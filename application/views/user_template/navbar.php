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
                    <i class="bi bi-brush"></i>
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
                
            <span id="cartCount">
                <?= isset($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0; ?>
            </span>

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

                            <i class="bi bi-house-door"></i>
                            Dashboard

                        </a>

                        <a class="dropdown-item"
                           href="<?= base_url('upload'); ?>">

                            <i class="bi bi-upload"></i>
                            Upload stocks

                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-danger"
                           href="<?= base_url('users/user_logout'); ?>">

                            <i class="bi bi-box-arrow-right"></i>
                            Logout

                        </a>

                    </div>

                </div>

            </div>

        </nav>

    </header>