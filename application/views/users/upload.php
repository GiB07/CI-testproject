<link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">

<div class="page-wrapper upload">
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="row align-items-center mb-4">

            <div class="col-md-6">
                <h2 class="dashboard-title mb-1">
                    Welcome Back,
                    <span class="user-name">
                       <?= ucwords($this->session->userdata('fullname')); ?>
                    </span>
                </h2>

                <p class="dashboard-subtitle mb-0">
                    Manage your tattoo shop reservations.
                </p>
            </div>

            <div class="col-md-6">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb justify-content-md-end mb-0">

                        <li class="breadcrumb-item">
                            <a href="<?= base_url('users/dashboard'); ?>">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active" aria-current="page">
                            Upload Stocks
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

        <!-- Main Content -->
        <div class="glass-container">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="text-white mb-0">
                    Reservation Services
                </h4>

            </div>

            <div class="row g-4">

            <div class="col-12 col-sm-6 col-lg-4">

                <a href="<?= base_url('products'); ?>" class="text-decoration-none">

                    <div class="reservation-card h-100">

                        <div class="card-body text-center">

                            <div class="card-icon mb-4">
                                <i class="fa fa-shopping-bag"></i>
                            </div>

                            <h5 class="card-title text-white fw-bold">
                                Tattoo Shop
                            </h5>

                            <p class="card-desc mb-0">
                                Browse and purchase tattoo products and merchandise.
                            </p>

                        </div>

                    </div>

                </a>

            </div>

                <!-- Reservation Card -->
                <div class="col-12 col-sm-6 col-lg-4">

                    <a href="<?= base_url('hut_reserve'); ?>"
                       class="text-decoration-none">

                        <div class="reservation-card h-100">

                            <div class="card-body text-center">

                                <div class="card-icon mb-4">

                                    <i class="fa fa-calendar"></i>

                                </div>

                                <h5 class="card-title text-white fw-bold">
                                    Reservation
                                </h5>

                                <p class="card-desc mb-0">
                                    Book your tattoo session and manage your appointments.
                                </p>

                            </div>

                        </div>

                    </a>

                </div>

                <!-- Future Card Example -->
                
                <div class="col-12 col-sm-6 col-lg-4">

                    <a href="#" class="text-decoration-none">

                        <div class="reservation-card h-100">

                            <div class="card-body text-center">

                                <div class="card-icon mb-4">
                                    <i class="fa fa-user"></i>
                                </div>

                                <h5 class="card-title text-white fw-bold">
                                    Artists
                                </h5>

                                <p class="card-desc mb-0">
                                    View available tattoo artists.
                                </p>

                            </div>

                        </div>

                    </a>

                </div>
               

            </div>

        </div>

    </div>
</div>