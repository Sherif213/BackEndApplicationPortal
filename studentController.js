// studentController.js
const Student = require('./models/student');
const Attachment = require('./models/attachment');

const createNewStudent = async (studentData) => {
    try {
        const newStudent = await Student.create(studentData);
        return newStudent;
    } catch (error) {
        throw new Error(error.message);
    }
};

const createNewAttachment = async (imageData) => {
    try {
        const newAttachment = await Attachment.create(imageData);
        return newAttachment;
    } catch (error) {
        throw new Error(error.message);
    }
}

module.exports = {
    createNewStudent,
    createNewAttachment
};
