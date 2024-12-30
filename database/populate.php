<?php
require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Define the path to the CSV file
$csvFilePath = __DIR__ . '/Country_code.csv';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {

    $capsule = Database::getConnection();

    // Open the CSV file
    if (!file_exists($csvFilePath)) {
        throw new Exception("CSV file not found: " . $csvFilePath);
    }

    $file = fopen($csvFilePath, 'r');

    // Skip the header row
    $header = fgetcsv($file);

    // Prepare for insertion
    $insertedCount = 0;

    while (($row = fgetcsv($file)) !== false) {
        // Map CSV fields to the database columns
        $data = [
            'Dial' => $row[0],
            'ISO3166_1_Alpha_3' => $row[1],
            'ISO3166_1_numeric' => $row[2],
            'ISO3166_1_Alpha_2' => $row[3],
            'ISO4217_currency_name' => $row[4],
            'UNTERM_English_Short' => $row[5],
            'ISO4217_currency_alphabetic_code' => $row[6],
            'ISO4217_currency_numeric_code' => $row[7],
            'M49' => $row[8],
            'Sub_region_Code' => $row[9],
            'Region_Code' => $row[10],
            'Intermediate_Region_Name' => $row[11],
            'UNTERM_English_Formal' => $row[12],
            'official_name_en' => $row[13],
            'ISO4217_currency_country_name' => $row[14],
            'Region_Name' => $row[15],
            'Sub_region_Name' => $row[16],
            'Capital' => $row[17],
            'Continent' => $row[18],
            'TLD' => $row[19],
            'Geoname_ID' => $row[20],
            'CLDR_display_name' => $row[21],
        ];

        
        $data = array_map(function ($value) {
            return $value === 'NULL' ? null : $value;
        }, $data);

        // Insert the data into the 'country_codes' table
        Capsule::table('country_codes')->insert($data);
        $insertedCount++;
    }

    fclose($file);

    echo "Data insertion completed successfully. Total rows inserted: $insertedCount.\n";

} catch (Exception $e) {
    // Handle errors
    echo "Error: " . $e->getMessage() . "\n";
}
