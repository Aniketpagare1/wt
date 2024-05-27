const express = require('express');
const bodyParser = require('body-parser');
const multer = require('multer');
const path = require('path');
const mysql = require('mysql2');

const app = express();
const PORT = process.env.PORT || 3000;

// MySQL connection setup
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',   // replace with your MySQL username
    password: '', // replace with your MySQL password
    database: 'employee_recruitment_system'
});

db.connect(err => {
    if (err) {
        console.error('Error connecting to the database:', err);
        return;
    }
    console.log('Connected to the MySQL database.');
});

// Set up multer for file uploads
const storage = multer.diskStorage({
    destination: function (req, file, cb) {
        cb(null, 'uploads/');
    },
    filename: function (req, file, cb) {
        cb(null, Date.now() + path.extname(file.originalname));
    }
});
const upload = multer({ storage: storage });

// Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'public')));

// Serve static files from the uploads directory
app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

// Handle form submission
app.post('/submit-application', upload.single('resume'), (req, res) => {
    const { name, email, position } = req.body;
    const resumePath = req.file.path;

    const query = 'INSERT INTO employee_applications (name, email, position, resume_path) VALUES (?, ?, ?, ?)';
    db.query(query, [name, email, position, resumePath], (err, result) => {
        if (err) {
            console.error('Error inserting data into the database:', err);
            return res.status(500).json({ error: 'Internal server error' });
        }
        res.sendStatus(200);
    });
});

// Endpoint to fetch applications for admin
app.get('/applications', (req, res) => {
    const query = 'SELECT * FROM employee_applications';
    db.query(query, (err, results) => {
        if (err) {
            console.error('Error fetching data from the database:', err);
            return res.status(500).json({ error: 'Internal server error' });
        }
        res.json(results);
    });
});

// Serve admin page
app.get('/admin', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'admin.html'));
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
