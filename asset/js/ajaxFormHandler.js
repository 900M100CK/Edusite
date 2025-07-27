function handleAjaxForm(formId, url, onSuccess = () => {}, onError = () => {}, preCheck = null) {
  const form = document.getElementById(formId);
  const loader = document.getElementById('ajax-loader');

  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    // Kiểm tra bổ sung trước khi submit (nếu có)
    if (typeof preCheck === 'function') {
      const valid = preCheck(form);
      if (!valid) return;
    }

    if (loader) loader.style.display = 'flex';

    const formData = new FormData(form);

    fetch(url, {
      method: 'POST',
      body: formData
    })
      .then(response => {
        if (loader) loader.style.display = 'none';

        if (response.ok) {
          onSuccess(response);
        } else {
          alert('Server error.');
          if (onError) onError(response);
        }
      })
      .catch(error => {
        if (loader) loader.style.display = 'none';
        alert('Network error.');
        if (onError) onError(error);
      });
  });
}
