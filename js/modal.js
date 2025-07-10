// Modal logic

function showTagModal() {
  document.getElementById('tagModal').style.display = 'block';
}
function hideTagModal() {
  document.getElementById('tagModal').style.display = 'none';
}
document.addEventListener('DOMContentLoaded', function() {
  var closeBtn = document.getElementById('closeTagModal');
  if (closeBtn) {
    closeBtn.onclick = hideTagModal;
  }
  // Đóng modal khi click ra ngoài
  window.onclick = function(event) {
    var modal = document.getElementById('tagModal');
    if (event.target == modal) {
      hideTagModal();
    }
  }
});


