
<main id="signup-form-container" class="site-container main-content">
    <div class="signup-container">
        <h2>Create your account</h2>
        <form action="" method="POST" class="signup-form" id="signup-form">
            <form action="" method="POST" class="signup-form" id="signup-form">
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" 
                       pattern="[a-zA-Z0-9_]{3,50}" title="3-50 characters, letters, numbers, and underscores only" required>
                <div class="error-message" id="username-error"></div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <div class="error-message" id="email-error"></div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" placeholder="Enter your password" oninput="validatePassword()" required>
                    <i class='bx bx-eye-closed toggle-password' onclick="togglePassword(this)"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm password</label>
                <div class="confirm-password-wrapper">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password again" oninput="validatePassword()" required>
                    <i class='bx bx-eye-closed toggle-password' onclick="togglePassword(this)"></i>
                </div>
                <span id="error-message"></span>
            </div>
            <div class="form-group">

                <div id="popover-password">
                    <p><span id="result"></span></p>
                    <div class="progress">
                        <div id="password-strength"
                            class="progress-bar"
                            role="progressbar"
                            aria-valuenow="40"
                            aria-valuemin="0"
                            aria-valuemax="100"
                            style="width:0%">
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li class="">
                            <span class="low-upper-case">
                                <i class="fas fa-circle" aria-hidden="true"></i>
                                &nbsp;Lowercase &amp; Uppercase
                            </span>
                        </li>
                        <li class="">
                            <span class="one-number">
                                <i class="fas fa-circle" aria-hidden="true"></i>
                                &nbsp;Number (0-9)
                            </span>
                        </li>
                        <li class="">
                            <span class="one-special-char">
                                <i class="fas fa-circle" aria-hidden="true"></i>
                                &nbsp;Special Character (!@#$%^&*)
                            </span>
                        </li>
                        <li class="">
                            <span class="eight-character">
                                <i class="fas fa-circle" aria-hidden="true"></i>
                                &nbsp;Atleast 8 Character
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-signup-form" id="signup-btn" name="signup">Sign up</button>
            </div>
            <div class="form-group">
                <p class="login-link">Already have an account?<a href="login.php">Log in</a></p>
            </div>
        </form>
    </div>
</main>
<script src="asset/js/check_password.js?v=<?= time(); ?>"></script>
<script src="asset/js/app.js?v=<?= time(); ?>"></script>
<script src="asset/js/ajaxFormHandler.js?v=<?= time(); ?>"></script>
<script>
handleAjaxForm('signup-form', 'signup_process.php', () => {
  document.getElementById('signup-form').style.display = 'none';
  alert('Sign up successfully!');
  window.location.replace('profile_setup.php');
});
</script>