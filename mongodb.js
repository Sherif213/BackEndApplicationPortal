const mongoose = require('mongoose');

const username = 'shouldtheone';
const password = 'uEp5Xb4UobcnxsYD';
const clusterUrl = 'cluster0.l69ivke.mongodb.net';
const dbName = 'unesco_application';

// Updated URI with ssl=true parameter
const uri = `mongodb+srv://${username}:${password}@${clusterUrl}/${dbName}?retryWrites=true&w=majority&appName=Cluster0&ssl=true`;

mongoose.connect(uri, {
    useNewUrlParser: true,
    useUnifiedTopology: true,
}).then(() => {
    console.log("Connected to MongoDB Atlas");
}).catch(err => {
    console.error("Error connecting to MongoDB Atlas", err);
});

module.exports = mongoose;
