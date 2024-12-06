<?php
// functions/student.php

use App\Models\Student;
require_once __DIR__ . '/../config/database.php';

function createNewStudent($studentData)
{
    try {
        writeToLog("Creating new student with data: " . json_encode($studentData));
        $newStudent = Student::create($studentData);
        writeToLog("New student created successfully with ID: {$newStudent->id}");
        return $newStudent;
    } catch (Exception $e) {
        writeToLog("ERROR creating new student: " . $e->getMessage());
        throw new Exception($e->getMessage());
    }
}

function getCountryName($nationalityValue)
{
    $capsule = Database::getConnection();  // Get the singleton instance of Capsule
    writeToLog("Retrieving country name for nationality value: $nationalityValue");

    $country = $capsule->getConnection()->table('Countries')->where('value', $nationalityValue)->first();
    return $country ? $country->name : null;
}
