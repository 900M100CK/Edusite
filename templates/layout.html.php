<?php include 'templates/header.html.php'; // Include the header template 
?>
<!-- Main Site Container -->

<div id="page-loader" >
    <div class="loader"></div>
</div>

<div id="ajax-loader">
    <div class="loader"></div>
</div>

<div class="site-container">

    <!-- Vertical Navigation Sidebar -->
    <aside class="sidebar">
        <?php include 'templates/sidebar.html.php'; // Include the sidebar template 
        ?>
    </aside>

    <!-- Main Content Area where page-specific views are loaded -->
    <main id="main-content" class="main-content-area">
        <?= $contentView; ?>
    </main>
</div>
<script src="js/load.js?v=<?= time(); ?>"></script>
<script src="js/modal.js?v=<?= time(); ?>"></script>
<script src="js/app.js?v=<?= time(); ?>"></script>
<?php include 'templates/footer.html.php'; // Include the footer template 
?>