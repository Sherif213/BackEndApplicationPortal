const express = require('express');
const path = require('path');
const router = express.Router();

router.get('/applicationForm', (req, res) => {
    res.sendFile(path.join(__dirname, '..', 'public', 'dataEntry.html'));
});

module.exports = router;