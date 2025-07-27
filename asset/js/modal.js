// JavaScript for Modal
let lastFocusedElement
function showTagModal() {
    lastFocusedElement = document.activeElement;
    const modal = document.getElementById('tagModal');
    modal.style.display = 'block';
    document.body.style.overflow = 'hidden'; // Disable background scroll

    const firstInput = modal.querySelector('.form-check-input');
    if (firstInput) {
        firstInput.focus();
    } else {
        const noTagsMessage = modal.querySelector('p[role="alert"]');
        if (noTagsMessage) {
            noTagsMessage.focus();
        } else {
            const saveButton = modal.querySelector('button.btn.btn-primary');
            if (saveButton) saveButton.focus();
        }
    }

    document.addEventListener('keydown', trapTabKey);
    document.addEventListener('keydown', handleEscapeKey);
}

function hideTagModal() {
    const modal = document.getElementById('tagModal');
    modal.style.display = 'none';
    document.body.style.overflow = ''; // Restore scroll
    document.removeEventListener('keydown', trapTabKey);
    document.removeEventListener('keydown', handleEscapeKey);
    if (lastFocusedElement) {
        lastFocusedElement.focus();
    }
}

function handleEscapeKey(e) {
    if (e.key === 'Escape') {
        hideTagModal();
    }
}

function trapTabKey(e) {
    const modal = document.getElementById('tagModal');
    if (!modal || modal.style.display !== 'block') return;

    const focusableSelectors = 'a[href], area[href], input:not([disabled]):not([type="hidden"]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex]:not([tabindex="-1"])';
    const focusableElements = Array.from(modal.querySelectorAll(focusableSelectors)).filter(el => el.offsetParent !== null);

    if (focusableElements.length === 0) return;

    const first = focusableElements[0];
    const last = focusableElements[focusableElements.length - 1];

    if (e.key === 'Tab') {
        if (e.shiftKey) {
            if (document.activeElement === first) {
                e.preventDefault();
                last.focus();
            }
        } else {
            if (document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const closeBtn = document.getElementById('closeTagModal');
    if (closeBtn) {
        closeBtn.onclick = hideTagModal;
        closeBtn.onkeydown = function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                hideTagModal();
            }
        };
    }

    const modalContent = document.querySelector('.modal-tag-content');
    if (modalContent) {
        modalContent.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    }

    window.onclick = function(event) {
        const modal = document.getElementById('tagModal');
        if (event.target === modal) {
            hideTagModal();
        }
    };

    // Example: Sidebar "Home" item listener
    const homeItem = document.querySelector('#homeSidebarItem'); // Adjust selector
    if (homeItem) {
        homeItem.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                showTagModal();
            }
        });
    }
});