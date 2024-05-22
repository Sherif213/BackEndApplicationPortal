const mongoose = require('mongoose');

const attachmentSchema = new mongoose.Schema({
    personalInformation: {
        firstName: { type: String, required: true },
        studentCertificate: { type: String, required: true }, 
        photo: { type: String, required: true }
    },
    passportInfo: {
        passportName: { type: String, required: true },
        passportCopy: { type: String, required: true } 
    }
}, { timestamps: true });

module.exports = mongoose.model('Attachment', attachmentSchema);