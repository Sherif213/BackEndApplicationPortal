<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StudentProgram extends Pivot
{
    protected $table = 'student_program'; 

    protected $fillable = [
        'student_id',
        'program_id',
        'program_specific_id',
    ];

    public $timestamps = true; // Enable timestamps if they are used in the table

    // Relationships to Student and Program models
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
