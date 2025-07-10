<?php 
session_start();
include 'include/database_connection.php';

// Xử lý khi submit chọn tag
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tags']) && is_array($_POST['tags'])) {
    $_SESSION['selected_tags'] = array_map('intval', $_POST['tags']);
    header('Location: signup.php');
    exit();
}

// Lấy danh sách tag
$sql_tags = "SELECT id, tagName FROM tag";
$tag_select = $pdo->query($sql_tags);

// Kiểm tra nếu chưa chọn tag thì hiện modal
$showTagModal = !isset($_SESSION['selected_tags']) || empty($_SESSION['selected_tags']);

// Hiển thị giao diện home
include 'templates/header.html.php';
echo '<h2 style="text-align:center;">Chào mừng đến trang Home!</h2>';

// Hiển thị modal nếu cần
include 'templates/tag_modal.php';
if ($showTagModal) {
    echo "<script>window.onload = function() { showTagModal(); };</script>";
}

include 'templates/footer.html.php';
?>