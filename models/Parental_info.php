<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php';
use Illuminate\Database\Eloquent\Model;

class ParentalInfo extends Model {
    protected $table = 'parental_infos';

    protected $fillable = [
        'student_id',
        'parent_type',
        'full_name',
        'email',
        'telephone',
    ];

    public $timestamps = false; 

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}