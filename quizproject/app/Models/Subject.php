<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $primaryKey = 'sub_code';
    public $incrementing = false;

    protected $fillable = [
        'sub_code',
        'sub_name',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'subject_code', 'sub_code');
    }
}
