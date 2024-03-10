<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'quiz_id',
        'sub_name',
        'marks_obtained',
        'total_marks',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
}
