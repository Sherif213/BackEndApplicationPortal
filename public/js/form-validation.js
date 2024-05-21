document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('myForm');

    form.addEventListener('submit', (event) => {
        event.preventDefault();

        validateInputs();
    });

    const setError = (element, message) => {
        const errorDisplay = element.nextElementSibling; // Assuming the error message is the next sibling element
        errorDisplay.innerText = message;
        element.classList.add('error');
    };

    const setSuccess = (element) => {
        const errorDisplay = element.nextElementSibling; // Assuming the error message is the next sibling element
        errorDisplay.innerText = '';
        element.classList.remove('error');
    };

    const validateInputs = () => {
        const inputs = form.querySelectorAll('input[required], select[required]');

        inputs.forEach(input => {
            if (!input.value.trim()) {
                setError(input, 'This field is required');
            } else {
                setSuccess(input);
            }
        });
    };
});