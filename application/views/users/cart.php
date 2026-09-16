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

                            <table id="cartTable" class="table table-striped table-bordered">

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

                                        echo '<tr>';
                                        echo '<td class="text-center">'.$count.'</td>';
                                        echo '<td class="product" style="text-align:center;">'.htmlspecialchars($value->name).'</td>';
                                        echo '<td class="price" style="text-align:center;">₱'.number_format($value->price, 2).'</td>';
                                        echo '<td class="qty" style="text-align:center;">'.$value->qty.'</td>';
                                        echo '<td class="total_amount" style="text-align:center;">₱'.number_format($value->total_amount, 2).'</td>';
                                        echo '<td class="added_by" style="text-align:center;">'.htmlspecialchars($value->added_by).'</td>';
                                        echo '<td class="created_at" style="text-align:center;">'.date('M d, Y h:i A', strtotime($value->created_at)).'</td>';
                                        echo '<td class="status" style="text-align:center;">'.$value->status.'</td>';
                                        echo '<td style="padding: 3px 3px;text-align:center;">';
                                        echo '<button type="button" class="btn btn-md glass-btn btn-warning" style="padding: 1px 10px; font-size: 14px;" onclick=edit("")><i class="bi bi-pencil" style="color: black;"></i></button>';
                                        echo '&nbsp;';
                                        echo '<button type="button" class="btn btn-md glass-btn btn-danger" style="padding: 1px 10px; font-size: 14px;" onclick=remove("")><i class="bi bi-trash" style="color: black;"></i></button>';
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
    <script type="text/javascript">
        $(document).ready(function() {

            $("#cartTable").DataTable({

                order: [[ 0, 'asc' ]],
                lengthMenu: [ [8, 25, 50, -1], [8, 25, 50, "All"] ]

            });

        });
    </script>
    <style>
        .transparent-red-btn {
            /* Pure red (255, 0, 0) with 40% opacity */
            background-color: rgba(255, 0, 0, 0.4); 
            color: white;
            border: 2px solid #ff0000;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Darkens slightly when hovered */
        .transparent-red-btn:hover {
            background-color: rgba(255, 0, 0, 0.7); 
        }
        </style>



