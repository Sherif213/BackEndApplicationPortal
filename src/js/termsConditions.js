document.addEventListener('DOMContentLoaded', function () {
    var openModal = document.getElementById('openModal');
    var modal = document.getElementById('modal');
    

    openModal.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default behavior of the anchor tag
        modal.style.display = 'block';
    });

    // Close the modal when clicking outside of it
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});