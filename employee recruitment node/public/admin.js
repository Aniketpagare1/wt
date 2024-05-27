document.addEventListener('DOMContentLoaded', () => {
    const tableBody = document.querySelector('#applicationsTable tbody');

    fetch('/applications')
        .then(response => response.json())
        .then(applications => {
            applications.forEach(application => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${application.id}</td>
                    <td>${application.name}</td>
                    <td>${application.email}</td>
                    <td>${application.position}</td>
                    <td><a href="/${application.resume_path}" target="_blank">View Resume</a></td>
                    <td>${new Date(application.created_at).toLocaleString()}</td>
                `;

                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching applications:', error));
});
