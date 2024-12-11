<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php';
use Illuminate\Database\Eloquent\Model;

class Program extends Model {
    
    protected $table = 'unesco_programs';

    
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'progress',
    ];

    
    public $timestamps = true;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_program', 'program_id', 'student_id')
                    ->using(StudentProgram::class) // Use the StudentProgram pivot model
                    ->withPivot('program_specific_id') // Include additional pivot fields
                    ->withTimestamps(); // Include created_at and updated_at
    }
}
