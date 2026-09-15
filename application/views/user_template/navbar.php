<link href="<?= base_url('assets/css/navbar.css'); ?>" rel="stylesheet">

<body class="skin-default-dark fixed-layout">

<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">The 8:30 Club!</p>
    </div>
</div>

<div id="main-wrapper">

    <header class="topbar">

        <nav class="modern-navbar">

            <a class="navbar-brand" href="<?= base_url('users/dashboard'); ?>">

                <div class="brand-logo">
                    <i class="bi bi-cup-hot"></i>
                </div>

                <div class="brand-text">
                    <h3 class="brand-title">
                        The 8:30 Club!
                    </h3>

                    <span class="brand-subtitle">
                        Coffee: because adulting is hard
                    </span>
                </div>

            </a>

            <div class="nav-right">
                
            <span id="cartCount">
                <button class="btn btn-sm btn-danger position-relative"
                        onclick="window.location='<?= base_url('users/cart'); ?>'">
                    View Cart
                    <i class="bi bi-cart"> -
                        <span class="cart-badge"
                            id="cartBadge"
                            style="background-color:#ffffff;color:#000000;display:inline-flex;align-items:center;justify-content:center;padding:3px 8px;border-radius:999px;font-family:sans-serif;font-size:11px;font-weight:bold;line-height:1;">
                            0
                        </span>
                    </i>
                </button>
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

                        <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="logoutUser()">

                            <i class="bi bi-box-arrow-right"></i>
                            Logout

                        </a>

                    </div>

                </div>

            </div>

        </nav>

    </header>
<script>
    function logoutUser(){

        swal({
            title: "Logout?",
            text: "You will be logged out of your account.",
            icon: "warning",
            buttons: true
        }).then(function(result) {

            if (result) {
                window.location = "<?= base_url('users/user_logout'); ?>";
            }

        });
    }
    //  $('#cartCount').on('click', function() {
    //       alert('YAWA KA!');
    //   });

      function loadCartCount(){
        $.ajax({
            url: "<?= base_url('users/cart_count'); ?>",
            type: "GET",
            success: function(response)
            {
                $('#cartBadge').text(response);
            }
        });
    }

    $(document).ready(function()
    {
        loadCartCount();
    });
</script>