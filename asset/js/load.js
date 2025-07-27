document.addEventListener('DOMContentLoaded', function () {

  // Gán sự kiện cho link nội bộ
  document.querySelectorAll('a[href]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      const href = link.getAttribute('href');
      
      // Skip if link doesn't navigate or has special behavior
      if (
        href.startsWith('#') ||
        href.startsWith('javascript:') ||
        link.target === '_blank' ||
        link.hasAttribute('download') ||
        link.onclick ||
        link.getAttribute('onclick') // Skip links with onclick handlers
      ) return;

      // Show loader only for actual navigation
      const loader = document.getElementById('page-loader');
      if (loader) {
        loader.style.display = 'flex';
      }
    });
  });
});
window.addEventListener('pageshow', function () {
  const loader = document.getElementById('page-loader');
  if (loader) {
    loader.style.display = 'none';
  }
});

