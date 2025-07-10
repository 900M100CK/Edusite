<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
$pageTitle = 'Sign Up';
include 'templates/header.html.php'; // Path to the file with the login form
include 'templates/sidebar.html.php';
include 'templates/tag_modal.php';
?>

<main id="signup-form-container" class="site-container main-content">
    <div class="signup-container">
        <h2>Create your account</h2>
        <form action="signup_process.php" method="POST" class="signup-form" id="signup-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
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
<script src="js/check_password.js?v=<?= time(); ?>">document.getElementById("signup-form").addEventListener("submit", function(event) {
    if (!validatePassword()) {
        event.preventDefault(); // Dừng form nếu password không hợp lệ
    }
});
</script>
<script src="js/app.js?v=<?= time(); ?>"></script>