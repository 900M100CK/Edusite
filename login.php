<?php
session_start(); // Start the session to access session variables
$pageTitle = 'Login'; // Set the page title
include 'templates/header.html.php';
include 'templates/sidebar.html.php';
include 'templates/tag_modal.php';
?>
<main id="login-form-container" class="main-content site-container">
  <div class="login-container">
    <?php if (isset($_SESSION['error_message'])): ?>
      <div class="alert-login-to-ask-question">
        <p class="alert-message">You must be logged in to ask a question</p>
        <p>You can log in below or <a href="signup.php">sign up</a>.</p>
      </div>
      <?php unset($_SESSION['error_message']); ?>
    <?php
    endif;
    ?>
        <h2><?php echo $pageTitle; ?></h2>
        <form action="login.php" method="POST" class="login-form" id="login-form">
          <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder="Enter your username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <div class="password-wrapper">
              <input type="password" id="password" name="password" placeholder="Enter your password" oninput="validatePassword()" required>
              <i class='bx bx-eye-closed toggle-password' onclick="togglePassword(this)"></i>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-login-form">Log In</button>
          </div>
        </form>
      </div>

    </main>
    <script src="js/check_password.js"></script>
    <script src="js/app.js"></script>