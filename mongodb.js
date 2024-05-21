// mongodb.js

const mongoose = require('mongoose');

const username = 'shouldtheone';
const password = 'uEp5Xb4UobcnxsYD';
const clusterUrl = 'cluster0.l69ivke.mongodb.net';
const dbName = 'unesco_application';
const uri = `mongodb+srv://${username}:${password}@${clusterUrl}/${dbName}?retryWrites=true&w=majority&appName=Cluster0`;

mongoose.connect(uri).then(() => {
    console.log("Connected to MongoDB Atlas");
}).catch(err => {
    console.error("Error connecting to MongoDB Atlas", err);
});

module.exports = mongoose;
