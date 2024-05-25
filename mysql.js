// mysql.js
const { Sequelize } = require('sequelize');

const sequelize = new Sequelize('unescodb', 'root', '1532910', {
    host: '127.0.0.1',
    dialect: 'mysql',
    logging: false, // Disable logging or set it to true to see the SQL queries
});

sequelize.authenticate()
    .then(() => {
        console.log('Connected to MySQL database');
    })
    .catch(err => {
        console.error('Error connecting to MySQL database', err);
    });

module.exports = sequelize;
