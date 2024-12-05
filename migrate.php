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

} catch (\Exception $e) {
    // Log the error to a file
    $errorMessage = date('Y-m-d H:i:s') . ' - ERROR: ' . $e->getMessage() . PHP_EOL;
    file_put_contents($logFile, $errorMessage, FILE_APPEND);

    // Output a generic error message to the console
    echo "An error occurred. Please see the log file for details.\n";
}
