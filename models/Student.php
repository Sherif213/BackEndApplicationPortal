<?php
namespace App\Models;

require_once __DIR__ . '/../config/database.php'; // Adjust the path if necessary
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $table = 'students';
    protected $fillable = [
        'submissionId',
        'firstName',
        'dateOfBirth',
        'gender',
        'tshirtSize',
        'nationality',
        'placeOfBirth',
        'homeAddress',
        'email',
        'telephone',
        'fathersFullName',
        'fathersEmail',
        'fathersTelephone',
        'mothersFullName',
        'mothersEmail',
        'mothersTelephone',
        'passportName',
        'givenPlace',
        'passportNumber',
        'expiryDate',
        'course',
        'institutionName',
        'department',
        'institutionAddress',
        'institutionEmail',
        'institutionTelephone',
        'iban',
        'outreach'

    ];

    public $timestamps = true;

    public function payments() {
        return $this->hasMany(Payment::class, 'student_id');
    }
}
