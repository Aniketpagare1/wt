document.getElementById('searchForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const query = document.getElementById('query').value;
    fetch(`/search?q=${query}`)
        .then(response => response.json())
        .then(data => {
            const resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';
            if (data.results.length === 0) {
                resultsDiv.innerHTML = '<p>No results found.</p>';
            } else {
                data.results.forEach(result => {
                    const resultItem = document.createElement('div');
                    resultItem.className = 'result-item';
                    resultItem.innerHTML = `<h2>${result.name}</h2><a href="${result.url}" target="_blank">${result.url}</a><p>${result.snippet}</p>`;
                    resultsDiv.appendChild(resultItem);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching search results:', error);
        });
});
