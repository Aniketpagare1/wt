const express = require('express');
const axios = require('axios');
const bodyParser = require('body-parser');
const app = express();
const port = 8082;

// Replace with your Bing Search API key
const BING_SEARCH_API_KEY = 'YOUR_BING_SEARCH_API_KEY';

app.use(bodyParser.json());
app.use(express.static('public'));

app.get('/search', async (req, res) => {
    const query = req.query.q;
    const url = `https://api.bing.microsoft.com/v7.0/search?q=${encodeURIComponent(query)}`;

    try {
        const response = await axios.get(url, {
            headers: { 'Ocp-Apim-Subscription-Key': BING_SEARCH_API_KEY }
        });
        res.json({ results: response.data.webPages.value });
    } catch (error) {
        console.error('Error fetching search results:', error);
        res.status(500).json({ error: 'Failed to fetch search results' });
    }
});

app.listen(port, () => {
    console.log(`Server is running at http://localhost:${port}`);
});
