<main id="login-form-container" class="main-content site-container">
  <div class="login-container">
    <?php if (isset($_SESSION['error_message'])): ?>
      <div class="alert-login-to-ask-question">
        <p class="alert-message">You must be logged in to ask a question</p>
        <p>You can log in below or <a href="signup.php">sign up</a>.</p>
      </div>
      <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>
    
    <h2><?php echo $pageTitle; ?></h2>
    <form action="login_process.php" method="POST" class="login-form" id="login-form">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <div class="password-wrapper">
          <input type="password" id="password" name="password" placeholder="Enter your password" oninput="validatePassword()" required>
          <i class='bx bx-eye-closed toggle-password' onclick="togglePassword(this)"></i>
          <?php if ($error): ?>
            <span id="error-message"><?=htmlspecialchars($error); ?></span>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-login-form">Log In</button>
      </div>
    </form>
  </div>
</main>

<script src="asset/jscheck_password.js"></script>
<script src="asset/jsapp.js"></script>
<script src="asset/jsajaxFormHandler.js?v=<?= time(); ?>"></script>
<script>
  handleAjaxForm('login-form', 'login_process.php', (response) => {
    if (response.success) {
      document.getElementById('login-form').style.display = 'none';
      alert('Login successful!');
      window.location.href = response.redirect || 'home.php';
    }
  }, (error) => {
    console.error('Login error:', error);
    // Show error message to user
    const errorElement = document.getElementById('error-message');
    if (errorElement) {
      errorElement.textContent = error.error || 'Login failed';
    }
  });
</script>