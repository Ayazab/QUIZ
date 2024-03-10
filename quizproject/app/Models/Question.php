<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'options',
        'correct_answer',
        'marks',
        'difficulty_level',
        'subject_code',
    ];

    protected $casts = [
        'options' => 'array', // Tell Laravel to cast 'options' as an array
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_code', 'sub_code');
    }
}
