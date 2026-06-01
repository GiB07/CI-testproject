<?php 
    $CI =& get_instance();
    $user_id = $_SESSION['user_id'];  
?>

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row dashboard-header">
            <div class="col-md-6">
                <h2 class="dashboard-title">
                    Welcome Back
                </h2>
                <p class="dashboard-subtitle">
                    Manage your tattoo shop reservations.
                </p>
            </div>

            <div class="col-md-6 text-md-right">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('users/dashboard'); ?>">
                            Home
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Dashboardsssssssssss
                    </li>
                </ol>
            </div>
        </div>

        <div class="glass-container">

            <h4 class="text-white mb-4">
                Reservation Services
            </h4>

            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="reservation-card">

                        <a href="<?= base_url('hut_reserve'); ?>" class="card-link">

                            <div class="card-icon">
                                <i class="fa fa-calendar"></i>
                            </div>

                            <div class="card-title">
                                Reservation
                            </div>

                            <div class="card-desc">
                                Book your tattoo session and manage your appointments.
                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>