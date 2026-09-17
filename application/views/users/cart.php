<link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet">

<div class="page-wrapper">
    <div class="container-fluid py-1">
        <div class="container-fluid" style="padding: 1px;">

                <div class="col-md-6">
                    <?php
                        $fullname = $this->session->userdata('fullname');
                        $fname = !empty($fullname) ? explode(' ', trim($fullname))[0] : 'User';
                    ?>

                    <div class="glass-welcome">
                        <h2 class="dashboard-title mb-1">
                            Welcome Back,
                            <span class="user-name">
                                <?= ucwords($fname); ?>
                            </span>
                        </h2>
                    </div>

                    <p class="dashboard-subtitle mb-0">
                        Manage your freshly brewed coffee shop reservations.
                    </p>
                </div>

            <div class="row">

                <div class="col-md-12">

                    <div class="product-container">

                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

                            <div>
                                <h2 style="margin:0;color:#fff;font-weight:600;">
                                    <i class="bi bi-cart3"></i> Orders
                                </h2>

                                <p style="margin:5px 0 0;color:rgba(255,255,255,.7);">
                                    Your pending orders
                                </p>
                            </div>

                            <a href="<?= base_url('users/dashboard'); ?>" 
                                class="btn btn-md glass-btn btn-info">
                                <i class="bi bi-shop"></i> Continue Shopping
                            </a>

                        </div>

                        <div style="background:rgba(255,255,255,.95);border-radius:15px;padding:20px;">
<div class="table-responsive">
                            <table id="cartTable" class="table ios27-table">

                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">#</th>
                                        <th class="text-center" style="width: 20%;">Product</th>
                                        <th class="text-center" style="width: 10%;">Price</th>
                                        <th class="text-center" style="width: 5%;">Quantity</th>
                                        <th class="text-center" style="width: 10%;">Total Amount</th>
                                        <th class="text-center" style="width: 15%;">Added By</th>
                                        <th class="text-center" style="width: 15%;">Date</th>
                                        <th class="text-center" style="width: 10%;">Status</th>
                                        <th class="text-center" style="width: 10%;">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $count = 1;

                                    foreach ($orders as $value):

                                        if($value->status == 'Pending'):
                                            $tag = '<center><button type="button" class="btn ios-status pending" style="padding: 1px 3px; font-size: 12px;">Pending</button></center>';
                                        elseif($value->status == 'Removed'):
                                            $tag = '<center><button type="button" class="btn ios-status removed" style="padding: 1px 3px; font-size: 12px;">Removed</button></center>';
                                        elseif($value->status == 'Released'):
                                            $tag = '<center><button type="button" class="btn ios-status released" style="padding: 1px 3px; font-size: 12px;">Released</button></center>';
                                        endif;

                                        echo '<tr>';
                                        echo '<td class="text-center">'.$count.'</td>';
                                        echo '<td class="product" style="text-align:center;font-size: 14px;">'.htmlspecialchars($value->name).'</td>';
                                        echo '<td class="price" style="text-align:center;font-size: 14px;">₱'.number_format($value->price, 2).'</td>';
                                        echo '<td class="qty" style="text-align:center;font-size: 14px;">'.$value->qty.'</td>';
                                        echo '<td class="total_amount" style="text-align:center;font-size: 14px;">₱'.number_format($value->total_amount, 2).'</td>';
                                        echo '<td class="added_by" style="text-align:center;font-size: 14px;">'.htmlspecialchars($value->added_by).'</td>';
                                        echo '<td class="created_at" style="text-align:center;font-size: 14px;">'.date('M d, Y h:i A', strtotime($value->created_at)).'</td>';
                                        echo '<td class="status" style="text-align:center;">'.$tag.'</td>';
                                        echo '<td style="padding: 3px 3px;text-align:center;">';
                                        echo '<button type="button" class="btn ios-action edit" style="padding: 1px 10px; font-size: 14px;" onclick=edit("")><i class="bi bi-pencil" style="color: black;"></i></button>';
                                        echo '&nbsp;';
                                        if ($value->status == 'Removed') {
                                            echo '<button type="button" class="btn ios-action undo" style="padding: 1px 10px; font-size: 14px;" onclick="undo('.$value->order_id.')"><i class="bi bi-arrow-counterclockwise" style="color: black;"></i></button>';
                                        } else {
                                            echo '<button type="button" class="btn ios-action remove" style="padding: 1px 10px; font-size: 14px;" onclick="remove('.$value->order_id.')"><i class="bi bi-trash" style="color: black;"></i></button>';
                                        }
                                        echo '</td>';
                                        echo '</tr>';

                                        $count++;

                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#cartTable").DataTable({

                order: [[ 0, 'asc' ]],
                lengthMenu: [ [8, 25, 50, -1], [8, 25, 50, "All"] ]

            });

        });

        function remove(id) {

            swal({
                title: "Are you sure?",
                text: "Once removed, you will be able to recover this order.",
                icon: "warning",
                buttons: ["Cancel", "Yes, remove it"],
                dangerMode: true
            }).then(function(isConfirm) {

                if (isConfirm) {

                    $.ajax({
                        url: "<?php echo base_url('remove_order'); ?>",
                        type: "POST",
                        data: { id: id },

                        success: function(data) {

                            console.log("Success:", data);

                            if ($.trim(data) == "success") {

                                swal(
                                    "Success",
                                    "The order has been removed successfully.",
                                    "success"
                                );

                                setTimeout(function() {
                                    location.reload();
                                }, 1200);

                            } else {

                                swal(
                                    "Error",
                                    "Failed to remove the order. Please try again.",
                                    "error"
                                );

                            }

                        },

                        error: function(xhr, status, error) {

                            console.error("Error:", error);

                            swal(
                                "Error",
                                "Something went wrong while removing the order.",
                                "error"
                            );

                        }

                    });

                }

            });

        }

        function undo(id) {

            swal({
                title: "Are you sure?",
                text: "You want to recover this order?",
                icon: "warning",
                buttons: ["Cancel", "Yes, undo it"],
                dangerMode: true
            }).then(function(isConfirm) {

                if (isConfirm) {

                    $.ajax({
                        url: "<?php echo base_url('undo_order'); ?>",
                        type: "POST",
                        data: {id: id},

                        success: function(data) {

                            console.log("Success:", data);

                            if ($.trim(data) == "success") {

                                swal(
                                    "Success",
                                    "The order has been undone successfully.",
                                    "success"
                                );

                                setTimeout(function() {
                                    location.reload();
                                }, 1200);

                            } else {

                                swal(
                                    "Error",
                                    "Failed to undo the order. Please try again.",
                                    "error"
                                );

                            }
                        },

                        error: function(xhr, status, error) {

                            console.error("Error:", error);

                            swal(
                                "Error",
                                "Something went wrong while undoing the order.",
                                "error"
                            );
                        }
                    });

                }

            });

        }
    </script>



