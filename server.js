// server.js
const express = require('express');
const bodyParser = require('body-parser');
const multer = require('multer');
const fs = require('fs');
const path = require('path');
const { body, validationResult } = require('express-validator');
const { v4: uuidv4 } = require('uuid');
const sequelize = require('./mysql');
const { promisify } = require('util');
const readFile = promisify(fs.readFile);
const { createNewStudent, createNewAttachment } = require('./studentController');
const formRoutes = require('./formRoutes');

const app = express();
let port = process.env.PORT;
if (port == null || port == "") {
    port = 8000;
}

// Middlewarea
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Set up multer storage
const storage = multer.memoryStorage();
const upload = multer({ storage: storage });

// Define the Student and Attachment models
const Student = require('./models/Student');
const Attachment = require('./models/attachment');

// Sync models with database
sequelize.sync().then(() => {
    console.log("All models were synchronized successfully.");
}).catch((error) => {
    console.error('Error synchronizing models:', error);
});

// Import routes
const dataEntryRoutes = require('./routes/dataEntry');
const errorRoutes = require('./routes/error');
const indexRoutes = require('./routes/index');
const policyPortalRoutes = require('./routes/policyPortal');
const signUpSuccessfulRoutes = require('./routes/signUpSuccessful');

// Serve static files (CSS, JS, images)
app.use(express.static(path.join(__dirname, 'public')));

// Serve the HTML form
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'form.html'));
});

const handleArrayValue = (value) => {
    if (Array.isArray(value)) {
        return value.join(', ');
    }
    return value;
};

const fileToBase64 = async (fileBuffer) => {
    const { fileTypeFromBuffer } = await import('file-type');
    const type = await fileTypeFromBuffer(fileBuffer);
    return `data:${type.mime};base64,${fileBuffer.toString('base64')}`;
};

// Route to handle form submission
app.use('/', formRoutes);

app.use('/', dataEntryRoutes);
app.use('/', errorRoutes);
app.use('/', indexRoutes);
app.use('/', policyPortalRoutes);
app.use('/', signUpSuccessfulRoutes);

app.listen(port, '0.0.0.0', () => {
    console.log(`Server running at http://localhost:${port}`);
});
