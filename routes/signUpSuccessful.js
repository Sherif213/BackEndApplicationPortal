const express = require('express');
const path = require('path');
const router = express.Router();

router.get('/applicationSuccessful', (req, res) => {
    res.sendFile(path.join(__dirname, '..', 'public', 'signUpSuccessful.html'));
});

module.exports = router;