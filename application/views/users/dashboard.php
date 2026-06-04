<link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">

<div class="page-wrapper">
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
                            Dashboard
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

        <!-- Main Content -->
        <div class="glass-container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="text-white mb-0">
            Tattoo Products
        </h4>

    </div>

    <div class="row g-4">

        <?php foreach($products as $p): ?>

        <div class="col-12 col-sm-6 col-lg-3">

            <div class="reservation-card h-100 text-center">

                <img src="<?= base_url('uploads/products/'.$p->image); ?>"
                     style="width:100%; height:180px; object-fit:cover; border-radius:10px;">

                <h5 class="text-white mt-3">
                    <?= $p->product_name; ?>
                </h5>

                <p class="text-light mb-1">
                    ₱<?= number_format($p->price,2); ?>
                </p>

                <span class="badge bg-info mb-2">
                    Stock: <?= $p->stocks; ?>
                </span>

                <div class="mt-2">

                    <?php if($p->stocks > 0): ?>

                        <button class="btn btn-primary btn-sm"
                                onclick="addToCart(<?= $p->product_id; ?>)">
                            Add to Cart
                        </button>

                    <?php else: ?>

                        <button class="btn btn-secondary btn-sm" disabled>
                            Out of Stock
                        </button>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

</div>

    </div>
</div>

<script>
    function addToCart(product_id){

    $.ajax({
        url: "<?= base_url('products/add_to_cart'); ?>",
        type: "POST",
        data: { product_id: product_id },
        dataType: "json",

        success: function(res)
        {
            if(res.status == "success")
            {
                swal("Added", res.message, "success");
                updateCartCount();
            }
            else
            {
                swal("Error", res.message, "error");
            }
        }
    });
}

    function updateCartCount(){
        
        $.ajax({
            url: "<?= base_url('products/cart_count'); ?>",
            type: "GET",
            success: function(res)
            {
                $('#cartCount').html(res);
            }
        });
    }
</script>