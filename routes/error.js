const express = require('express');
const path = require('path');
const router = express.Router();

router.get('/error', (req, res) => {
    res.sendFile(path.join(__dirname, '..', 'public', 'error.html'));
});

module.exports = router;