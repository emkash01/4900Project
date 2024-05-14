const express = require('express');
const { getRandomTrailer } = require('./movies');

const app = express();
const port = 3000;

// Route to fetch a random trailer
app.get('/random-trailer', async (req, res) => {
    try {
        const trailer = await getRandomTrailer();
        res.json(trailer);
    } catch (error) {
        console.error('Error fetching random trailer:', error);
        res.status(500).json({ error: 'Internal server error' });
    }
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});

//sets up localhost server--