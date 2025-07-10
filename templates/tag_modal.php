<?php
include 'include/database_connection.php';
$sql_tags = "SELECT id, tagName FROM tag";
$tag_select = $pdo->query($sql_tags);
?>
<div id="tagModal" class="modal-tag">
  <div class="modal-tag-content">
    <span class="modal-tag-close" id="closeTagModal">&times;</span>
    <h3 style="margin-top:0;">Choose Tags to follow</h3>
    <form method="post" action="" id="tagForm">
      <div class="form-group" style="margin-bottom: 16px;">
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
          <p>don't have any tags</p>
        <?php endif; ?>
      </div>
      <div style="text-align:right;">
        <button type="submit" name="submit_tag" class="btn btn-primary" >Save your follow tags</button>
      </div>
    </form>
  </div>
</div>
<script src="js/ajaxFormHandler.js"></script>
<script>
handleAjaxForm(
  'tagForm',
  'selection_tag.php',
  () => {
    alert('Tags saved!');
    document.getElementById('tagModal').style.display = 'none';
    window.location.href ='signup.php';
  },
  null,
  function (form) {
    const checked = form.querySelectorAll('input[name="tags[]"]:checked');
    if (checked.length === 0) {
      alert("Please select at least one tag.");
      return false;
    }
    return true;
  }
);
</script>

