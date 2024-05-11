const express = require('express');
const { Client } = require('pg');
const bcrypt = require('bcrypt');

const cors = require('cors');
const WebSocket = require('ws');


const app = express();

// Enable CORS with specific options
app.use(cors({
  origin: '*', // Allow requests from this origin
  methods: ['GET', 'POST'],      // Allow these HTTP methods
  allowedHeaders: ['Content-Type'] // Allow these headers
}));
const PORT = process.env.PORT || 3000;

const client = new Client({
    user: 'postgres',
    host: 'localhost',
    database: 'chatroom',
    password: 'test',
    port: 5432, // default PostgreSQL port
});

// Connect to PostgreSQL
client.connect()
    .then(() => console.log('Connected to PostgreSQL'))
    .catch(err => console.error('Connection error', err.stack));

// Middleware to parse JSON bodies
app.use(express.json());


// WebSocket server
const wss = new WebSocket.Server({ noServer: true });

wss.on('connection', function connection(ws) {
    ws.on('message', function incoming(message) {
        // Broadcast the received message to all clients
        wss.clients.forEach(function each(client) {
            if (client !== ws && client.readyState === WebSocket.OPEN) {
                client.send(message);
            }
        });
    });
});

// Attach WebSocket server to existing HTTP server
const server = app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});

server.on('upgrade', (request, socket, head) => {
    wss.handleUpgrade(request, socket, head, (socket) => {
        wss.emit('connection', socket, request);
    });
});


// Signup route
app.post('/signup', async (req, res) => {
    const { username, email, password } = req.body;

    try {
        // Check if the user already exists with the provided email
        const existingUser = await client.query('SELECT * FROM public."Users" WHERE email = $1', [email]);

        if (existingUser.rows.length > 0) {
            return res.status(400).json({ error: 'User already exists with this email' });
        }

        // Validate input
        if (!username || !email || !password) {
            return res.status(400).json({ error: 'Missing required fields' });
        }

        // Hash password
        const hashedPassword = await bcrypt.hash(password, 10);

        // Insert user into database
        const result = await client.query('INSERT INTO public."Users" (username, email, password) VALUES ($1, $2, $3) RETURNING *', [username, email, hashedPassword]);

        res.json({ message: 'User signed up successfully', user: result.rows[0] });
    } catch (err) {
        console.error('Error signing up:', err);
        res.status(500).json({ error: 'Internal server error' });
    }
});

app.post('/login', async (req, res) => {
    const { email, password } = req.body;

    try {
        // Retrieve user from database by email
        const result = await client.query('SELECT * FROM public."Users" WHERE email = $1', [email]);

        if (result.rows.length === 0) {
            return res.status(404).json({ error: 'User not found' });
        }

        const user = result.rows[0];

        // Verify password
        const passwordMatch = await bcrypt.compare(password, user.password);

        if (!passwordMatch) {
            return res.status(401).json({ error: 'Incorrect password' });
        }

        res.json({ message: 'Login successful', user: user });
    } catch (err) {
        console.error('Error logging in:', err);
        res.status(500).json({ error: 'Internal server error' });
    }
});
app.post('/send-message', async (req, res) => {
    const { user_id, message } = req.body;

    try {
        // Insert message into the chat table
        const result = await client.query('INSERT INTO public."Chat" (user_id, message) VALUES ($1, $2) RETURNING *', [user_id, message]);
        
        // Send the newly inserted message to all connected clients via WebSocket
        wss.clients.forEach(function each(client) {
            if (client.readyState === WebSocket.OPEN) {
                client.send(JSON.stringify({ type: 'new_message', message: result.rows[0] }));
            }
        });

        res.json({ message: 'Message sent successfully', messageDetails: result.rows[0] });
    } catch (err) {
        console.error('Error sending message:', err);
        res.status(500).json({ error: 'Internal server error' });
    }
});


app.get('/get-messages', async (req, res) => {
    try {
        // Retrieve all messages with usernames
        const result = await client.query('SELECT c.id, c.message, c.created_at, u.username FROM public."Chat" c INNER JOIN public."Users" u ON c.user_id = u.id');

        res.json({ messages: result.rows });
    } catch (err) {
        console.error('Error retrieving messages:', err);
        res.status(500).json({ error: 'Internal server error' });
    }
});

