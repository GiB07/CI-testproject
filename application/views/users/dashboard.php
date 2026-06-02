<link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">
<?php 
    $CI =& get_instance();
    $user_id = $_SESSION['user_id'];  
?>

<div class="page-wrapper">
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="row align-items-center mb-4">

            <div class="col-md-6">
                <h2 class="dashboard-title mb-1">
                    Welcome Back
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
            Milk Tea Menu
        </h4>

        <span class="badge badge-pill badge-success px-3 py-2">
            Cart: 0 Items
        </span>
    </div>

    <div class="row">

        <!-- Products -->
        <div class="col-lg-8">

            <div class="row">

                <!-- Product Card -->
                <div class="col-md-6 col-xl-4 mb-4">

                    <div class="menu-card">

                        <img src="<?= base_url('assets/images/classic-milktea.jpg'); ?>"
                             class="img-fluid menu-img">

                        <div class="p-3">

                            <h5 class="text-white mb-2">
                                Classic Milk Tea
                            </h5>

                            <p class="text-muted small">
                                Brown sugar pearls with premium tea.
                            </p>

                            <div class="mb-3">
                                <label class="text-white small">
                                    Size
                                </label>

                                <select class="form-control">
                                    <option>Small - ₱79</option>
                                    <option>Medium - ₱99</option>
                                    <option>Large - ₱119</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <div class="qty-control">

                                    <button class="btn btn-sm btn-dark">
                                        -
                                    </button>

                                    <span class="mx-2 text-white">
                                        1
                                    </span>

                                    <button class="btn btn-sm btn-dark">
                                        +
                                    </button>

                                </div>

                                <h5 class="text-success mb-0">
                                    ₱99
                                </h5>

                            </div>

                            <button class="btn btn-success btn-block">
                                <i class="fa fa-shopping-cart"></i>
                                Add to Cart
                            </button>

                        </div>

                    </div>

                </div>

                <!-- Product Card -->
                <div class="col-md-6 col-xl-4 mb-4">

                    <div class="menu-card">

                        <img src="<?= base_url('assets/images/taro.jpg'); ?>"
                             class="img-fluid menu-img">

                        <div class="p-3">

                            <h5 class="text-white">
                                Taro Milk Tea
                            </h5>

                            <p class="text-muted small">
                                Creamy taro flavor with pearls.
                            </p>

                            <div class="mb-3">
                                <select class="form-control">
                                    <option>Small - ₱89</option>
                                    <option>Medium - ₱109</option>
                                    <option>Large - ₱129</option>
                                </select>
                            </div>

                            <button class="btn btn-success btn-block">
                                Add to Cart
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Cart -->
        <div class="col-lg-4">

            <div class="cart-panel">

                <h5 class="text-white mb-4">
                    Order Summary
                </h5>

                <div class="cart-item">

                    <div class="d-flex justify-content-between">

                        <div>
                            <strong class="text-white">
                                Classic Milk Tea
                            </strong>

                            <div class="small text-muted">
                                Medium × 2
                            </div>
                        </div>

                        <span class="text-success">
                            ₱198
                        </span>

                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                    <h5 class="text-white">
                        Total
                    </h5>

                    <h5 class="text-success">
                        ₱198
                    </h5>

                </div>

                <button class="btn btn-success btn-lg btn-block mt-4">
                    Checkout
                </button>

            </div>

        </div>

    </div>

</div>

    </div>
</div>