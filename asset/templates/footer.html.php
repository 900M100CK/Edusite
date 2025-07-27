    <footer class="footer">
        <div class="container">
            <div class="footer-about">
                <h3>About EduSite</h3>
                <p>Providing quality online education to students worldwide. Join our community and start learning today!</p>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="terms.php">Terms of Service</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Connect With Us</h3>
                <a href="#" aria-label="Connect on Facebook">Facebook</a>
                <a href="#" aria-label="Connect on Twitter">Twitter</a>
                <a href="#" aria-label="Connect on LinkedIn">LinkedIn</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date("Y"); ?> My Education Website. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        window.addEventListener('load', function() {
            var loader = document.getElementById('loading-screen');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 400); // Smooth fade out
            }
        });
    </script>
    </body>

    </html>