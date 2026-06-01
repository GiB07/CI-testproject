<?php
    if (isset($this->session->userdata['logged_in'])) {
    $email = ($this->session->userdata('email'));
    $password = ($this->session->userdata('password'));
    } else {
        echo "<script>alert('You are not logged in. Please login to continue.'); 
            window.location ='".base_url()."masterfile/login'; </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>ZZZ</title>
    <link href="<?php echo base_url('assets/bootstrap5/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/modern_ui.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/dataTables.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet"> 
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet">      
    <link href='<?php echo base_url('assets/css/fullcalendar.min.css'); ?>' rel="stylesheet"/>
    <link href='<?php echo base_url('assets/css/fullcalendar.print.min.css'); ?>' rel="stylesheet"/>
</head>
<!-- <body class="skin-default-dark fixed-layout"> -->
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Reservation System</p>
        </div>
    </div> -->