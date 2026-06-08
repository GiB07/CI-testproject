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
        <div class="product-container mt-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-white mb-0">Tattoo Products</h4>
            </div>

            <div class="row g-4">

                <?php foreach($products as $p): ?>

                <div class="col-12 col-sm-6 col-lg-3">

                    <div class="card">

                        <!-- IMAGE SECTION -->
                        <div class="imgBx">
                            <img src="<?= base_url('uploads/products/'.$p->image); ?>" alt="<?= $p->product_name; ?>">
                        </div>

                        <!-- CONTENT SECTION -->
                        <div class="contentBx">

                            <h2><?= $p->product_name; ?></h2>

                            <!-- PRICE (replaces size/color section) -->
                            <div class="price">
                                ₱<?= number_format($p->price,2); ?>
                            </div>

                            <!-- BUTTON -->
                            <a href="javascript:void(0);"
                            onclick="openCartModal(<?= $p->product_id; ?>, '<?= $p->product_name; ?>', <?= $p->price; ?>, '<?= $p->image; ?>')">
                                Add to Cart
                            </a>

                        </div>

                    </div>

                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<!-- modal para add to cart -->
 <div class="modal fade" id="cartModal" tabindex="-1">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content bg-dark text-white">

      <div class="modal-header">
        <h5 class="modal-title">Add to Cart</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">

        <img id="cartImage"
             style="width:150px; height:150px; object-fit:cover; border-radius:10px;"
             class="mb-3">

        <h5 id="cartProductName"></h5>

        <p class="text-light" id="cartPrice"></p>

        <label>Quantity</label>
        
        <input type="number" id="cartQty" class="qty-modern" min="1" value="1">

        <input type="hidden" id="cartProductId">

       <div class="size-group">
            <input type="radio" id="small" name="size" value="small">
            <label for="small">S</label>

            <input type="radio" id="medium" name="size" value="medium">
            <label for="medium">M</label>

            <input type="radio" id="large" name="size" value="large">
            <label for="large">L</label>
        </div>

      </div>

      <div class="modal-footer">

        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        <button class="btn btn-success" onclick="addToCart()">
            Add to Cart
        </button>

      </div>

    </div>

  </div>

</div>
<!-- end -->

<script>

    function openCartModal(id, name, price, image){

        $('#cartProductId').val(id);
        $('#cartProductName').text(name);
        $('#cartPrice').text("₱" + price);

        $('#cartImage').attr('src', "<?= base_url('uploads/products/'); ?>" + image);

        $('#cartQty').val(1);

        // var modal = new bootstrap.Modal(document.getElementById('cartModal'));
        // modal.show();

        $('#cartModal').modal('show');
    }

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

    function addToCart(){

        var product_id = $('#cartProductId').val();
        var qty = $('#cartQty').val();
        var size = $('input[name="radioDefault"]:checked').val();

        $.ajax({
            url: "<?= base_url('products/add_to_cart'); ?>",
            type: "POST",
            data: {
                product_id: product_id,
                qty: qty,
                size: size
            },
            dataType: "json",

            success: function(res)
            {
                if(res.status == "success")
                {
                    swal("Success", res.message, "success");

                    // var modal = bootstrap.Modal.getInstance(
                    //     document.getElementById('cartModal')
                    // );
                    // modal.hide();

                    $('#cartModal').modal('hide');
                }
                else
                {
                    swal("Error", res.message, "error");
                }
            }
        });
    }

</script>