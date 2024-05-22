const express = require('express');
const path = require('path');
const router = express.Router();

router.get('/agreement', (req, res) => {
    res.sendFile(path.join(__dirname, '..', 'public', 'PolicyPortal.html'));
});

module.exports = router;