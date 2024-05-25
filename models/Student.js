// models/student.js
const { DataTypes } = require('sequelize');
const sequelize = require('../mysql');

const Student = sequelize.define('Student', {
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
    dateOfBirth: {
        type: DataTypes.DATE,
        allowNull: false
    },
    gender: {
        type: DataTypes.STRING
    },
    tshirtSize: {
        type: DataTypes.STRING
    },
    nationality: {
        type: DataTypes.STRING,
        defaultValue: 'Unknown'
    },
    placeOfBirth: {
        type: DataTypes.STRING
    },
    // Contact Information
    homeAddress: {
        type: DataTypes.STRING
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false
    },
    telephone: {
        type: DataTypes.STRING,
        allowNull: false
    },
    // Emergency Contact
    fathersFullName: {
        type: DataTypes.STRING
    },
    fathersEmail: {
        type: DataTypes.STRING
    },
    fathersTelephone: {
        type: DataTypes.STRING
    },
    mothersFullName: {
        type: DataTypes.STRING
    },
    mothersEmail: {
        type: DataTypes.STRING
    },
    mothersTelephone: {
        type: DataTypes.STRING
    },
    // Passport Information
    passportName: {
        type: DataTypes.STRING
    },
    givenPlace: {
        type: DataTypes.STRING
    },
    passportNumber: {
        type: DataTypes.STRING
    },
    expiryDate: {
        type: DataTypes.STRING
    },
    // Course Selection
    course: {
        type: DataTypes.STRING,
        allowNull: false
    },
    // University Information
    institutionName: {
        type: DataTypes.STRING,
        allowNull: false
    },
    department: {
        type: DataTypes.STRING
    },
    institutionAddress: {
        type: DataTypes.STRING
    },
    institutionEmail: {
        type: DataTypes.STRING
    },
    institutionTelephone: {
        type: DataTypes.STRING
    },
    // Payment Method
    iban: {
        type: DataTypes.STRING,
        allowNull: false
    }
}, { timestamps: true });

module.exports = Student;
