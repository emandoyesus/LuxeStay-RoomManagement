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

                // regex validation
                if (input.value.trim() !== '') {
                    // Name Validation
                    if (input.name === 'name' && !/^[a-zA-Z\s]+$/.test(input.value)) {
                        isValid = false;
                        if (errorSpan) errorSpan.textContent = "Only letters and spaces allowed.";
                        showError(input, errorSpan);
                    }

                    // Phone Validation
                    if (input.type === 'tel') {
                        // Pattern: Starts with 1-9, exactly 10 digits
                        if (!/^[1-9]\d{9}$/.test(input.value)) {
                            isValid = false;
                            showError(input, errorSpan);
                        }
                    }

                    // Email Validation
                    if (input.type === 'email') {
                        if (!/^\S+@\S+\.\S+$/.test(input.value)) {
                            isValid = false;
                            showError(input, errorSpan);
                        }
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
