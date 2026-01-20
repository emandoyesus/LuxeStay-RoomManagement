document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            let isValid = true;
            const inputs = form.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                const errorSpan = input.parentElement.querySelector('.error-msg');

                // Clear previous error styles
                input.style.borderColor = 'var(--border-color)';
                if (errorSpan) errorSpan.style.display = 'none';

                // Check Required
                if (input.hasAttribute('required') && !input.value.trim()) {
                    isValid = false;
                    showError(input, errorSpan);
                }

                // Check Number limits
                if (input.type === 'number') {
                    if (input.min && parseFloat(input.value) < parseFloat(input.min)) {
                        isValid = false;
                        showError(input, errorSpan);
                    }
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });
    });

    function showError(input, errorSpan) {
        input.style.borderColor = 'var(--danger)';
        if (errorSpan) {
            errorSpan.style.display = 'block';
            // Add a small animation to text
            errorSpan.animate([
                { transform: 'translateX(-5px)' },
                { transform: 'translateX(5px)' },
                { transform: 'translateX(0)' }
            ], {
                duration: 200,
                iterations: 2
            });
        }
    }
});
