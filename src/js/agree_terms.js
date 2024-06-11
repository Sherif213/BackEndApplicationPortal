$(document).ready(function() {
    // Disable the checkbox initially
    $("#agreeCheckbox").prop("disabled", true);

    // Function to open the modal when the link is clicked
    $("#openModal").click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        $("#modal").show(); // Show the modal
        // Enable the checkbox
        $("#agreeCheckbox").prop("disabled", false);
    });

    // Function to close the modal when the close button is clicked
    $("#closeModal").click(function() {
        $("#modal").hide(); // Hide the modal
    });

    // Function to disable the submit button until the checkbox is checked
    $("#agreeCheckbox").change(function() {
        if ($(this).is(":checked")) {
            // Enable the submit button
            $("button[type='submit']").prop("disabled", false);
        } else {
            // Disable the submit button
            $("button[type='submit']").prop("disabled", true);
        }
    });
});
