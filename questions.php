<?php
$pageTitle = "Questions";
ob_start();
include 'templates/questions.html.php';
include 'templates/tag_modal.php';
$contentView = ob_get_clean();
include 'templates/layout.html.php';
?>