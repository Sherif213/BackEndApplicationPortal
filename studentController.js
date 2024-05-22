// studentController.js
const Student = require('./models/Student');
const image = require('./models/attachment');

const createNewStudent = async (studentData) => {
    try {
        const newStudent = new Student(studentData);
        await newStudent.save();
        return newStudent;
    } catch (error) {
        throw new Error(error.message);
    }
};

const createNewAttachment=async(imageData)=>{
    try{
        const newAttachment=new image(imageData);
        await newAttachment.save();
        return newAttachment;
    }catch (error){
        throw new Error(error.message);
    }
}

module.exports = {
    createNewStudent,
    createNewAttachment
};
