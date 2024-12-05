<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php';
use Illuminate\Database\Eloquent\Model;

class legal_Information extends Model {
    protected $table = 'legal_information'; 

    protected $fillable = [
        'student_id',
        'passport_name',
        'given_place',
        'passport_number',
        'expiry_date'
    ];

    public $timestamps = false;

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
