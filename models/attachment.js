// models/attachment.js
const { DataTypes } = require('sequelize');
const sequelize = require('../mysql');

const Attachment = sequelize.define('Attachment', {
    submissionId: {
        type: DataTypes.STRING,
        allowNull: false,
        unique: true
    },
    // Personal Information
    firstName: {
        type: DataTypes.STRING,
        allowNull: false
    },
    studentCertificate: {
        type: DataTypes.TEXT,  // Assuming large text for Base64 data
        allowNull: false
    },
    photo: {
        type: DataTypes.TEXT,  // Assuming large text for Base64 data
        allowNull: false
    },
    // Passport Information
    passportName: {
        type: DataTypes.STRING,
        allowNull: false
    },
    passportCopy: {
        type: DataTypes.TEXT,  // Assuming large text for Base64 data
        allowNull: false
    }
}, { timestamps: true });

module.exports = Attachment;
