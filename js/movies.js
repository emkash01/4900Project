// interacts with movies table
const db = require('./db');

// Function to get a random movie trailer
async function getRandomTrailer() {
    const query = 'SELECT trailer FROM movies TABLESAMPLE SYSTEM(1) LIMIT 1'; // Adjust query to our desired database limit
    const result = await db.query(query);
    return result.rows[0];
}

module.exports = {
    getRandomTrailer,
};