<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php'; 
use Illuminate\Database\Eloquent\Model;

class UserStudentSubmission extends Model {
    protected $table = 'user_student_submissions'; 

    protected $fillable = [
        'user_id',
        'student_submission_id',
    ];

    public $timestamps = true; 

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function studentSubmission() {
        return $this->belongsTo(Student::class, 'submission_id');
    }
}
