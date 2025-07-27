<h2>Ask a Question</h2>
<?php if (!empty($_SESSION['error_message'])): ?>
    <div class="error">Please log in to ask a question.</div>
<?php unset($_SESSION['error_message']); endif; ?>
<form action="question_post_handler.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" required></textarea>
    </div>
    <div>
        <label for="tags">Tags:</label>
        <select id="tags" name="tags[]" multiple required>
            <?php
            require_once 'include/database_connection.php';
            $tags = $pdo->query('SELECT id, tagName FROM tag')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($tags as $tag): ?>
                <option value="<?= htmlspecialchars($tag['id']) ?>"><?= htmlspecialchars($tag['tagName']) ?></option>
            <?php endforeach; ?>
        </select>
        <small>Select one or more tags relevant to your question.</small>
    </div>
    <div>
        <label for="attachment">Attachment (optional):</label>
        <input type="file" id="attachment" name="attachment" accept="image/*,application/pdf">
    </div>
    <div>
        <button type="submit">Submit Question</button>
    </div>
</form> 