<?php
session_start();
require_once 'include/database_connection.php';

if (isset($_POST['signup']) && isset($_SESSION['selected_tags'])) {
    // Kiểm tra đầy đủ thông tin
    if (!empty($_POST['username']) && !empty($_POST['email']) &&
        !empty($_POST['password']) && !empty($_POST['confirm_password'])) {

        try {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tags = $_SESSION['selected_tags'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 1. Insert user
            $stmt = $pdo->prepare("INSERT INTO user (username, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $password_hash]);

            // 2. Lấy user_id mới nhất
            $userId = $pdo->lastInsertId();

            // 3. Insert tag cho user
            $stmtTag = $pdo->prepare("INSERT INTO user_tag (user_id, tag_id) VALUES (?, ?)");
            foreach ($tags as $tagId) {
                $stmtTag->execute([$userId, $tagId]);
            }

            header('Location: user_profile.html.php');
            exit;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}
else if (isset($_POST['signup'])&& !isset($_SESSION['selected_tags'])) {

     try {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tags = $_SESSION['selected_tags'];

            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 1. Insert user
            $stmt = $pdo->prepare("INSERT INTO user (username, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $password_hash]);
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

}

?>
