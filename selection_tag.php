<?php
session_start();
include 'include/database_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tags'])) {
    $_SESSION['selected_tags'] = $_POST['tags'];
    http_response_code(200); // OK
    exit;
} else {
    http_response_code(400); // Bad request
    echo 'Invalid request';
}
