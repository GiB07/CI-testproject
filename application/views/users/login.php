<link href="<?php echo base_url(); ?>assets/css/modern_ui.css" rel="stylesheet">
<div class="login-card">

    <div class="logo">
        <h1>Get Inked!</h1>
        <p>We Ink Whatever You Think</p>
    </div>

    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert-error">
            <?= $this->session->flashdata('error_msg'); ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('users/login'); ?>" method="post">

        <input
            type="email"
            name="email"
            class="form-control"
            placeholder="Email Address"
            required>

        <input
            type="password"
            name="password"
            class="form-control"
            placeholder="Password"
            required>

        <div class="forgot-link">
            <a href="<?= base_url('reset'); ?>">Forgot Password?</a>
        </div>

        <button type="submit" class="login-btn">
            Login
        </button>

        <div class="links">
            <p>
                Don't have an account?
                <a href="<?= base_url('register'); ?>">Register</a>
            </p>
        </div>

    </form>

</div>