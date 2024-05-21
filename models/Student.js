const mongoose = require('mongoose');

const studentSchema = new mongoose.Schema({
    submissionId: {
        type: String,
        required: true,
        unique: true
    },
    personalInformation: {
        firstName: { type: String, required: true },
        dateOfBirth: { type: Date, required: true },
        gender: { type: String },
        tshirtSize: { type: String},
        nationality: { type: String, required: true },
        placeOfBirth: String,
        studentCertificate: String,
        photo: String,
    },
    contactInformation: {
        homeAddress: String,
        email: { type: String, required: true}, // Unique email addresses
        telephone: { type: String, required: true },
    },
    emergencyContact: {
        fathersFullName: String,
        fathersEmail: String,
        fathersTelephone: String,
        mothersFullName: String,
        mothersEmail: String,
        mothersTelephone: String,
    },
    passportInfo: {
        passportName: String,
        givenPlace: String,
        passportNumber: String,
        expiryDate: String,
        passportCopy: String,
    },
    courseSelection: {
        course: { type: String, required: true },
    },
    universityInformation: {
        institutionName: { type: String, required: true },
        department: String,
        institutionAddress: String,
        institutionEmail: String,
        institutionTelephone: String,
    },
    PaymentMethod: {
        iban: { type: String, required: true },
    }
}, { timestamps: true }); // Add timestamps for createdAt and updatedAt fields



module.exports = mongoose.model('Student', studentSchema);
