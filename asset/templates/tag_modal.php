<?php
include 'include/database_connection.php';
try {
    $sql_tags = "SELECT id, tagName FROM tag";
    $tag_select = $pdo->query($sql_tags);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>
<div id="tagModal" class="modal-tag" role="dialog" aria-modal="true" aria-labelledby="tagModalTitle">
    <div class="modal-tag-content">
        <h3 id="tagModalTitle" style="margin-top:0;">Choose Tags to follow</h3>
        <span class="modal-tag-close" id="closeTagModal" role="button" tabindex="0" aria-label="Close tag selection modal">&times;</span>
        <form method="post" action="" id="tagForm" aria-live="polite" aria-relevant="all">
            <div class="form-group" style="margin-bottom: 16px;" >
                <?php if (isset($tag_select) && $tag_select->rowCount() > 0): ?>
                    <?php foreach ($tag_select as $tag): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tags[]" value="<?php echo $tag['id']; ?>" id="tag_<?php echo $tag['id']; ?>">
                            <label class="form-check-label" for="tag_<?php echo $tag['id']; ?>">
                                <?php echo htmlspecialchars($tag['tagName']); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align:center;" tabindex="0" role="alert">don't have any tags</p>
                <?php endif; ?>
            </div>
            <div style="text-align:right;">
                <button type="submit" name="submit_tag" class="btn btn-primary">Save your follow tags</button>
            </div>
        </form>
    </div>
</div>
<script src="asset/js/ajaxFormHandler.js"></script>
<script>
handleAjaxForm('tagForm', 'selection_tag.php', (response) => {
    document.getElementById('tagModal').style.display = 'none';
    alert('Tags saved successfully!');
    setTimeout(() => {
        window.location.href = 'signup.php'; // Redirect to profile page after saving tags
    }, 2000);
}, (error) => {
    console.error('Form submission error:', error);
    alert('Failed to save tags. Please try again.');
});
</script>