<link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">
<?php 
    $CI =& get_instance();
    $user_id = $_SESSION['register_id'];  

    $user = $CI->db
        ->where('register_id', $user_id)
        ->get('registration')
        ->row();
?>

<div class="page-wrapper">
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="row align-items-center mb-4">

            <div class="col-md-6">
                <h2 class="dashboard-title mb-1">
                    Welcome Back, <?= ucfirst($user->fname); ?> 👋
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
                            Dashboard
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