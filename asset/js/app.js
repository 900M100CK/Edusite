document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebar-toggle');
    const closeBtn = document.getElementById('sidebar-close');

    // Function to open sidebar
    function openSidebar() {
        sidebar.classList.add('open');
        toggle.setAttribute('aria-expanded', 'true');
    }

    // Function to close sidebar
    function closeSidebar() {
        sidebar.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
    }

    if (toggle && sidebar) {
        // Toggle sidebar when hamburger is clicked
        toggle.addEventListener('click', function() {
            if (sidebar.classList.contains('open')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        });

        // Close sidebar when close button is clicked
        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                closeSidebar();
            });
        }

        // Close sidebar when clicking outside
        document.addEventListener('click', function(e) {
            if (sidebar.classList.contains('open') && 
                !sidebar.contains(e.target) && 
                !toggle.contains(e.target)) {
                closeSidebar();
            }
        });

        // Close sidebar when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && sidebar.classList.contains('open')) {
                closeSidebar();
            }
        });
    }
});



