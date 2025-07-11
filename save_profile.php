<?php
session_start();
require 'include/database_connection.php';

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header('Location: login.php');
    exit;
}

// Lưu avatar
if (!empty($_FILES['avatar']['name'])) {
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $avatarPath = 'uploads/avatars/' . uniqid('avatar_') . '.' . $ext;
    move_uploaded_file($_FILES['avatar']['tmp_name'], $avatarPath);

    $stmt = $pdo->prepare("UPDATE user SET avatar = ? WHERE id = ?");
    $stmt->execute([$avatarPath, $userId]);
}

// Cập nhật tag
if (isset($_POST['tags'])) {
    $pdo->prepare("DELETE FROM user_tag WHERE user_id = ?")->execute([$userId]);

    $stmt = $pdo->prepare("INSERT INTO user_tag (user_id, tag_id) VALUES (?, ?)");
    foreach ($_POST['tags'] as $tagId) {
        $stmt->execute([$userId, $tagId]);
    }
}

header('Location: profile.php'); // hoặc dashboard
exit;
