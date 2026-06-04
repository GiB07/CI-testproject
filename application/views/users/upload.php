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

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <button class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#productModal">
                        <i class="bi bi-plus"></i> Add Product
                    </button>

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
<!-- modal -->
 <div class="modal fade" id="productModal" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Add Tattoo Product
                </h5>

                <button type="button"
                        class="btn btn-danger close"
                        data-bs-dismiss="modal"
                        style="margin-left: auto;">

                    <span>&times;</span>

                </button>

            </div>

            <form id="productForm" enctype="multipart/form-data">

                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label><strong>Product Name</strong></label>
                        <input type="text" name="product_name" id="product_name" class="form-control" maxlength="100" placeholder="Enter product name" required>
                    </div>

                    <div class="form-group mb-3">
                        <label><strong>Description</strong></label>
                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter product description"></textarea>
                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group mb-3">
                                <label><strong>Price (₱)</strong></label>
                                <input type="number" name="price" id="price" class="form-control" min="0" step="0.01" placeholder="0.00" required>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group mb-3">
                                <label><strong>Stocks</strong></label>
                                <input type="number" name="stocks" id="stocks" class="form-control" min="1" step="1" placeholder="Quantity" required>
                            </div>

                        </div>

                    </div>

                    <div class="form-group mb-3">

                        <label><strong>Product Image</strong></label>

                        <input type="file" name="product_image" id="product_image" class="form-control" accept=".jpg,.jpeg,.png,.webp" required>

                        <small class="text-muted">
                            Allowed: JPG, JPEG, PNG, WEBP
                        </small>

                    </div>

                    <div class="text-center">

                        <img id="imagePreview" src="" style="display:none; max-width:200px; max-height:200px;" class="img-thumbnail">

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="button" class="btn btn-primary" onclick="saveProduct()">
                        Save Product
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
<!-- end modal -->

<script>
function saveProduct()
{
    var product_name = $('#product_name').val().trim();
    var price = $('#price').val();
    var stocks = $('#stocks').val();
    var image = document.getElementById('product_image').files.length;

    if(product_name == '')
    {
        swal("Warning", "Product Name is required.", "warning");
        return false;
    }

    if(price == '' || parseFloat(price) <= 0)
    {
        swal("Warning", "Please enter a valid price.", "warning");
        return false;
    }

    if(stocks == '' || parseInt(stocks) <= 0)
    {
        swal("Warning", "Please enter valid stock quantity.", "warning");
        return false;
    }

    if(image == 0)
    {
        swal("Warning", "Please select a product image.", "warning");
        return false;
    }

    var formData = new FormData(document.getElementById('productForm'));


    $.ajax({
        url: "<?= base_url('products/save_product'); ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",

        success: function(response){

            console.log(response);

            if(response.status == 'success'){

                swal("Success!", response.message, "success");

                document.getElementById('productForm').reset();

                $('#productModal').modal('hide');

            }else{

                swal("Error!", response.message, "error");

            }

        }

    });
}
</script>