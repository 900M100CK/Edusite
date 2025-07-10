<nav class="vertical-nav" id="sidebar">
    <button class="sidebar-close" id="sidebar-close" aria-label="Close sidebar">
        <span>&times;</span>
    </button>
    <ul>
        <!-- Note: The 'active' class will be dynamically added in a real app -->
        <li><a href="#" aria-label="Home" onclick="showTagModal(); return false;">Home</a></li>
        <li><a href='questions.php' aria-label="Questions" class="active">Questions</a></li>
        <li><a href="tags.php" aria-label="Tags">Tags</a></li>
    </ul>
</nav>
<script src="js/modal.js?v=<?= time(); ?>"></script>