document.addEventListener('DOMContentLoaded', function () {
    var openModal = document.getElementById('openSchedule');
    var modal = document.getElementById('scheduleDetails');
    

    openSchedule.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent default behavior of the anchor tag
        modal.style.display = 'block';
    });

    // Close the modal when clicking outside of it
    scheduleDetails.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});