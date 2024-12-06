<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php';
use Illuminate\Database\Eloquent\Model;

class InstitutionDetail extends Model {
    protected $table = 'institution_details'; 

    protected $fillable = [
        'student_id',
        'institution_name',
        'department',
        'course',
        'address',
        'email',
        'telephone'
    ];

    public $timestamps = false;

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
