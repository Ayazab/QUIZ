<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

   

    protected $fillable = [
        'quiz_title',
        'teacher_id',
        'timelimit',
        // Add more fields as needed
    ];

    // Define relationships or additional methods if necessary
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
