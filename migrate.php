<?php
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Define the path to the log file
$logFile = __DIR__ . '/error.log';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Get the Capsule instance from Database singleton
    $capsule = Database::getConnection();

    // Create 'students' table
    if (!Capsule::schema()->hasTable('students')) {
        Capsule::schema()->create('students', function ($table) {
            $table->increments('id');
            $table->string('submission_id')->unique();
            $table->string('first_name');
            $table->date('date_of_birth');
            $table->string('tshirt_size');
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->string('nationality')->default('Unknown');
            $table->string('place_of_birth');
            $table->text('home_address')->nullable();
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('outreach')->nullable();
            $table->string('iban');
            $table->timestamps();
        });
        echo "Students table migration completed successfully.\n";
    } else {
        echo "Table 'students' already exists.\n";
    }

    // Create 'parental_infos' table
    if (!Capsule::schema()->hasTable('parental_infos')) {
        Capsule::schema()->create('parental_infos', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('student_id'); // Foreign key to students table
            $table->enum('parent_type', ['Father', 'Mother']);
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
        echo "Parental Infos table migration completed successfully.\n";
    } else {
        echo "Table 'parental_infos' already exists.\n";
    }

    // Create 'legal_information' table
    if (!Capsule::schema()->hasTable('legal_information')) {
        Capsule::schema()->create('legal_information', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('student_id'); // Foreign key to students table
            $table->string('passport_name')->nullable();
            $table->string('given_place')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('expiry_date')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
        echo "Institution Details table migration completed successfully.\n";
    } else {
        echo "Table 'institution_details' already exists.\n";
    }

    // Create 'institution_details' table
    if (!Capsule::schema()->hasTable('institution_details')) {
        Capsule::schema()->create('institution_details', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('student_id'); // Foreign key to students table
            $table->string('institution_name');
            $table->string('department')->nullable();
            $table->string('course')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
        echo "Institution Details table migration completed successfully.\n";
    } else {
        echo "Table 'institution_details' already exists.\n";
    }

    // Create 'attachments' table
    if (!Capsule::schema()->hasTable('attachments')) {
        Capsule::schema()->create('attachments', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('student_id'); // Foreign key to students table
            $table->enum('attachment_type', ['Certificate', 'Photo', 'Passport', 'Recommendation_Letter', 'Motivation_Letter', 'ConsentForm']);
            $table->string('file_path');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
        echo "Attachments table migration completed successfully.\n";
    } else {
        echo "Table 'attachments' already exists.\n";
    }

    // Create 'payments' table
    if (!Capsule::schema()->hasTable('payments')) {
        Capsule::schema()->create('payments', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('student_id'); // Foreign key to students table
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->decimal('amount_sent', 10, 2)->nullable();
            $table->string('currency', 3)->nullable();
            $table->string('receipt')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
        echo "Payments table migration completed successfully.\n";
    } else {
        echo "Table 'payments' already exists.\n";
    }


    if (!Capsule::schema()->hasTable('unesco_programs')) {
        Capsule::schema()->create('unesco_programs', function ($table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('progress', ['Not Started', 'In Progress', 'Completed'])->default('Not Started');
            $table->timestamps();
        });
        echo "unesco_programs table migration completed successfully.\n";
    } else {
        echo "Table 'unesco_programs' already exists.\n";
    }

    if (!Capsule::schema()->hasTable('student_program')) {
        Capsule::schema()->create('student_program', function ($table) {
            $table->increments('id'); // Unique ID for each assignment
            $table->unsignedInteger('student_id'); // Foreign key to the students table
            $table->unsignedInteger('program_id'); // Foreign key to the unesco_programs table
            $table->string('program_specific_id')->unique(); // Unique ID for the student in this program
            $table->timestamps(); // Created at and updated at timestamps
    
            // Foreign key constraints
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('unesco_programs')->onDelete('cascade');
        });
        echo "Table 'student_program' created successfully.\n";
    } else {
        echo "Table 'student_program' already exists.\n";
    }

    if (!Capsule::schema()->hasTable('country_codes')) {
        Capsule::schema()->create('country_codes', function ($table) {
            $table->string('Dial', 20)->nullable();
            $table->char('ISO3166_1_Alpha_3', 3)->nullable();
            $table->integer('ISO3166_1_numeric')->nullable();
            $table->char('ISO3166_1_Alpha_2', 2)->nullable();
            $table->string('ISO4217_currency_name', 50)->nullable();
            $table->string('UNTERM_English_Short', 100)->nullable();
            $table->char('ISO4217_currency_alphabetic_code', 7)->nullable();
            $table->integer('ISO4217_currency_numeric_code')->nullable();
            $table->integer('M49')->nullable();
            $table->integer('Sub_region_Code')->nullable();
            $table->integer('Region_Code')->nullable();
            $table->string('Intermediate_Region_Name')->nullable();
            $table->string('UNTERM_English_Formal', 200)->nullable();
            $table->string('official_name_en', 200)->nullable();
            $table->string('ISO4217_currency_country_name', 100)->nullable();
            $table->string('Region_Name', 50)->nullable();
            $table->string('Sub_region_Name', 50)->nullable();
            $table->string('Capital', 50)->nullable();
            $table->char('Continent', 2)->nullable();
            $table->string('TLD', 10)->nullable();
            $table->integer('Geoname_ID')->nullable();
            $table->string('CLDR_display_name', 100)->nullable();
        });
        echo "Country Codes table migration completed successfully.\n";
    } else {
        echo "Table 'country_codes' already exists.\n";
    }
    

} catch (\Exception $e) {
    // Log the error to a file
    $errorMessage = date('Y-m-d H:i:s') . ' - ERROR: ' . $e->getMessage() . PHP_EOL;
    file_put_contents($logFile, $errorMessage, FILE_APPEND);

    // Output a generic error message to the console
    echo "An error occurred. Please see the log file for details.\n";
}
