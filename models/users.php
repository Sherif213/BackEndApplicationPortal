<?php

namespace App\Models;

require_once __DIR__ . '/../config/database.php'; 
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'users'; 

    protected $fillable = [
        'registeration_id',
        'username',
        'first_name',
        'last_name',
        'email',
        'password',
        'role',    
    ];

    public $timestamps = true; 

    public function submissions() {
        return $this->hasMany(UserStudentSubmission::class, 'user_id');
    }
}
