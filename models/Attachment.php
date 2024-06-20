<?php
namespace App\Models;

require_once __DIR__ . '/../config/database.php'; // Adjust the path if necessary
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model {
    protected $table = 'attachments'; // Table name

    protected $fillable = [
        'submissionId',
        'firstName',
        'studentCertificate',
        'photo',
        'passportName',
        'passportCopy',
        // 'Recommendation_Letter',
        // 'Motivation_Letter'
    ];

    public $timestamps = true; // Enable timestamps (created_at and updated_at)
}