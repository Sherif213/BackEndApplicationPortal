<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php'; 
use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    protected $table = 'students'; 

    protected $fillable = [
        'submission_id',
        'first_name',
        'date_of_birth',
        'tshirt_size',
        'gender',
        'nationality',
        'place_of_birth',
        'home_address',
        'email',
        'telephone',
        'outreach',
        'iban'
    ];

    public $timestamps = true; 

    public function payments() {
        return $this->hasMany(Payment::class, 'student_id');
    }

    public function parentalInfos() {
        return $this->hasMany(ParentalInfo::class, 'student_id');
    }

    public function institutionDetails() {
        return $this->hasOne(InstitutionDetail::class, 'student_id');
    }

    public function attachments() {
        return $this->hasMany(Attachment::class, 'student_id');
    }
    public function passport() {
        return $this->hasOne(legal_Information::class, 'student_id');
    }

    public function programs()
{
    return $this->belongsToMany(Program::class, 'student_program', 'student_id', 'program_id')
                ->using(StudentProgram::class) // Use the StudentProgram pivot model
                ->withPivot('program_specific_id') // Include additional pivot fields
                ->withTimestamps(); // Include created_at and updated_at
}
}
