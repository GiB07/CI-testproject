<link href="<?php echo base_url(); ?>assets/css/reg_page.css" rel="stylesheet">
<div class="register-card">

    <div class="left-side"></div>

    <div class="right-side">

        <h1>Create Account</h1>
        <p class="subtitle">Join Get Inked Tattoo Shop</p>

        <div class="password-msg" id="msg"></div>

        <form method="POST" action="<?= base_url('insert_registration'); ?>">

            <div class="form-group">
                <input type="text" name="fname" class="form-control" placeholder="First Name" required>
            </div>

            <div class="form-group">
                <input type="text" name="mname" class="form-control" placeholder="Middle Name">
            </div>

            <div class="form-group">
                <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
            </div>

            <div class="form-group">
                <input type="tel" name="contact_no" class="form-control" placeholder="Contact Number" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="form-group">
                <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Confirm Password" required>
            </div>

            <button type="submit" id="registerBtn" class="btn-register">
                Register
            </button>

            <div class="login-link">
                Already have an account?
                <a href="<?= base_url('users/index'); ?>">
                    Login
                </a>
            </div>

        </form>

    </div>

</div>
<script>
const password = document.getElementById('password');
const confirmPassword = document.getElementById('re_password');
const msg = document.getElementById('msg');
const registerBtn = document.getElementById('registerBtn');

function validatePassword() {

    if(confirmPassword.value === '') {
        msg.style.display = 'none';
        registerBtn.disabled = false;
        return;
    }

    if(password.value !== confirmPassword.value){

        msg.style.display = 'block';
        msg.className = 'password-msg password-error';
        msg.innerHTML = 'Passwords do not match.';
        registerBtn.disabled = true;

    }else{

        msg.style.display = 'none';
        registerBtn.disabled = false;

    }
}

password.addEventListener('input', validatePassword);
confirmPassword.addEventListener('input', validatePassword);
</script>