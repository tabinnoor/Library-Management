document.addEventListener('DOMContentLoaded', function () {
  console.log("✅ JavaScript loaded and running!");

  initDeleteConfirmation();
});


 // Confirm before deleting any item with a `data-confirm` attribute.
 
function initDeleteConfirmation() {
  const deleteForms = document.querySelectorAll('form[data-confirm]');
  deleteForms.forEach(form => {
    form.addEventListener('submit', function (event) {
      const message = form.getAttribute('data-confirm') || "Are you sure?";
      if (!confirm(message)) {
        event.preventDefault();
      }
    });
  });
}
