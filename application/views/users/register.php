<link href="<?php echo base_url('assets/css/reg_page.css'); ?>" rel="stylesheet">
<div class="auth-page">

    <div class="register-card">

        <div class="brand-section">
            <h1>Get Inked</h1>
            <p>Create your account and start booking tattoos.</p>
        </div>

        <form method="POST" action="<?= base_url('insert_registration'); ?>">

            <div class="row">
                <div class="col-md-4">
                    <div class="input-group-modern">
                        <i class="bi bi-person"></i>
                        <input type="text"
                               name="fname"
                               class="form-control"
                               placeholder="First Name"
                               required>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group-modern">
                        <i class="bi bi-person"></i>
                        <input type="text"
                               name="mname"
                               class="form-control"
                               placeholder="Middle Name">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="input-group-modern">
                        <i class="bi bi-person"></i>
                        <input type="text"
                               name="lname"
                               class="form-control"
                               placeholder="Last Name"
                               required>
                    </div>
                </div>
            </div>

            <div class="input-group-modern">
                <i class="bi bi-phone"></i>
                <input type="tel"
                       name="contact_no"
                       class="form-control"
                       placeholder="Contact Number"
                       required>
            </div>

            <div class="input-group-modern">
                <i class="bi bi-envelope"></i>
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Email Address"
                       required>
            </div>

            <div class="input-group-modern">
                <i class="bi bi-lock"></i>
                <input type="password"
                       id="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       required>
            </div>

            <div class="input-group-modern">
                <i class="bi bi-shield-lock"></i>
                <input type="password"
                       id="re_password"
                       name="re_password"
                       class="form-control"
                       placeholder="Confirm Password"
                       required>
            </div>

            <div id="msg" class="password-msg"></div>

            <button type="submit"
                    id="registerBtn"
                    class="btn-register">
                Create Account
            </button>

            <div class="login-link">
                Already have an account?
                <a href="<?= base_url('users/index'); ?>">
                    Sign In
                </a>
            </div>

        </form>

    </div>

</div>
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/sweetalert.min.js'); ?>"></script>

<script>
    $(document).ready(function(){

        $("#password, #re_password").on("keyup", function(){

            var password = $("#password").val();
            var confirmPassword = $("#re_password").val();

            if(confirmPassword === ""){
                $("#msg").hide();
                $("#registerBtn").prop("disabled", false);
                return;
            }

            if(password !== confirmPassword){

                $("#msg")
                    .show()
                    .removeClass("password-success")
                    .addClass("password-error")
                    .html("✗ Passwords do not match.");

                $("#registerBtn").prop("disabled", true);

            } else {

                $("#msg")
                    .show()
                    .removeClass("password-error")
                    .addClass("password-success")
                    .html("✓ Passwords match.");

                $("#registerBtn").prop("disabled", false);

            }

        });

    });
</script>