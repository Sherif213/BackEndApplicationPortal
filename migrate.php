<?php
require __DIR__.'/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

// Define the path to the log file
$logFile = __DIR__ . '/error.log';

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Create a new Capsule Manager instance
    $capsule = new Capsule;

    // Set the database connection
    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'unesco_app',
        'username'  => 'unesco_admin',
        'password'  => 'kfNhTW3vNqh',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    // Set the Capsule Manager instance as global
    $capsule->setAsGlobal();

    // Boot Eloquent ORM
    $capsule->bootEloquent();

    // Check if the 'students' table exists before creating it
    if (!Capsule::schema()->hasTable('students')) {
        // Create 'students' table
        Capsule::schema()->create('students', function ($table) {
            $table->increments('id');
            $table->string('submissionId')->unique();
            $table->string('firstName');
            $table->date('dateOfBirth');
            $table->string('gender')->nullable();
            $table->string('tshirtSize')->nullable();
            $table->string('nationality')->default('Unknown');
            $table->string('placeOfBirth')->nullable();
            $table->string('homeAddress')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->string('fathersFullName')->nullable();
            $table->string('fathersEmail')->nullable();
            $table->string('fathersTelephone')->nullable();
            $table->string('mothersFullName')->nullable();
            $table->string('mothersEmail')->nullable();
            $table->string('mothersTelephone')->nullable();
            $table->string('passportName')->nullable();
            $table->string('givenPlace')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('expiryDate')->nullable();
            $table->string('course');
            $table->string('institutionName');
            $table->string('department')->nullable();
            $table->string('institutionAddress')->nullable();
            $table->string('institutionEmail')->nullable();
            $table->string('institutionTelephone')->nullable();
            $table->string('iban');
            $table->timestamps();
        });
        // Output a success message
        echo "Students table migration completed successfully.\n";
    } else {
        echo "Table 'students' already exists.\n";
    }

    // Check if the 'attachments' table exists before creating it
    if (!Capsule::schema()->hasTable('attachments')) {
        // Create 'attachments' table
        Capsule::schema()->create('attachments', function ($table) {
            $table->increments('id');
            $table->string('submissionId');
            $table->string('firstName');
            $table->string('studentCertificate')->nullable();
            $table->string('photo')->nullable();
            $table->string('passportName')->nullable();
            $table->string('passportCopy')->nullable();
            $table->string('Recommendation_Letter')->nullable();
            $table->string('Motivation_Letter')->nullable();
            $table->timestamps();
        });
        // Output a success message
        echo "Attachments table migration completed successfully.\n";
    } else {
        echo "Table 'attachments' already exists.\n";
    }

} catch (\Exception $e) {
    // Log the error to a file
    file_put_contents($logFile, date('Y-m-d H:i:s') . ' - ERROR: ' . $e->getMessage() . PHP_EOL, FILE_APPEND);

    // Output a generic error message to the console
    echo "An error occurred. Please see the log file for details.\n";
}
?>
