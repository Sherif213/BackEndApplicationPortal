<?php
require __DIR__ . '/vendor/autoload.php';
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
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'unescodb',
        'username' => 'root',
        'password' => '1532910',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        'prefix' => '',
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
        echo "Attachments table migration completed successfully.\n";
    } else {
        echo "Table 'attachments' already exists.\n";
    }

    // Check if the 'payments' table exists before creating it
    if (!Capsule::schema()->hasTable('payments')) {
        // Create 'payments' table
        Capsule::schema()->create('payments', function ($table) {
            $table->increments('id');
            $table->unsignedInteger('student_id'); // Foreign key to students table
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->decimal('amount_sent', 10, 2)->nullable();
            $table->string('currency', 3); 
            $table->string('receipt')->nullable();
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
?>
