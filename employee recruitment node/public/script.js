document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('recruitmentForm');
    const message = document.getElementById('message');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(form);
        try {
            const response = await fetch('/submit-application', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                message.textContent = 'Application submitted successfully!';
                form.reset();
            } else {
                throw new Error('Failed to submit application');
            }
        } catch (error) {
            console.error(error);
            message.textContent = 'Error: Failed to submit application';
        }
    });
});
