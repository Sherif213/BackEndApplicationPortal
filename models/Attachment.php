<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php';
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {
    protected $table = 'attachments'; 

    protected $fillable = [
        'student_id',
        'attachment_type',
        'file_path',
    ];

    public $timestamps = true;

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
