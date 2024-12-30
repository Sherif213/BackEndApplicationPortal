<?php
// functions/student.php

use App\Models\Student;
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

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

    $country = $capsule->getConnection()->table('Country_codes')->where('M49', $nationalityValue)->first();
    return $country ? $country->official_name_en : null;
}

function getDialCode($DialValue)
{
    $capsule = Database::getConnection();  // Get the singleton instance of Capsule
    writeToLog("Retrieving country Dial Code for nationality value: $DialValue");

    $country = $capsule->getConnection()->table('Country_codes')->where('M49', $DialValue)->first();
    return $country ? $country->Dial : null;
}
function getCountries() {
    try {
        // Use the query builder
        $countries = Database::getConnection()
            ->table('country_codes')
            ->select('M49', 'official_name_en')
            ->orderBy('official_name_en')
            ->get()
            ->toArray();

        return json_decode(json_encode($countries), true); // Convert to associative array if needed

    } catch (Exception $e) {
        error_log("Database error: " . $e->getMessage());
        die("An error occurred 1. Please try again later.");
    }
}

function getDial(){
    try {
        // Use the query builder
        $dials = Database::getConnection()
            ->table('country_codes')
            ->select('M49','Dial', 'official_name_en')
            ->orderBy('official_name_en')
            ->get()
            ->toArray();

        return json_decode(json_encode($dials), true); 

    } catch (Exception $e) {
        error_log("Database error: " . $e->getMessage());
        die("An error occurred 2. Please try again later.");
    }
}