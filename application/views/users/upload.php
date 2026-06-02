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

    <div class="modal-dialog modal-lg" role="document">

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

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Stocks</label>
                        <input type="number" name="stocks" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="product_image" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="saveProduct()">Save</button>
                </div>
            </form>

        </div>

    </div>

</div>
<!-- end modal -->

<script>
function saveProduct()
{
    var formData = new FormData(document.getElementById('productForm'));

    $.ajax({
        url: "<?= base_url('products/save_product'); ?>",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",

        beforeSend: function(){

            swal({
                title: "Saving...",
                text: "Please wait..."
            });

        },

        success: function(response){

            console.log(response);

            if(response.status == 'success'){

                swal(
                    "Success!",
                    response.message,
                    "success"
                );

                document.getElementById('productForm').reset();

                $('#productModal').modal('hide');

            }else{

                swal(
                    "Error!",
                    response.message,
                    "error"
                );

            }

        },

        error: function(xhr){

            console.log(xhr.responseText);

            swal(
                "Server Error",
                "Something went wrong.",
                "error"
            );

        }
    });
}
</script>