<?php

session_start();
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['error_message'] = true;
    header("Location: login.php");
    exit();

}

$pageTitle = "Ask a Question";
ob_start();
include 'templates/ask_question.html.php';
$contentView = ob_get_clean();
include 'templates/layout.html.php';

?>