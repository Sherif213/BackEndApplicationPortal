<?php
namespace App\Models;

require_once __DIR__ . '/../config/database.php'; // Adjust the path if necessary
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    protected $table = 'payments';
    protected $fillable = [
        'student_id',
        'payment_status',
        'amount_sent',
        'currency' ,
        'receipt',
    ];

    public $timestamps = true;

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
