<?php
session_start();
require 'include/database_connection.php';

$userId = $_SESSION['user_id'] ?? null;
if (!$userId) {
    header('Location: login.php');
    exit;
}

$user = $pdo->prepare("SELECT username, avatar FROM user WHERE id = ?");
$user->execute([$userId]);
$user = $user->fetch();

$tags = $pdo->prepare("
    SELECT tagName FROM tag
    JOIN user_tag ON tag.id = user_tag.tag_id
    WHERE user_tag.user_id = ?
");
$tags->execute([$userId]);
$userTags = $tags->fetchAll(PDO::FETCH_COLUMN);
?>

<h2>Welcome, <?= htmlspecialchars($user['username']) ?></h2>
<img src="<?= htmlspecialchars($user['avatar'] ?? 'default.png') ?>" alt="Avatar" width="120"><br>
<p>Your interests:</p>
<ul>
  <?php foreach ($userTags as $tag): ?>
    <li><?= htmlspecialchars($tag) ?></li>
  <?php endforeach; ?>
</ul>
    