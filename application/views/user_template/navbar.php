
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
 <link href="<?php echo base_url('assets/css/navbar.css'); ?>" rel="stylesheet">
<body class="skin-default-dark fixed-layout">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">GET INKED!</p>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">

    <nav class="navbar top-navbar navbar-expand-md navbar-dark">

        <a class="navbar-brand" href="<?= base_url('users/hut_reserve'); ?>">

            <div class="brand-logo">
                <i class="fa fa-paint-brush"></i>
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

        <div class="ml-auto nav-right">

            <div class="dropdown">

                <a class="user-menu dropdown-toggle"
                   href="#"
                   data-toggle="dropdown">

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
        <div class="modal fade" id="navModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-mlg" role="document">
                <div class="modal-content modal-nobak m-t-150">                                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-3 col-lg-3"></div>
                            <div class="col-sm-4 col-lg-4">
                                <a href="<?php echo base_url(); ?>users/hut_reserve" class="btn btn-dark btn-md" id="huts" >
                                    <center>
                                        <span class="fa fa-home" aria-hidden="true" style="font-size:200px"></span><br>
                                        Reservationssssssssssssss
                                    </center>
                                </a>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <a data-toggle="modal" data-target="#delivery" class="btn btn-dark btn-md" id="foods" >
                                    <center>
                                        <span class="fa fa-cutlery" aria-hidden="true" style="font-size:200px"></span><br>
                                        Delivery
                                    </center>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="delivery" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel" style="color:#000!important">Add New Delivery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action = "<?php echo base_url(); ?>users/add_delivery">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Address:</label>
                                    <textarea name="address" rows = "5" class="form-control bor-radius5" placeholder="Barangay, Street, Block" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Remarks:</label>
                                    <textarea name="remarks" rows = "5" class="form-control bor-radius5" placeholder="Additional Informations..." required></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-info btn-block" value ="Proceed">
                                </div>
                            <input type="hidden" name="baseurl" id="baseurl" value ="<?php echo base_url(); ?>">
                            <input name="user_id" id = "user_id" type="hidden" value="<?php echo $_SESSION['user_id'];?>">
                        </form>
                    </div>                                        
                </div>
            </div>
        </div>