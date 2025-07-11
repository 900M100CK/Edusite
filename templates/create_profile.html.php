<?php
session_start();
require_once 'include/database_connection.php';

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header('Location: login.php');
    exit;
}

// Lấy danh sách tag đã lưu của user (nếu có)
$stmt = $pdo->prepare("SELECT tag_id FROM user_tag WHERE user_id = ?");
$stmt->execute([$userId]);
$selectedTags = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Lấy toàn bộ tag
$allTags = $pdo->query("SELECT id, tagName FROM tag")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Profile</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Nếu có -->
    <style>
        .form-group {
            margin-bottom: 16px;
        }

        .tag-list label {
            margin-right: 10px;
            display: inline-block;
        }

        .avatar-preview img {
            max-width: 120px;
            border-radius: 50%;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Create Your Profile</h2>

        <?php if (empty($selectedTags)): ?>
            <div class="alert alert-warning" style="color: #d35400;">
                You haven't selected any tags yet. Please choose your interests below.
            </div>
        <?php endif; ?>

        <form action="save_profile.php" method="post" enctype="multipart/form-data">
            <!-- Upload Avatar -->
            <div class="form-group">
                <label for="avatar">Upload Avatar:</label>
                <input type="file" name="avatar" id="avatar" accept="image/*" onchange="previewAvatar(event)">
                <div class="avatar-preview" id="avatar-preview"></div>
            </div>

            <!-- Tag selection -->
            <div class="form-group">
                <label>Select your interested tags:</label>
                <div class="tag-list">
                    <?php foreach ($allTags as $tag): ?>
                        <label>
                            <input type="checkbox" name="tags[]" value="<?= $tag['id'] ?>"
                                <?= in_array($tag['id'], $selectedTags) ? 'checked' : '' ?>>
                            <?= htmlspecialchars($tag['tagName']) ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Profile</button>
        </form>
    </div>

    <script>
        function previewAvatar(event) {
            const output = document.getElementById('avatar-preview');
            output.innerHTML = '';
            const file = event.target.files[0];
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                output.appendChild(img);
            }
        }
    </script>
</body>

</html>