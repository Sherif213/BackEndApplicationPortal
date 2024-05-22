// formRoutes.js
const express = require('express');
const multer = require('multer');
const { validationResult } = require('express-validator');
const { v4: uuidv4 } = require('uuid');
const { createNewStudent, createNewAttachment } = require('./studentController'); 

const router = express.Router();

const handleArrayValue = (value) => {
    if (Array.isArray(value)) {
        return value.join(', ');
    }
    return value;
};

const fileToBase64 = async (fileBuffer) => {
    const { fileTypeFromBuffer } = await import('file-type');
    const type = await fileTypeFromBuffer(fileBuffer);
    return `data:${type.mime};base64,${fileBuffer.toString('base64')}`;
};

// Set up multer storage
const storage = multer.memoryStorage();
const upload = multer({ storage: storage });

// Route to handle form submission
router.post('/submit', upload.fields([
    { name: 'student_certificate' },
    { name: 'photo' },
    { name: 'passport_copy' }
]), async (req, res) => {
    // Check for validation errors
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
        return res.status(400).json({ errors: errors.array() });
    }

    try {
        // Generate UUID for the form submission
        const submissionId = uuidv4();

        // Convert files to Base64 strings
        let studentCertificateBase64 = '';
        let photoBase64 = '';
        let passportCopyBase64 = '';

        if (req.files['student_certificate']) {
            studentCertificateBase64 = await fileToBase64(req.files['student_certificate'][0].buffer);
        }
        if (req.files['photo']) {
            photoBase64 = await fileToBase64(req.files['photo'][0].buffer);
        }
        if (req.files['passport_copy']) {
            passportCopyBase64 = await fileToBase64(req.files['passport_copy'][0].buffer);
        }
        const attachmentData={
            submissionId: submissionId,
            personalInformation:{
                firstName: req.body.first_name,
                studentCertificate: studentCertificateBase64,
                photo: photoBase64,
            },
            passportInfo:{
                passportName: req.body.passport_name,
                passportCopy: passportCopyBase64
            }
        }

        // Create student data object
        const studentData = {
            submissionId: submissionId, 
            personalInformation: {
                firstName: req.body.first_name,
                dateOfBirth: req.body.date_of_birth,
                gender: req.body.gender,
                tshirtSize: req.body.tshirt_size,
                nationality: req.body.Nationality,
                placeOfBirth: req.body.place_of_birth,
            },
            contactInformation: {
                homeAddress: handleArrayValue(req.body.home_address),
                email: handleArrayValue(req.body.email),
                telephone: handleArrayValue(req.body.telephone),
            },
            emergencyContact: {
                fathersFullName: req.body.fathers_full_name,
                fathersEmail: handleArrayValue(req.body.fathers_email),
                fathersTelephone: handleArrayValue(req.body.fathers_telephone),
                mothersFullName: Array.isArray(req.body.mothers_full_name) ? req.body.mothers_full_name[0] : req.body.mothers_full_name,
                mothersEmail: handleArrayValue(req.body.mothers_email),
                mothersTelephone: handleArrayValue(req.body.mothers_telephone)
            },
            passportInfo: {
                passportName: req.body.passport_name,
                givenPlace: req.body.given_place,
                passportNumber: req.body.passport_name_2,
                expiryDate: req.body.given_place_2,
            },
            courseSelection: {
                course: Array.isArray(req.body.course) ? req.body.course.join(', ') : req.body.course
            },
            universityInformation: {
                institutionName: req.body.institution_name,
                department: req.body.department,
                institutionAddress: req.body.institution_address,
                institutionEmail: req.body.institution_email,
                institutionTelephone: req.body.institution_telephone
            },
            PaymentMethod: {
                iban: req.body.iban
            }
        };

        const newAttachment= await createNewAttachment(attachmentData);
        // Create a new Student instance and save to the database
        const newStudent = await createNewStudent(studentData);
        res.status(201).redirect('/applicationSuccessful');
    } catch (error) {
        res.status(400).json({ error: error.message });
    }
});

module.exports = router;
