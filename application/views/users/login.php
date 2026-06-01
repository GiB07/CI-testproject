<link href="<?= base_url('assets/css/modern_ui.css'); ?>" rel="stylesheet">

<div class="auth-page">

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

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Email Address"
                   required>

            <input type="password"
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

            <h3 class="text-center text-white mb-3">
                Reset Password
            </h3>

            <p class="text-center text-light mb-4">
                Enter your email address and we'll send reset instructions.
            </p>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="Email Address"
                   required>

            <button type="submit" class="login-btn">
                Send Reset Link
            </button>

            <div class="links mt-3">
                <a href="#" id="showLogin">← Back to Login</a>
            </div>

        </form>

    </div>

</div>