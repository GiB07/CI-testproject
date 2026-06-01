<link href="<?php echo base_url('assets/css/modern_ui.css'); ?>" rel="stylesheet">
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

    <!-- LOGIN FORM -->
    <form id="loginForm" action="<?= base_url('users/login'); ?>" method="post">

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
            <a href="#" id="showReset">Forgot Password?</a>
        </div>

        <button type="submit" class="login-btn">
            Login
        </button>

        <div class="links">
            Don't have an account?
            <a href="<?= base_url('register'); ?>">Register</a>
        </div>

    </form>

    <!-- RESET FORM -->
    <form id="resetForm"
          action="<?= base_url('reset'); ?>"
          method="post"
          style="display:none;">

        <h3 style="color:#fff;text-align:center;margin-bottom:20px;">
            Reset Password
        </h3>

        <p style="color:#ddd;text-align:center;margin-bottom:20px;">
            Enter your email address and we'll send reset instructions.
        </p>

        <input
            type="email"
            name="email"
            class="form-control"
            placeholder="Email Address"
            required>

        <button type="submit" class="login-btn">
            Send Reset Link
        </button>

        <div class="links" style="margin-top:15px;">
            <a href="#" id="showLogin">← Back to Login</a>
        </div>

    </form>

</div>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const loginForm = document.getElementById('loginForm');
    const resetForm = document.getElementById('resetForm');

    document.getElementById('showReset').addEventListener('click', function(e){
        e.preventDefault();
        loginForm.style.display = 'none';
        resetForm.style.display = 'block';
    });

    document.getElementById('showLogin').addEventListener('click', function(e){
        e.preventDefault();
        resetForm.style.display = 'none';
        loginForm.style.display = 'block';
    });

});
</script>